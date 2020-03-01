<?php

namespace App\Http\Controllers\Back;

use App\Models\Partner;
use App\Models\TaskPartner;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $partner = Partner::get();
        $user = User::get();
        $this->data('title',$this->title('Task Setting'));
        $search = $request->search;

        if($task =  Task::whereHas(
                'assigneeBy',
                function ($query) use($search){
                    $query->where('name','like','%'.$search.'%');
                }
            )->orWhere('title','like','%'.$search.'%')
           ->orWhere('related_to','like','%'.$search.'%')
           ->latest()->paginate(10)){
            $hold = 'value';
        }

        return view(
            'back.pages.task.task' ,
            $this->data,compact('task','partner','user','hold')
        );



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = Task::latest()->get();
        $this->data('title',$this->title('Task Setting'));
        $partner = Partner::get();
        $user = User::get();
        return view(
            'back.pages.task.task' ,
            $this->data,compact('task','partner','user')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        print_r($request->all());die;
        $data = $request->all();
        unset($data['_token']);
        $data['created_by'] = Auth::id();

        if($request->hasFile('file'))
        {
            $image = $request->file('file');
            $name = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('/images/task-image');
            $image->move($destinationPath, $name);
            $data['files'] = $name;
        }

        if($request->related_to == 'Partner')
        {
            $task = TaskPartner::create(
                [
                    'partner_id' => $request->partner_id
                ]
            );
        }
        unset($data['partner_id']);

        if($task){
            if($task->task()->create($data)){
                return redirect()->back()->with('success','Task has been added');
            }
        }
        return redirect()->back()->with('error','Something went wrong');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $this->data('title',$this->title('Task Edit'));
        $partner = Partner::get();
        $user = User::get();

        return view('back.pages.task.edit-task' ,
            $this->data,compact('task','partner','user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Task::find($id);
        $image = $user->files;
        $data = $request->all();
        unset($data['_token']);
        $data['created_by'] = Auth::id();

        if($request->hasFile('file'))
        {
            $image = $request->file('file');
            $name = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('/images/task-image');
            $image->move($destinationPath, $name);
            if(!empty($image)){
                $userImage = public_path('images/task-image/' . $image);
                unlink($userImage);
            }
            $data['files'] = $name;
        }

        if($request->related_to == 'Partner')
        {
            $task = TaskPartner::update(
                [
                    'partner_id' => $request->partner_id
                ]
            );
        }
        unset($data['partner_id']);

        if($task){
            if($task->task()->update($data)){
                return redirect()->back()->with('success','Task has been updated');
            }
        }
        return redirect()->back()->with('error','Something went wrong');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
