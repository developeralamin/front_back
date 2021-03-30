<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Year;
use App\Http\Requests\YearRequest;
use App\Http\Requests\UpdateStudentClassRequest;



class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $this->data['year']  = Year::all();

       return view('backend.setup.year.view-year',$this->data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['mode']   = 'Create';

        return view('backend.setup.year.form-year',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(YearRequest $request)
    {
         $formdata             = $request->all();

       if(Year::create($formdata) ) {
        Session::flash('message','Year Added Successfully');
       }

       return redirect()->to('year');    }

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
         $this->data['mode']          = 'Edit';
         $this->data['year']          = Year::find($id);

          return view('backend.setup.year.form-year',$this->data);
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
         $data                      = $request->all();

        $year                       = Year::find($id);
        $year->year                 = $data['year'];

        if($year->save() ) {
           Session::flash('message','Year Updated Successfully');
        }
         return redirect()->to('year');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $user = Year::find($id);
         if($user->delete() ) {
            Session::flash('message','Year Delete Successfully');
         }

         return redirect()->to('year');
    }
}
