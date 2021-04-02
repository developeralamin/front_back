<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\ExamType;
use App\Http\Requests\ExamTypeRequest;
use App\Http\Requests\UpdateGroupRequest;



class ExamTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $this->data['exam_types'] = ExamType::all();

     return view('backend.setup.exam_type.view-exam-type',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $this->data['mode']  = "Create";
       return view('backend.setup.exam_type.form-exam-type',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamTypeRequest $request)
    {
        $formdata  = $request->all();

        if(ExamType::create($formdata)) {
            Session::flash('message','Data Added Successfylly');
        }

        return redirect()->to('exam_type');
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
         $this->data['mode']          = 'Edit';
        $this->data['exam_type']      = ExamType::find($id);

      return view('backend.setup.exam_type.form-exam-type',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExamTypeRequest $request, $id)
    {
        $data                   = $request->all();

        $exam_name              = ExamType::find($id);
        $exam_name->exam_name   = $data['exam_name'];  

        if($exam_name->save() ) {
            Session::flash('message','Data Update Successfylly');
        }

        return redirect()->to('exam_type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(ExamType::find($id)->delete()) {
            Session::flash('message','Data Delete Successfylly');
        }
        return redirect()->to('exam_type');
    }
}
