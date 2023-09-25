<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {

        $actionStatus = session('actionStatus');
        $actionMessage = session('actionMessage');

        session()->forget(['actionStatus', 'actionMessage']);

        return view('role.permission.index', [
            'roles' => Role::all(),
            'permissions' => Permission::all(),
            'rolePermissionIds' => $role->permissions->pluck('id')->all(),
            'actionStatus' => $actionStatus,
            'actionMessage' => $actionMessage
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermissionRequest  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }

    public function assign(Role $role, Request $request)
    {
        $permissionIds = $request->input('permission_ids', []);

        $role->permissions()->sync($permissionIds);

        $roleTitle = ucfirst($role->title);

        return redirect()->route('roles.permissions.index', $role->id)
        ->with('actionStatus', 'success')
        ->with('actionMessage', "Successfully change permissions of $roleTitle role");
    }
}
