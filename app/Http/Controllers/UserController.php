<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Route;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at','desc')->get();
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
            'name'=>'required|string|max:20',
            'email'=>'required|min:6|unique:users',
            'password'=>'required|min:6',
            'role_id'=>'required|numeric'
        ));

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('user.index')->with([
            'flash_message'=>'User created successfully',
            'flash_class'=>'alert-success',
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('user.edit',compact('user','roles'));
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
        $user = User::findOrFail($id);

        if($request->has('permissions')){
            $permissions = [];
            foreach($request->permissions as $permission){

                $route_name = explode('.',$permission);
                $permission_key = $route_name[0];
                $permission_value = $route_name[1];

                if(array_key_exists($permission_key, $permissions)){
                    array_push($permissions[$permission_key], $permission_value);
                }else{
                    $permissions[$permission_key] = [$permission_value];
                }
            }
            $user->permissions = $permissions;
        }else{
            $this->validate($request,array(
                'name'=>'required|string|max:20',
                'email'=>'required|min:6',
                'role_id'=>'required|numeric',
                'password' => 'nullable|min:6'
            ));

            $user->name = $request->name;
            $user->email = $request->email;
            if($request->has('password'))
                $user->password = bcrypt($request->password);
            $user->role_id = $request->role_id;
        }

        $user->save();
        return redirect()->back()->with([
            'flash_message'=>'User updated successfully',
            'flash_class'=>'alert-success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorFail($id);
        $user->delete();
        return redirect()->route('user.index')->with([
            'flash_message'=>'User deleted successfully',
            'flash_class'=>'alert-success',
        ]);
    }

    public function getPermissions($id){
        $user = User::findOrFail($id);

        if($id == 1)
            return redirect('/')->with([
                'flash_message'=>'Admin user roles cant be changed',
                'flash_class'=>'alert-danger'
            ]);

        $routes = Route::getRoutes();
        $actions = [];

        foreach($routes as $route){
            if($route->getName() == null)
                continue;

            $route_name = explode('.',$route->getName());
            $permission_key = $route_name[0];
            $permission_value = $route_name[1];

            if(array_key_exists($permission_key, $actions)){
                array_push($actions[$permission_key], $permission_value);
            }else{
                $actions[$permission_key] = [$permission_value];
            }
        }
        return view('user.permissions',compact('user','actions'));
    }
}