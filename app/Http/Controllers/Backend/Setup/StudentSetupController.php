<?php

namespace App\Http\Controllers\Backend\Setup;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentSetup;
use App\Http\Requests\StudentClassRequest;
use App\Http\Requests\UpdateStudentClassRequest;



class StudentSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $this->data['setup'] = StudentSetup::all();

     return view('backend.setup.student_class',$this->data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $this->data['mode']        = 'Create';
      return view('backend.setup.form',$this->data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentClassRequest $request)
    {
       $formdata             = $request->all();

       if(StudentSetup::create($formdata) ) {
        Session::flash('message','Student Class Added Successfully');
       }

       return redirect()->to('setup');

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
         $this->data['mode']         = 'Edit';
         $this->data['setup']         = StudentSetup::find($id);

         return view('backend.setup.form',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentClassRequest $request, $id)
    {
            
         $data                      = $request->all();

        $setup                      = StudentSetup::find($id);
        $setup->name                = $data['name'];

        if($setup->save() ) {
           Session::flash('message','Class Updated Successfully');
        }
         return redirect()->to('setup');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $user = StudentSetup::find($id);
         if($user->delete() ) {
            Session::flash('message','Student Class Delete Successfully');
         }

         return redirect()->to('setup');
    }
}
