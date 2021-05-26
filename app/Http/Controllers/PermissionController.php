<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.permissions.index', ['permissions' => Permission::all()]);
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
            'name' => 'required|unique:permissions',
            'slug' => 'required|unique:permissions',
        ]);

        Permission::create([
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
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', ['permission' => $permission, 'permissions' => Permission::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Permission $permission)
    {
        $permission->name = request('name');
        $permission->slug = request('slug');

        /* Check if the model has been edited, else codes here will not be executed */
        if ($permission->isDirty()) {
            $inputs = request()->validate([
                'name' => 'required|unique:roles',
                'slug' => 'required|unique:roles',
            ]);

            $permission->name = $inputs['name'];
            $permission->slug = $inputs['slug'];

            session()->flash('updated-message', $permission['name']);

            $permission->save();

            return redirect()->route('permissions.index');
        } else {
            session()->flash('not-updated-message', $permission['name']);

            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        session()->flash('deleted-message', $permission->name);

        return redirect()->route('permissions.index');
    }
}
