<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\User;

class UserController extends Controller
{

    
public function __construct()
 {
    parent::__construct();
    $this->data['main_menu']  = 'Users';
    $this->data['sub_menu']   = 'Groups';

 }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $this->data['users'] = User::all();

       return view('backend.users.home',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['mode']     = 'create';
        return view('backend.users.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formdata  = $request->all();

        if(User::create($formdata) ) {
            Session::flash('message','Data Added Successfully');
        }

        return redirect()->to('user');
      // return redirect()->to('camp');
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
         $this->data['mode']        = 'Edit';
         $this->data['user']         = User::find($id);


         return view('backend.users.create',$this->data);
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
         $data                    = $request->all();

        $user                      = User::find($id);
        $user->name                = $data['name'];
        $user->email               = $data['email'];

        if($user->save() ) {
           Session::flash('message','Data Updated Successfully');
        }
         return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $user = User::find($id);
         if($user->delete() ) {
            Session::flash('message','Data Delete Successfully');
         }

         if(file_exists('public/upload/user_images/'. $user->image) AND ! empty($user->image)  ) {
            unlink('public/upload/user_images/'. $user->image);
         }

         return redirect('user');
    }



}
