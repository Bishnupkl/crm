<?php

namespace App\Http\Controllers\Back;

use App\Http\Services\InquiryService;
use App\Models\InquiryCounselor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssignCounselorController extends Controller
{
    /**
     * Assign the provided counselor for the particular inquiry.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function assignCounselor(Request $request)
    {
        $data = request()->validate(
            [
                'inquiry_token' => 'required|exists:inquiries,token',
                'user_id'     => 'required|exists:users,id',
                'counselor_status'  => 'required|in:1,0',
            ]
        );
        $this->validate($request,['assign_type'=>'required|in:assign,re-assign']);

        if ($request->assign_type === 're-assign'){
            InquiryCounselor::where('inquiry_token',$request->inquiry_token)->update(['counselor_status'=>0]);
        }

        $counselor = InquiryCounselor::create($data);

        if ($counselor){
            return redirect()->back()->with('success',$counselor->counselor->name.' has been assigned as a counselor');
        }
        return redirect()->back()->with('error','Something went wrong');
    }

    public function removeCounselor($id)
    {
        $counselor = InquiryCounselor::find($id);

        if(InquiryCounselor::where('id',$id)->delete()){
            return redirect()->back()->with('success',$counselor->counselor->name.' has been removed from assign list.');
        }
        return redirect()->back()->with('error','Something went wrong please try again.');
    }
}
