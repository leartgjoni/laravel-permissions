<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('created_at','desc')->get();
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
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
            'name'=>'required|string|max:20'
        ));

        $role = new Role;
        $role->name = $request->name;
        $role->slug = str_slug($role->name);

        $role->save();

        return redirect()->route('role.index')->with([
            'flash_message'=>'Role created successfully',
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
        $role = Role::findOrFail($id);
        return view('roles.edit',compact('role'));
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
        $role = Role::findOrFail($id);


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
            $role->permissions = $permissions;
        }else{
            $this->validate($request,array(
                'name'=>'required|string|max:20'
            ));

            $role->name = $request->name;
            $role->slug = str_slug($request->name);
        }

        $role->save();
        return redirect()->back()->with([
            'flash_message'=>'Role updated successfully',
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
        $role = Role::findorFail($id);
        $role->delete();
        return redirect()->route('role.index')->with([
            'flash_message'=>'Role deleted successfully',
            'flash_class'=>'alert-success',
        ]);
    }

    public function getPermissions($id){

        $role = Role::findOrFail($id);

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

        return view('roles.permissions',compact('role','actions'));


    }
}