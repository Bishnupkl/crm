<?php

namespace App\Http\Controllers\Back;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries= Country::all();
        $this->data('title',$this->title('Country Setting'));
        return view(
            'back.pages.setting.country-setting' ,
            $this->data,compact('countries')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries= Country::all();
        $this->data('title',$this->title('Country Setting'));
        return view(
            'back.pages.setting.country-setting' ,
            $this->data,compact('countries')
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
            'name'   => 'required',

        ]);

        $country= Country::create([
            'name' => $request->name
        ]);
        if($country)
        {
            return redirect()->back()->with('success',$country->name.' successfully added');

        }
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if(Country::where('name',$request->id)->update(['name' => $request->name]))
        {
            return redirect()->back()->with('success','Country updated successfully');
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
        $country = Country::find($id);
        if (Country::where('id',$id)->delete()){
            return redirect()->back()->with('success',$country->name.' has been deleted');
        }
        return redirect()->back()->with('error','There is problem deleting the country '.$country->name);
    }
}
