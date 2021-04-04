<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentSetup;
use App\Models\SubjectAll;
use App\Models\SubjectAssign;


class AssigningSubjectController extends Controller
{
    public function index()
    {
    	$this->data['allData'] = SubjectAssign::select('class_id')->groupBy('class_id')->get();
    	return view('backend.setup.assing_subject.view-assign-subject',$this->data);
    }


    public function create()
    {
    	
        $this->data['classes']              = StudentSetup::all();
        $this->data['subjects']             = SubjectAll::all();
        return view('backend.setup.assing_subject.add-assign-subject',$this->data);
    }



    public function store(Request $request)

    {

     $countSubject = count($request->subject_id);
      if($countSubject !=Null){
        for ($i=0; $i < $countSubject; $i++) { 
            $assignSubject = New SubjectAssign();

            $assignSubject->class_id             = $request->class_id;
            $assignSubject->subject_id           = $request->subject_id[$i];
            $assignSubject->full_mark            = $request->full_mark[$i];
            $assignSubject->pass_mark            = $request->pass_mark[$i];
            $assignSubject->get_mark             = $request->get_mark[$i];

            $assignSubject->save();
        }
    }

        return redirect()->route('setup.assign.subject.view')->with('message','Data Added Successfully');
    }


   public function edit($class_id)
    {
        $this->data['editdata']          = SubjectAssign::where('class_id',$class_id)->orderBy('class_id','asc')->get();

        // dd($this->data['editdata']->toarray());
        $this->data['classes']              = StudentSetup::all();
        $this->data['subjects']             = SubjectAll::all();

    return view('backend.setup.assing_subject.edit-assign-subject',$this->data);

    }


public function update(Request $request,$class_id)


{
	if($request->subject_id==NULL){
        return redirect()->back()->with('error','Sorry! you do not select any item');
      }

     else{
           
        SubjectAssign::where('class_id',$class_id)->delete();

        $countSubject = count($request->subject_id);
        if($countSubject !=Null){
            for ($i=0; $i < $countSubject; $i++) { 
            $assignSubject = New SubjectAssign();

            $assignSubject->class_id             = $request->class_id;
            $assignSubject->subject_id           = $request->subject_id[$i];
            $assignSubject->full_mark            = $request->full_mark[$i];
            $assignSubject->pass_mark            = $request->pass_mark[$i];
            $assignSubject->get_mark             = $request->get_mark[$i];

            $assignSubject->save();
        }
    }

        }
        return redirect()->route('setup.assign.subject.view')->with('message','Data Updated Successfully');
}



public function details($class_id)
    {
  $this->data['editdata']     = SubjectAssign::where('class_id',$class_id)->orderBy('class_id','asc')->get();

        // dd($this->data['editdata']->toarray());

     return view('backend.setup.assing_subject.details-assign_subject',$this->data);

   }


public function delete($id)
{
	if(SubjectAssign::find($id)->delete($id)){
		Session::flash('message','Data Delete Successfully');
	}

	return redirect()->route('setup.assign.subject.view');
}



}
