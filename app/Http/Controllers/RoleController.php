<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.roles.index', ['roles' => Role::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|unique:roles',
            'slug' => 'required|unique:roles',
        ]);

        Role::create([
            'name' => request('name'),
            'slug' => request('slug'),
        ]);

        session()->flash('created-message', $request['name']);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', ['role' => $role, 'permissions' => Permission::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role)
    {
        $role->name = request('name');
        $role->slug = request('slug');

        /* Check if the model has been edited, else codes here will not be executed */
        if ($role->isDirty()) {
            $inputs = request()->validate([
                'name' => 'required|unique:roles',
                'slug' => 'required|unique:roles',
            ]);

            $role->name = $inputs['name'];
            $role->slug = $inputs['slug'];

            session()->flash('updated-message', $role['name']);

            $role->save();

            return redirect()->route('roles.index');
        } else {
            session()->flash('not-updated-message', $role['name']);

            return back();
        }

    }

    public function attach(Role $role)
    {
        $role->permissions()->attach(request('permission'));

        return back();
    }

    public function detach(Role $role)
    {
        $role->permissions()->detach(request('permission'));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        session()->flash('deleted-message', $role->name);

        return back();
    }
}
