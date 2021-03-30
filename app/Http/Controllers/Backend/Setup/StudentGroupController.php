<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\StudentGroup;
use App\Http\Requests\StudentGroupRequest;
use App\Http\Requests\UpdateGroupRequest;




class StudentGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $this->data['student_group']     = StudentGroup::all();

        return view('backend.setup.group.view-group',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $this->data['mode']             = 'Create';
         return view('backend.setup.group.form-group',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentGroupRequest $request)
    {
        $formdata             = $request->all();

       if(StudentGroup::create($formdata) ) {
        Session::flash('message','Data Added Successfully');
       }

       return redirect()->to('student_group');  
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
         $this->data['student_group']     = StudentGroup::find($id);

          return view('backend.setup.group.form-group',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, $id)
    {
        $data                                = $request->all();

        $student_group                       = StudentGroup::find($id);
        $student_group->group                = $data['group'];

        if($student_group->save() ) {
           Session::flash('message','Data Updated Successfully');
        }
         return redirect()->to('student_group');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = StudentGroup::find($id);
         if($group->delete() ) {
            Session::flash('message','Data Delete Successfully');
         }

         return redirect()->to('student_group');
    }
}
