<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\FeeCategory;
use App\Http\Requests\FeeCategoryRequest;
use App\Http\Requests\UpdateGroupRequest;



class FeeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $this->data['fee']  = FeeCategory::all();

        return view('backend.setup.fee_category.view-fee-category',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $this->data['mode']            = 'Create';
        return view('backend.setup.fee_category.form-fee-category',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeeCategoryRequest $request)
    {
        $formdata =$request->all();

        if(FeeCategory::create($formdata) ) {
            Session::flash('message','Data Added Successfully');
        }

        return redirect()->to('fee');
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
         $this->data['mode']           = 'Edit';
         $this->data['fee']            = FeeCategory::find($id);

        return view('backend.setup.fee_category.form-fee-category',$this->data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeeCategoryRequest $request, $id)
    {
        $data                      = $request->all();

        $fee                       = FeeCategory::find($id);
        $fee->fee                  = $data['fee'];

        if($fee->save() ) {
           Session::flash('message','Data Updated Successfully');
        }
         return redirect()->to('fee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fee = FeeCategory::find($id);
         if($fee->delete() ) {
            Session::flash('message','Data Delete Successfully');
         }

         return redirect()->to('fee');
    }
}
