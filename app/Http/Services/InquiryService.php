<?php
/**
 * Created by PhpStorm.
 * User: The Power Monkey
 * Date: 9/7/2018
 * Time: 11:22 AM
 */

namespace App\Http\Services;

use App\Http\Interfaces\InquiryRepositoryInterface;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryService extends Service
{
    /**
     * @return string
     */
    public function interface()
    {
            return InquiryRepositoryInterface::class;
    }

    /**
     * Display list of all Inquiry
     *
     * @return mixed
     */
    public function index($request = null)
    {

        if (! empty($data)){
            $data=$request->all();
            return $this->interface->index($data['search']);
        }
        return $this->interface->index();
    }

    /**
     * Store basic information
     * @param $request
     * @return mixed
     */
    public function storeBasicInformation($request)
    {
        $data = $request->all();

        $data['token'] = $this->inquiryToken();

        /** check generated token is unique or not. if token is not unique then again request for new token **/
        while ($this->isUniqueToken($data['token']) == false){
            $data['token'] = $this->inquiryToken();
        }
        return $this->interface->storeBasicInformation($data);
    }

    /**
     * Generates 6 digits unique token.
     *
     * @return string
     */
    protected function inquiryToken()
    {
        $number = '1234567890';
        $length = strlen($number)-1;

        $token = '';

        for ($i=0;$i<8;$i++){
            $token .= $number[mt_rand(1,$length)];
        }
        return $token;
    }

    /**
     * Checks generated token is unique or not in inquiry table.
     * @param $token
     * @return bool
     */
    protected function isUniqueToken($token)
    {
        if (Inquiry::where('token', $token)->count()>0) {
            return false;
        }
        return true;
    }

    /**
     * Shows all the details of resources.
     * @param $token
     * @return mixed
     */
    public function showInquiryDetail($token)
    {
        return $this->interface->showInquiryDetail($token);
    }

    /**
     * update the inquiry information according to requested data.
     * @param $request
     * @param $token
     * @return mixed
     */
    public function updateInquiry($request, $token)
    {
        $data = $request->all();

        $data['token'] = $token;

        if (! empty($request->step) && $request->step === 'P3r5oN81in7r3A4Ion'){

            return $this->interface->updatePersonalInformation($data, $token);
        }elseif (! empty($request->step) && $request->step === '1N73RE573Dhi57OrY') {

            $this->interface->updateHistory($data, $token);
            Inquiry::where('token',$token)->update(['how_did_you_know_about_us'=>$request->how_did_you_hear_about_us]);
            return $this->interface->updateInterest($data,$token);
        } elseif (! empty($request->step) && $request->step === '3N671SH9R02ICI3NCY') {

            return $this->interface->updateEnglishProficiencyTests($data, $token);
        }
    }

    /**
     * @param $request
     * @return mixed
     */
    public function academicDetailProcess($request)
    {
        if (isset($request->id)) {
            return $this->interface->academicDetailUpdate($request->all(),$request->id);
        }
        return $this->interface->academicDetailCreate($request->all());
    }

    public function experienceProcess($request)
    {
        if (isset($request->id)) {
            return $this->interface->experienceUpdate($request->all(),$request->id);
        }
        return $this->interface->experienceCreate($request->all());
    }
    public function destroy($token){
        return $this->interface->destroy($token);

    }
}