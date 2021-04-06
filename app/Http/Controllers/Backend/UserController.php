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
       $this->data['users'] = User::where('usertype','Admin')->get();

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

        $this->validate($request,[
          'name' => 'required',
          'email' => 'required|unique:users,email',
        ]);

        $data = New User();
        $code=rand(0000,9999);
        $data->usertype  = 'Admin';
        $data->role      = $request->role;
        $data->name      = $request->name;
        $data->email     = $request->email;
        $data->password  = bcrypt($code);
        $data->code      = $code;
 
       $data->save();
       return redirect()->to('user')->with('message','Data Added Successfully');
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
        
         $this->data['user']         = User::find($id);


         return view('backend.users.edit',$this->data);
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
          $data =User::find($id);

        // $data->usertype  = $request->usertype;
        $data->name      = $request->name;
        $data->email     = $request->email;

       $data->save();
       return redirect()->to('user')->with('message','Data Update Successfully');
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
