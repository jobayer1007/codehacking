<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Session;
use App\Http\Requests\UserRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        // $this->validate($request, [
        //     'name'      => "required",
        //     'email'     => "required",
        //     'role_id'   => "required",
        //     'is_active' => "required",
        //     'password'  => "required"
        // ]);

        // Password Hashing

        if(trim($request->password) == ''){
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

            // Create User
            // $user = new user;
            // $user->name = $request->input('name');
            // $user->email = $request->input('email');
            // $user->role_id = $request->input('role_id');
            // $user->is_active = $request->input('is_active');
            // $user->password = $request->input('password');
            // $user->save();

            // Create User Different approach

            // User::create($request->all());

            // return redirect('/admin/users');

            // return $request->all();

            // Create User Different approach with photo uploding



            if($file = $request->file('photo_id')){
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                $photo = Photo::create(['file'=>$name]);

                $input['photo_id'] = $photo->id;
            }



            User::create($input);
            return redirect('/admin/users')->with('success','The User has been Created.');
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
        return view('admin.users.show');
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
        $user = User::findOrfail($id);
        // $roles = Role::lists('name','id')->all();

        $roles = Role::all();

        return view('admin.users.edit', compact('user','roles'));
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

        $this->validate($request, [
            'name'      => "required",
            'email'     => "required",
            'role_id'   => "required",
            'is_active' => "required",
            // 'password'  => "required"
        ]);


        $user = User::findOrFail($id);

        if(trim($request->password) == ''){
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $user->update($input);
        return redirect('/admin/users')->with('success','The User has been Updated.');

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
        // User::findOrFail($id)->delete();
        $user = User::findOrFail($id);

        unlink(public_path() . $user->photo->file);

        $user->delete();

        // Session::flash('deleted_user', 'The User has been Deleted.');

        return redirect('/admin/users')->with('success','The User has been Deleted.');
        // return redirect('/admin/users');
    }
}
