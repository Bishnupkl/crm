<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\OfficeRequest;
use App\Models\Country;
use App\Models\Office;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->data('title',$this->title('Office'));
//        $offices = Office::get();
        $countries = Country::get();

        $search = $request->search;

        if($offices = Office::where('name','like','%'.$search.'%')
            ->orWhere('street','like','%'.$search.'%')
            ->orWhere('city','like','%'.$search.'%')
            ->orWhere('state','like','%'.$search.'%')
            ->orWhere('email','like','%'.$search.'%')
            ->orWhere('phone','like','%'.$search.'%')
            ->orWhere('fax','like','%'.$search.'%')
            ->orWhere('website','like','%'.$search.'%')
            ->paginate(10))
        {
            $hold = 'value';
        }



        return view(
            'back.pages.administration.offices.office',
            $this->data, compact('offices','countries','hold')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data('title',$this->title('Office'));
        $offices = Office::get();
        return view(
            'back.pages.administration.offices.office',
            $this->data, compact('offices')
        );
    }

    /**
     * Store a newly created resource in storage.
     * @param OfficeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OfficeRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $office = Office::create($data);
        if ($office) {
            return redirect()->back()->with('success',$office->name.' has been added as a new office');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data('title',$this->title('Office Edit'));
        $offices = Office::find($id);
        $countries = Country::get();
        return view('back.pages.administration.offices.edit-office',
            $this->data, compact('offices','countries'));
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
        $data = $request->all();
        unset($data['_method']);
        unset($data['_token']);
        $office = Office::find($id);
        if ($office->update($data)){
            return redirect()->route('offices.index')->with('success',$office->name.' has been successfully updated');
        }
        return redirect()->back()->with('error','Something went wrong while updating '.$request->name);
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
