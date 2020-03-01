<?php
/**
 * Created by PhpStorm.
 * User: The Power Monkey
 * Date: 9/7/2018
 * Time: 11:27 AM
 */

namespace App\Http\Repositories;

use App\Models\AcademicDetail;
use App\Models\Inquiry;
use Illuminate\Contracts\Container\Container;

class InquiryRepository extends Repository
{
    public function model()
    {
        return Inquiry::class;
    }

    /**
     *  Display list of all Inquiry
     * @return mixed
     */
    public function index($value = null)
    {
        if ($value != null){
            return Inquiry::where('name','like','%'.$value.'%')
                ->orWhere('email','like','%'.$value.'%')
                ->orWhere('token','like','%'.$value.'%')
                ->orWhere('mobile','like','%'.$value.'%')
                ->orWhere('temporary_address','like','%'.$value.'%')
                ->orWhere('gender',$value)
                ->paginate(10);
        }
        return $this->model->latest()->paginate(20);
    }

    /**
     * Store a newly created resource in storage.
     * @param $data
     * @return mixed
     */
    public function storeBasicInformation($data)
    {
        $inquiry = $this->model->create($this->basicInformationJSON($data));
        if ($inquiry) {
            $inquiry->emergencyContact()->create($this->emergencyContactJSON($data));

            for ($i = 0; $i < count($data['name_of_qualification']); $i++) {
                $academic = $this->academicDetailJSON($data, $i);
                if ($this->isEmptyAcademicDetail($academic)) {
                    $inquiry->academicDetails()->create($academic);
                }
            }

            for ($i = 0; $i < count($data['name_of_employer']); $i++) {
                $experience = $this->experience($data, $i);
                if($this->isEmptyExperience($experience)) {
                    $inquiry->experience()->create($experience);
                }
            }

            $inquiry->englishTest()->create($this->testDetailJSON($data));

            $inquiry->interest()->create($this->interestJSON($data));

            $inquiry->history()->create($this->historyJSON($data));

            return $inquiry;
        }
        return false;
    }

    public function showInquiryDetail($token)
    {
        return $this->model->where('token',$token)->with(
            'emergencyContact',
            'academicDetails',
            'experience',
            'englishTest',
            'interest',
            'history',
            'inquiryCounselor'
        )->first();
    }

    /**
     * array of basic information for storing.
     *
     * @param $data
     * @return array
     */
    protected function basicInformationJSON($data)
    {
        return [
            'token'     => array_get($data,'token', null),
            'name'      => array_get($data,'name', null),
            'email'     => array_get($data,'email', null),
            'mobile'    => array_get($data,'mobile',null),
            'landline'  => array_get($data, 'landline', null),
            'permanent_address' => array_get($data,'permanent_address',null),
            'temporary_address' => array_get($data,'temporary_address', null),
            'gender'    => array_get($data,'gender',null),
            'dob'       => array_get($data,'dob',null),
            'nationality'   => array_get($data,'nationality',null),
            'bloodgroup'    => array_get($data,'bloodgroup',null),
            'marital_status'    => array_get($data,'marital_status',null),
            'marriage_date'     => array_get($data,'marriage_date',null),
            'how_did_you_know_about_us' => array_get($data,'how_did_you_hear_about_us',null)
        ];
    }

    /**
     * array of emergency contact for storing
     *
     * @param $data
     * @return array
     */
    protected function emergencyContactJSON($data)
    {
        return [
            'name'      => array_get($data,'contact_name',null),
            'relation'  => array_get($data,'contact_relation',null),
            'number'    => array_get($data,'contact_number',null)
        ];
    }

    /**
     * @param $data
     * @param $key
     * @return array
     */
    protected function academicDetailJSON($data,$key)
    {
        return [
            'name_of_qualification'         => $data['name_of_qualification'][$key],
            'name_of_institution'           => $data['name_of_institution'][$key],
            'start_date'                    => $data['academic_start_date'][$key],
            'end_date'                      => $data['academic_end_date'][$key],
            'percentage'                    => $data['academic_percentage'][$key]
        ];
    }

    /**
     * @param $data
     * @return bool
     */
    protected function isEmptyAcademicDetail($data)
    {
        if (count($data)>0){
            if (! empty($data['name_of_qualification'])){
                return true;
            } elseif( ! empty($data['name_of_institution'])){
                return true;
            } elseif (! empty($data['academic_start_date'])){
                return true;
            } elseif (! empty($data['academic_end_date'])){
                return true;
            } elseif (! empty($data['academic_percentage'])){
                return true;
            } else{
                return false;
            }
        }
        return false;
    }

    /**
     * @param $data
     * @param $key
     * @return array
     */
    protected function experience($data,$key)
    {
        return [
            'name_of_employer'          => $data['name_of_employer'][$key],
            'duties'                    => $data['duties'][$key],
            'start_year'                => $data['start_year'][$key],
            'end_year'                  => $data['end_year'][$key]
        ];
    }

    /**
     * @param $data
     * @return bool
     */
    protected function isEmptyExperience($data)
    {
        if (count($data)>0){
            if (! empty($data['name_of_employer'])){
                return true;
            } elseif( ! empty($data['duties'])){
                return true;
            } elseif (! empty($data['start_year'])){
                return true;
            } elseif (! empty($data['end_year'])){
                return true;
            } else{
                return false;
            }
        }
        return false;
    }

    /**
     * @param $data
     * @return array
     */
    protected function testDetailJSON($data)
    {
        return [
            'is_taken'          => array_get($data,'is_taken',null),
            'test_type'         => (isset($data['is_taken']) && $data['is_taken']==='Yes') ? array_get($data,'test_type', null) : '',
            'test_date'         => (isset($data['is_taken']) && $data['is_taken']==='Yes') ? array_get($data,'test_date',null) : '',
            'listening'         => (isset($data['is_taken']) && $data['is_taken']==='Yes') ? array_get($data,'listening',null) : '',
            'writing'           => (isset($data['is_taken']) && $data['is_taken']==='Yes') ? array_get($data,'writing',null) : '',
            'reading'           => (isset($data['is_taken']) && $data['is_taken']==='Yes') ? array_get($data,'reading',null) : '',
            'speaking'          => (isset($data['is_taken']) && $data['is_taken']==='Yes') ? array_get($data,'speaking',null) : '',
            'overall'           => (isset($data['is_taken']) && $data['is_taken']==='Yes') ? array_get($data,'overall',null) : '',
            'other_test_attain' => (isset($data['is_taken']) && $data['is_taken']==='Yes') ? array_get($data,'other_test_attain',null) : '',
            'preparation_classes'   => (isset($data['is_taken']) && $data['is_taken']==='Yes') ? array_get($data,'preparation_classes',null) : '',
            'study_center'      => (isset($data['is_taken']) && $data['is_taken']==='Yes' && isset($data['preparation_classes']) &&  $data['preparation_classes']==='Yes') ? array_get($data,'study_center',null) : '',
        ];
    }

    /**
     * @param $data
     * @return array
     */
    protected function interestJSON($data)
    {
        return [
            'country_id'    => array_get($data,'interested_country',null),
            'intake_id'     => array_get($data,'Interested_intake',null),
            'partner_id' => array_get($data,'interested_university',null),
            'course_id'     => array_get($data,'interested_course', null)
        ];
    }

    /**
     * @param $data
     * @return array
     */
    protected function historyJSON($data)
    {
        return [
            'rejected_before'   => array_get($data,'rejected_before',null),
            'reasons'       => array_get($data,'reasons',null)
        ];
    }

    /**
     * @param array $data
     * @param $token
     * @return mixed
     */
    public function updatePersonalInformation(array $data, $token)
    {
        $inquiry = $this->model->find($token);
        $inquiry->emergencyContact()->update($this->emergencyContactJSON($data));
        return $inquiry->update($this->basicInformationJSON($data));
    }

    /**
     * @param array $data
     * @param $token
     */
    public function updateInterest(array $data, $token)
    {
        $inquiry = $this->model->find($token);

        return $inquiry->interest()->update($this->interestJSON($data));
    }

    /**
     * @param array $data
     * @param $token
     * @return mixed
     */
    public function updateEnglishProficiencyTests(array $data, $token)
    {
        $inquiry = $this->model->find($token);

        return $inquiry->englishTest()->update($this->testDetailJSON($data));
    }

    /**
     * @param array $data
     * @param $token
     * @return mixed
     */
    public function updateHistory(array $data, $token)
    {
        $inquiry = $this->model->find($token);

        return $inquiry->history()->update($this->historyJSON($data));
    }


    public function academicDetailCreate(array $data)
    {
        $detail = $this->model->find($data['inquiry_token']);
        if ($detail) {
            return $detail->academicDetails()->create($data);
        }
        return false;
    }

    public function academicDetailUpdate(array  $data, $id)
    {
        unset($data['id']);
        $detail = $this->model->whereHas(
            'academicDetails',
            function ($query) use($id){
                $query->where('id',$id);
            }
        )->first();

        if ($detail) {
            if($detail->academicDetails()->where('id', $id)->update($data)){
                return $detail;
            }
        }
        return 0;
    }

    public function experienceCreate(array $data)
    {
        $detail = $this->model->find($data['inquiry_token']);
        if ($detail) {
            return $detail->experience()->create($data);
        }
        return false;
    }

    public function experienceUpdate(array $data, $id)
    {
        unset($data['id']);
        $detail = $this->model->whereHas(
            'experience',
            function ($query) use($id){
                $query->where('id',$id);
            }
        )->first();

        if ($detail) {
            if ($detail->experience()->where('id', $id)->update($data)){
                return $detail;
            }
        }
        return 0;
    }
    public function destroy($token){

//        print_r($token);

     $details=Inquiry::find($token);

     $details->emergencyContact()->delete();


     foreach ($details->academicDetails as $academic){
         $academic->delete();
     }

     foreach ($details->experience as $experience){
         $experience->delete();
     }

     $details->englishTest()->delete();

     $details->interest()->delete();

     $details->history()->delete();

     $details->inquiryCounselor()->delete();

     foreach ($details->officeCheckIn as $officecheckin) {
         $officecheckin->delete();
     }
     foreach ($details->inquiryFollowups as $inquiry){
         $inquiry->delete();
     }

    return Inquiry::find($token)->delete();

     }
}