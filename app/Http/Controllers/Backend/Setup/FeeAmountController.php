<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\FeeCategory;
use App\Models\StudentSetup;
use App\Models\FeeCategoryAmount;
use App\Http\Requests\FeeCategoryRequest;


class FeeAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['amount'] = FeeCategoryAmount::all();

        return view('backend.setup.fee_amount.view-fee-amount',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['fee_categories']    = FeeCategory::all();
        $this->data['classes']           = StudentSetup::all();
        return view('backend.setup.fee_amount.add-fee-amount',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $countClass = count($request->class_id);
    
    if($countClass !=Null){
        for ($i=0; $i < $countClass; $i++) { 
            $fee_amount = New FeeCategoryAmount();

            $fee_amount->fee_category_id   = $request->fee_category_id;
            $fee_amount->class_id          = $request->class_id[$i];
            $fee_amount->amount            = $request->amount[$i];

            $fee_amount->save();
        }
    }

        return redirect()->to('amount');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
