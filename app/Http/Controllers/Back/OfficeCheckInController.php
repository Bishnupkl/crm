<?php

    namespace App\Http\Controllers\Back;

    use App\Models\Comment;
    use App\Models\Counselor;
    use App\Models\Inquiry;
    use App\Models\InquiryCounselor;
    use App\Models\InquiryFollowup;
    use App\Models\Office;
    use App\Models\OfficeCheckInBranch;
    use App\Models\User;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Models\OfficeCheckIn;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\URL;
    use Illuminate\Support\Facades\Validator;

    class OfficeCheckInController extends Controller
    {
        public function OfficeCheckIn()
        {
            $this->data('title',$this->title('Office Check in'));
            $applications = Inquiry::get();
            $counselors = User::where('morph_type','counselor')->get();
            $checkIns = OfficeCheckIn::all();

            return view(
                'back.pages.office-check-in.office-check-in',
                $this->data,compact('checkIns','applications','counselors')
            );
        }
        /**
         * It updates the followup status after the visit of applicant.
         * @param $request
         * @return bool
         */
        protected function updateFollowupStatus($request)
        {
            $followUpStatus = InquiryFollowup::where('inquiry_token',$request->application)->orderBy('id', 'DESC')->first();
            if(count($followUpStatus)>0) {
                return $followUpStatus->update(['status' => 'Visited']);
            }
            return false;
        }
        /**
         * It assign a counselor for the applicant
         * @param $request
         */
        protected function createInquiryCounselor($request)
        {
            InquiryCounselor::create(['inquiry_token'=>$request->application,'user_id'=>$request->assignee]);
        }
        /**
         * @param $data
         * @return array
         */
        public function checkInJSON($data)
        {
            return [
                'inquiry_token'     => array_get($data,'application',null),
                'date'              => Carbon::now(),
                'reasons'           => array_get($data,'reasons',null),
                'user_id'           => array_get($data,'assignee',null)
            ];
        }

        /**
         * @param $id
         * @return mixed
         */
        public function checkInDetail($id)
        {
            return OfficeCheckIn::where('id',$id)->with(['inquiry','user','comment.user'])->first();
        }

        /**
         * @param $id
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function officeCheckInShow($id)
        {
            $this->data('title',$this->title('Office Check-in Details'));

            $checkIns = OfficeCheckIn::where('id',$id)->with(['inquiry','user','comment.user'])->first();

            $branches = Office::all();
            $counselors = User::where('morph_type','counselor')->get();
            return view(
                'back.pages.office-check-in.office-check-in-show',
                $this->data, compact('checkIns','branches','counselors','user')
            );
        }

        /**
         * @param Request $request
         * @param $id
         * @return \Illuminate\Http\RedirectResponse
         */
        public function checkInUpdate(Request $request, $id)
        {
            print_r($request->all());
            if (!empty($request->comment)) {
                $this->checkInComment($request->comment, $id);
            }
            if (! empty($request->branch_id)) {
                $this->storeCheckInBranch($request->branch_id, $id);
            }

            OfficeCheckIn::where('id',$id)->update($this->officeCheckInUpdateJSON($request));

            return redirect()->back()->with('success','Information has been updated');
        }

        /**
         * @param $request
         * @return array
         */
        protected function officeCheckInUpdateJSON($request)
        {
            $data = [];
            if (! empty($request->status))
                $data['status'] = $request->status;
            if (! empty($request->priority))
                $data['priority'] = $request->priority;
            if (! empty($request->assignee_id))
                $data['user_id'] = $request->assignee_id;

            return $data;
        }
        /**
         * @param $comment
         * @param $checkInId
         * @return mixed
         */
        protected function checkInComment($comment, $checkInId)
        {
            return Comment::create(
                [
                    'comment'       => $comment,
                    'office_check_in_id'    => $checkInId,
                    'user_id'       => Auth::id()
                ]
            );
        }

        /**
         * @param $branchId
         * @param $checkInId
         * @return mixed
         */
        protected function storeCheckInBranch($branchId,$checkInId)
        {
            return OfficeCheckInBranch::create(
                [
                    'branch_id'      => $branchId,
                    'office_check_in_id'    => $checkInId
                ]
            );
        }

        /**
         * @param Request $request
         * @param $id
         * @return bool
         */
        public function checkInCompleted(Request $request, $id)
        {
            if (isset($request->completed)){
                OfficeCheckIn::where('id',$id)->update(['status'=>'Completed']);
                $detail = OfficeCheckIn::find($id);
                return $detail;
            }
            return false;
        }

        /**
         * @param Request $request
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function search(Request $request)
        {
            $this->data('title',$this->title('Office Check in'));
            $applications = Inquiry::get();
            $counselors = User::where('morph_type','counselor')->get();

            if (isset($request->w)) {
                $search = $request->w;
                $searchName = 'waiting';

            } elseif (isset($request->c)) {
                $search = $request->c;
                $searchName = 'completed';

            }elseif(isset($request->a)){
                $search = $request->a;
                $searchName = 'all';
            }

            if ($checkIns =  OfficeCheckIn::whereHas(
                'inquiry',
                function ($query) use($search){
                    $query->where('name','like','%'.$search.'%');
                }
            )->orWhereHas(
                'user',
                function ($query) use($search){
                    $query->where('name','like','%'.$search.'%');
                }
            )->orWhereHas(
                'user',
                function ($query) use($search){
                    $query->where('email','like','%'.$search.'%');
                }
            )->orWhere('status','like','%'.$search.'%')
                ->orWhere('date','like','%'.$search.'%')
                ->orWhere('reasons','like','%'.$search.'%')
                ->latest()->paginate(10)){
                    if (isset($request->w))
                    {
                        $url = "office-check-in-search?w=".$search;
                        $checkIns->setPath($url);

                    }elseif (isset($request->c))
                    {
                        $url = "office-check-in-search?c=".$search;
                        $checkIns->setPath($url);
                    }else{
                        $url = "office-check-in-search?a=".$search;
                        $checkIns->setPath($url);
                    }
                    $hold = 'value';
            }

            return view(
                'back.pages.office-check-in.office-check-in',
                $this->data,compact('checkIns','applications','counselors','hold','searchName')
            );

        }
            public function CheckInDelete(Request $request,$id)
            {
                $getId = substr($id, 0, -1); //it removes last character from a string
                $checkIn = OfficeCheckIn::find($id);
                $tabCheck =substr($id, -1);//it shows last character from a string

                    foreach ($checkIn->comment as $comment){
                                $comment->delete();
                            }
                            if ($tabCheck=='c'){

                                if(OfficeCheckIn::where('id',$getId)->delete()){
                                    return redirect('office-check-in#completed')->with('success','Office Checkin for '.$checkIn->inquiry->name.' has been deleted.');
                                }
                            }elseif($tabCheck=='a'){
                                OfficeCheckIn::where('id',$getId)->delete();
                                return redirect('office-check-in#all')->with('success','Office Checkin for '.$checkIn->inquiry->name.' has been deleted.');

                            }else{
                                OfficeCheckIn::where('id',$id)->delete();
                                return redirect('office-check-in')->with('success','Office Checkin for '.$checkIn->inquiry->name.' has been deleted.');
                            }
                            return redirect()->back()->with('error','Something went wrong. Please try again.');
            }

        /**
         * @param Request $request
         * @return string
         */
        public function addOfficeCheckIn(Request $request)
        {
            //inquiry view
            $token = $request->application;
            $assignee = $request->assignee;
            $result = OfficeCheckIn::where([['inquiry_token',$token],['user_id',$assignee]])->first();
            if ($result)
            {
                return redirect('inquiry/'.$token.'#assignCounselor')->with('success','This inquiry is already assigned');
            }

            // inquiry view ended
           $request->validate([
                'application'    => 'required|string|exists:inquiries,token',
                'reasons'        => 'nullable|max:255|regex:/^[a-zA-Z-. ]+$/',
                'assignee'      => 'required|integer|exists:users,id'
            ]);
            $this->createInquiryCounselor($request);
            $this->updateFollowupStatus($request);
            if (OfficeCheckIn::create($this->checkInJSON($request->all()))){
                Session::flash('success', 'Office Check in has been added');
                return redirect()->back();
            }
        }
        public function changeAssignee(Request $request)
        {
            if (isset($request->changeAssignee))
            {
                $findAssignee = InquiryCounselor::where('user_id',$request->changeAssignee)->get();
                if (count($findAssignee)>0)
                {
                    InquiryCounselor::where('user_id', '!=', $request->changeAssignee)->update(['counselor_status'=> 0]);
                    InquiryCounselor::where('user_id',$request->changeAssignee)->update(['counselor_status'=>1]);
                    return redirect('inquiry/'.$request->token.'#assignCounselor')->with('success','Assingee changed');
                }else{
                    return redirect('inquiry/'.$request->token.'#assignCounselor')->with('success','This assignee is not selected yet');
                }

            }
        }
        public function checkApplicantStatus(Request $request)
        {
            $inquiry_token = $request->application;
            $status = OfficeCheckIn::where('inquiry_token',$inquiry_token)->orderBy('updated_at','DESC')->first();
            if ($status)
            {
                return $status;
            }

        }

    }
