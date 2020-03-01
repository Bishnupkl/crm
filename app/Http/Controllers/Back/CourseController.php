<?php

namespace App\Http\Controllers\Back;

use App\Models\Course;
use App\Models\Partner;
use App\Models\CoursePartner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universities = Partner::get();
        $courses = Course::get();

        $this->data('title',$this->title('Courses List'));
        return view(
            'back.pages.setting.course-setting' ,
            $this->data,compact('courses','universities')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universities = Partner::get();
        $courses = Course::get();

        $this->data('title',$this->title('Courses List'));
        return view(
            'back.pages.setting.course-setting' ,
            $this->data,compact('courses','universities')
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
        $this->validate($request,
            [
                'name'   => 'required'
            ]
        );

        $course= Course::create(
            [
                'name' => $request->name
            ]
        );
        if($course) {
            return redirect()->back()->with('success', 'Course name '.$course->name.' has been successfully added');
        }
        return redirect()->back()->with('error','Something went wrong while adding '.$request->name);
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
        //
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
        if(Course::where('name',$request->id)->update(['name' => $request->name]))
        {
            return redirect()->back()->with('success','Course updated successfully');
        }else{
            return redirect()->back()->with('error','Something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);

        if (Course::where('id',$id)->delete()){
            return redirect()->back()->with('success','Course name '.$course->name.' has been deleted');
        }
        return redirect()->back()->with('error','Something went wrong while deleting '.$course->name);
    }
    public function getCourse(Request $request)
    {
        return CoursePartner::where('university_id',$request->university)->with('course')->get();
    }

    public function showPartners(Request $request)
    {
        $partners = Partner::whereHas(
            'coursePartner',
            function ($query) use($request){
                $query->where('course_id',$request->courseId);
            }
        )->get();

        $option = '<option value="">Select Partner Name</option>';
            foreach($partners as $partner){
                $option.=  '<option value = "'.$partner->id.'">'.$partner->name.'</option>';
            }
        return $option;
    }
}
