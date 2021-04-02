<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\SubjectAll;
use App\Http\Requests\SubjectRequest;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['subjects'] = SubjectAll::all();

       return view('backend.setup.subject.view-subject',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['mode']  = "Create";

         return view('backend.setup.subject.form-subject',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        $formdata  = $request->all();

        if(SubjectAll::create($formdata)){
            Session::flash('message','Data Added Successfully');
        }

        return redirect()->to('setup_subject');
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
        $this->data['mode']      = "Edit";

        $this->data['subjects']   = SubjectAll::find($id);

        return view('backend.setup.subject.form-subject',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request, $id)
    {
        $data                   = $request->all();

        $subject              = SubjectAll::find($id);
        $subject->subject     = $data['subject'];  

        if($subject->save() ) {
            Session::flash('message','Data Update Successfylly');
        }

        return redirect()->to('setup_subject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if(SubjectAll::find($id)->delete()) {
            Session::flash('message','Data Delete Successfylly');
        }
        return redirect()->to('setup_subject');
    }
}
