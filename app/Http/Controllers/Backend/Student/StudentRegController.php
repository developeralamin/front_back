<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\AssignStudent;
use App\Models\StudentShift;
use App\Models\Year;
use App\Models\StudentSetup;
use App\Models\StudentGroup;

use DB;




class StudentRegController extends Controller
{
    public function index()
    {
    	$this->data['allData'] = AssignStudent::all();
    	return view('backend.student.student_reg.view-student',$this->data);
    }


    public function create()
    {

    	$this->data['years']       = Year::all();
    	$this->data['classes']     = StudentSetup::all();
    	$this->data['shifts']      = StudentShift::all(); 	
    	$this->data['groups']      = StudentGroup::all();

    	return view('backend.student.student_reg.add-student',$this->data);
    }

    public function store(Request $request)
    {
    	
    }
}
