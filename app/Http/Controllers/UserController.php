<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;
use File;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(20);
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'description' => $request->description,
        ]);
        Session::flash('success','User created successfully');
        return redirect()->back();
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
    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,$user->id",
            'password' => 'sometimes|nullable|min:8'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->description = $request->description;
        $user->save();

        Session::flash('success','User updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        
        if($user){
            $user->delete();
            Session::flash('success','User deleted successfully');
        }
        return redirect()->back();
    }
    //profile show

    public function profile(){
        $user = auth::User();
        return view('admin.user.profile',compact('user'));
    }
    //profile update
    public function profile_update(Request $request){

        $user = auth()->user();

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,$user->id",
            'password' => 'sometimes|nullable|min:8',
            'image' => 'sometimes|nullable|image|max:2048',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->description = $request->description;
        $user->save();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('storage/user',$filename);
            $user->image = $filename;
            $user->save();
        }
        Session::flash('success','Post update successfully');
        return redirect()->back();
    }
}
