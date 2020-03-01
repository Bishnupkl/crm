<?php

namespace App\Http\Controllers\Back;

use App\Models\Country;
use App\Models\CountryIntake;
use App\Models\Intake;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $intakes = Intake::all();
        $countries = Country::all();

        $this->data('title',$this->title('IntakeSetting'));

        return view(
            'back.pages.setting.intake-setting' ,
            $this->data,
            compact(
                [
                    'intakes',
                    'countries',
                ]
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $intakes = Intake::all();
        $countries = Country::all();

        $this->data('title',$this->title('IntakeSetting'));

        return view(
            'back.pages.setting.intake-setting' ,
            $this->data,
            compact(
                [
                    'intakes',
                    'countries',
                ]
            )
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
        $this->validate($request,[
            'name'   => 'required|string|max:50',
        ]);

        $intake= Intake::create(
            [
                'name' => $request->input('name'),
            ]
        );
        if($intake)
        {
            return redirect()->back()->with('success',$intake->name.' intake has been successfully added');
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
        if(Intake::where('name',$request->id)->update(['name' => $request->name]))
        {
            return redirect()->back()->with('success','Intake updated successfully');
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
        $intake = Intake::find($id);

        if (Intake::where('id',$id)->delete()){
            return redirect()->back()->with('success',$intake->name.' intake has been deleted');
        }
        return redirect()->back()->with('success','Something went wrong while deleting '.$intake->name);
    }

    public function getIntake(Request $request)
    {
        $intake = CountryIntake::where('country_id',$request->country)->with('intake')->get();
        $university = Partner::where('country_id',$request->country)->get();

        return array(['intake'=>$intake,'university'=>$university]);
    }
}
