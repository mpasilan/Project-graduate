<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class Manage_usersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
       $arr['users'] = User::all();
       $role['role'] = Role::all();

        return view('admin.manage_users.index')->with($arr)->with($role);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {
      $arr['role'] = Role::all();
      return view('admin.manage_users.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_role' => ['required'],
        ]);

        
         User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'user_role' => $request['user_role'],
        ]); 
        

        return redirect('admin/manage_users')->with('success', 'User added successfully.');
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
    $roles=Role::all();
    $user = User::where('id', $id)->get();
       return view('admin.manage_users.edit',compact('user','roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
       
        if ($request->password == null){
             $user = User::findOrFail($request->user_id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->user_role = $request->user_role;
                $user->update();
        }
        else{
            $user = User::findOrFail($request->user_id);
            
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->user_role = $request->user_role;
                $user->update();
         
        }
      
         return back()->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->delete();
         return redirect()->back()->with('success', 'User removed successfully!');
    }
}
