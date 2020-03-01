<?php
namespace App\Http\Controllers\Back;

use App\Models\Inquiry;
use App\Models\InquiryCounselor;
use App\Models\InquiryFollowup;
use App\Models\OfficeCheckIn;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FollowupController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addFollowup(Request $request)
    {
        $requestedURL = $_SERVER['HTTP_REFERER'];

        $validator = $this->followupDetailValidation($request);
        if ($validator->fails()) {
            return redirect($_SERVER['HTTP_REFERER'] . '#followUps')
                ->withErrors($validator)
                ->withInput();
        }

        $followups_visited = InquiryFollowup::where('inquiry_token', $request->inquiry_token)->where('status', '!=', 'Visited')->get();
        $followups_notcoming = InquiryFollowup::where('inquiry_token', $request->inquiry_token)->where('status', 'Not visited')->where('date', '>=', date('m/d/Y'))->orwhere('status', 'Re-followed')->get();
        if (count($followups_visited) > 0 && count($followups_notcoming) > 0) {
            return redirect($requestedURL)->with('error', 'This application has another follow-up.');
        }

        $data = $request->all();

        if (isset($request->re_follow_up)) {
            $data['status'] = 'Re-followed';
        }
        if (isset($request->followup_id)) {
            $follow = InquiryFollowup::where('id', $data['followup_id'])->first();

            if (isset($request->previous_results)) {
                $follow->update(['results' => $request->previous_results]);
            }
            $data['inquiry_token'] = $follow->inquiry->token;
        }
        unset($data['re_follow_up']);
        unset($data['followup_id']);
        if (InquiryFollowup::create($data)) {
            return redirect($requestedURL . '#followUps')->with('success', 'Followup detail has been added for inquiry token ' . $request->inquiry_token);
        }
        return redirect($requestedURL . '#followUps')->with('error', 'Something went wrong. Please type again.');
    }

    /**
     * @param Request $request
     */
    public function reFollowUp(Request $request)
    {

        $request->validate([
            'previous_results' =>'nullable|string|max:500|regex:/^[a-zA-Z .?]*$/',
            'date' => 'nullable|date|after:' . date('Y-m-d'),
            'reasons' => 'nullable|string|max:500|regex:/^[a-zA-Z .?]*$/',
            'followup_id' => 'required|exists:inquiry_followups,id',
        ]);

        $data = $request->all();


        $follow = InquiryFollowup::where('id', $data['followup_id'])->first();

        if (isset($request->previous_results)) {
            $follow->update(['results' => $request->previous_results, 'status' => 'Re-followed']);
        }
        $data['inquiry_token'] = $follow->inquiry->token;


        if (empty($request->date) && empty($request->reasons)) {
            $follow;
            Session::flash('success', 'Result  has been updated');

        } elseif (!empty($request->date)) {
            InquiryFollowup::create($data);
            Session::flash('success', 'Followup has been added');
        } else {

            Session::flash('error', 'something has been wrong');
        }
    }

    /**
     * Shows the form to add new followup
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createFollowup()
    {
        $this->data('title', $this->title('New Followup'));
        $applications = Inquiry::all();
        $counselors = User::where('morph_type', 'counselor')->get();

        return view(
            'back.reception-counselor.pages.followups.new-followup',
            $this->data, compact('applications', 'counselors')
        );
    }

    /**
     * Validate form data for followup
     * @param $request
     * @return mixed
     */
    protected function followupDetailValidation($request)
    {
        return Validator::make($request->all(),
            [
                'inquiry_token' => 'required_if:followup_id,==,null|string|exists:inquiries,token',
                'followup_id' => 'required_if:inquiry_token,==,null|string|exists:inquiry_followups,id',
                're_follow_up' => 'nullable|string',
                'date' => 'required|date|after:' . date('Y-m-d'),
                'follow_type' => 'nullable|string|in:SMS,Phone',
                'reasons' => 'nullable|string|max:500|regex:/^[a-zA-Z .?]*$/',
                'previous_results' => 'nullable|string|max:500|regex:/^[a-zA-Z .?]*$/',
            ]
        );
    }

    /**
     * Shows the list of followup
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function followup()
    {
        $this->data('title', $this->title('Followup'));
        $followups = InquiryFollowup::orderBy('date', 'DESC')->paginate(10);
        $notVisitedFollowups = InquiryFollowup::where('status', 'Not visited')->where('date', '>=', date('m/d/Y'))->orWhere('status', 'Re-followed')->paginate(10);
        $visitedFollowups = InquiryFollowup::where('status', 'Visited')->orderBy('date', 'DESC')->paginate(10);
        $notComingFollowups = InquiryFollowup::where('status', 'Not visited')->where('date', '<', date('m/d/Y'))->paginate(10);

        return view(
            'back.reception-counselor.pages.followups.followup',
            $this->data, compact('notVisitedFollowups', 'followups', 'visitedFollowups', 'notComingFollowups')
        );
    }

    /**
     * Deletes requested followup item
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function followupDelete($id)
    {
        $detail = InquiryFollowup::find($id);

        $getId = substr($id, 0, -1);// It throws last character
        $tabcheck = substr($id, -1); // shows the last character
        if ($tabcheck == 'c') {
            if (InquiryFollowup::where('id', $getId)->delete()) {
                return redirect('follow-ups#notComing')->with('success', 'Follow up for ' . $detail->inquiry->name . ' has been deleted.');
            }

        } elseif ($tabcheck == 'v') {
            if (InquiryFollowup::where('id', $getId)->delete()) {
                return redirect('follow-ups#visited')->with('success', 'Follow up for ' . $detail->inquiry->name . ' has been deleted.');
            }

        } elseif ($tabcheck == 'a') {
            if (InquiryFollowup::where('id', $getId)->delete()) {
                return redirect('follow-ups#all')->with('success', 'Follow up for ' . $detail->inquiry->name . ' has been deleted.');
            }

        } elseif ($tabcheck == 'n') {
            if (InquiryFollowup::where('id', $getId)->delete()) {
                return redirect('follow-ups#notVisited')->with('success', 'Follow up for ' . $detail->inquiry->name . ' has been deleted.');
            }


        }
        return redirect()->back()->with('Something went wrong. Please try again.');

    }

    /**
     * Store followup results
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function followupResult(Request $request)
    {
        $this->validate($request,
            [
                'id' => 'required|exists:inquiry_followups',
                'results' => 'required|string|max:180'
            ]);

        $detail = InquiryFollowup::find($request->id);
        if ($detail->update(['results' => $request->results])) {
            return redirect()->back()->with('success', 'Followup detail for ' . $detail->inquiry->name . ' has been updated.');
        }
        return redirect()->back()->with('error', 'Something went wrong. Please try again');
    }

    /**
     * Shows the form for editing followup
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editFollowup($id)
    {
        $this->data('title', $this->title('Edit Followup'));
        $user = InquiryFollowup::find($id);

        return view('back.reception-counselor.pages.followups.edit-followup',
            $this->data, compact('user'));
    }

    /**
     * Update the followup details
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editFollowupAction(Request $request, $id)
    {
        $this->validate($request,
            [
                'date' => 'nullable|date|after:' . date('Y-m-d'),
                'reasons' => 'nullable|string|max:255|regex:/^[a-zA-Z]+$/',

            ]);

        if (InquiryFollowup::where('id', $id)->update(
            [
                'date' => $request->date,
                'reasons' => $request->reasons
            ]
        )) {
            return redirect()->route('followup')->with('success', 'Follow Up has been updated successfully');
        }

        return redirect()->back()->with('error', 'Something went wrong');
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $this->data('title', $this->title('Followup'));
        $notVisitedFollowups = InquiryFollowup::where('status', 'Not visited')->where('date', '>=', date('Y-m-d'))->orWhere('status', 'Re-followed')->paginate(10);
        $visitedFollowups = InquiryFollowup::where('status', 'Visited')->orderBy('date', 'DESC')->paginate(10);
        $notComingFollowups = InquiryFollowup::where('status', 'Not visited')->where('date', '<', date('Y-m-d'))->paginate(10);

        if ($followups = InquiryFollowup::whereHas(
            'inquiry',
            function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            }
        )->orWhere('reasons', 'like', '%' . $search . '%')
            ->orWhere('status', 'like', '%' . $search . '%')
            ->orWhere('follow_type', 'like', '%' . $search . '%')
            ->latest()->paginate(10)) {
            $hold = 'value';
        }


        return view(
            'back.reception-counselor.pages.followups.followup',
            $this->data, compact('notVisitedFollowups', 'followups', 'visitedFollowups', 'notComingFollowups', 'hold')
        );


    }
}