<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Designation;
use App\Http\Requests\DesingnationRequest;



class DesingnationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $this->data['designation_setups'] = Designation::all();

         return view('backend.setup.designation.view-desingation',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['mode'] = 'Create';
        return view('backend.setup.designation.form-desingation',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DesingnationRequest $request)
    {
        $formdata  = $request->all();

        if(Designation::create($formdata)) {
            Session::flash('message','Data Added Successfully');
        }

        return redirect()->to('designation_setup');
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
        $this->data['mode']                 = 'Edit';
        $this->data['designation_setups']   = Designation::find($id);

         return view('backend.setup.designation.form-desingation',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DesingnationRequest $request, $id)
    {
        $data                          = $request->all();


        $designation                   = Designation::find($id);
        $designation->designation      = $data['designation'];

       if($designation->save()) {
        Session::flash('message','Data Update Successfully');
       }

        return redirect()->to('designation_setup');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Designation::find($id)->delete()) {
            Session::flash('message','Data Delete Successfully');
        }

        return redirect()->to('designation
            _setup');
    }
}
