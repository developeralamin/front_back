<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\StudentShift;
use App\Http\Requests\ShiftRequest;
use App\Http\Requests\UpdateShiftRequest;



class StudentShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->data['shift'] = StudentShift::all();
        return view('backend.setup.shift.view-shift',$this->data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $this->data['mode']             = 'Create';
         return view('backend.setup.shift.form-shift',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShiftRequest $request)
    {
        $formdata             = $request->all();

       if(StudentShift::create($formdata) ) {
        Session::flash('message','Data Added Successfully');
       }

       return redirect()->to('shift');
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
         $this->data['mode']             = 'Edit';
          $this->data['shift']           = StudentShift::find($id);

          return view('backend.setup.shift.form-shift',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShiftRequest $request, $id)
    {
        $data                        = $request->all();

        $shift                       = StudentShift::find($id);
        $shift->shift                = $data['shift'];

        if($shift->save() ) {
           Session::flash('message','Data Updated Successfully');
        }
         return redirect()->to('shift');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $shift = StudentShift::find($id);
         if($shift->delete() ) {
            Session::flash('message','Data Delete Successfully');
         }

         return redirect()->to('shift');
    }
}
