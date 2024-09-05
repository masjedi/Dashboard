<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    //  {
    //     $this->middleware('permission:Create Role', ['only' => ['index']]);
    //     $this->middleware('permission:Edit Role', ['only' => ['create','store','updatepermission','add']]);
    //     $this->middleware('permission:Update Role', ['only' => ['update','edit']]);
    //     $this->middleware('permission:Delete Role', ['only' => ['destroy']]);
        
    //  }

    public function index()
    {
        $roles = Role::get();
        return view('roles.index', compact('roles'));
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
        $request->validate([
            
            'name'=>[
                'required',
                'string',
                'unique:roles,name'
            ]
            ]);

            Role::create([
                'name' => $request->name
            ]);
            
            return redirect('roles')->with('status','Added successfully.');

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
    public function edit(Role $roles, $id)
    {

        $roles = Role::find($id);
        return view('roles.edit', compact('roles'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            
            'name'=>[
                'required',
                'string',
                'unique:roles,name'
            ]
            ]);

            $role->update([
                'name' => $request->name
            ]);
            
            return redirect('roles')->with('status','Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('roles.index')->with('status','Roles deleted successfully.');
    }

    public function add_permission($roleid){
        dd($roleid);
        $permissions = Permission::get();
        $role = Role::findOrFail($roleid);

        $rolepermission = DB::table('role_has_permissions')
        ->where('role_has_permissions.role_id',$role->id)
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();
        return view('roles.newpermission', compact('permissions','role','rolepermission'));
    }

    public function updatepermission(Request $request, $roleid){

        $request->validate([
            'permission' => 'required'
        ]);
        $role = Role::findOrFail($roleid);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with('status','Permission added to Role');
    }
}
