<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function __construct()
    {
       $this->middleware('permission:Create User', ['only' => ['index']]);
       $this->middleware('permission:Edit User', ['only' => ['create','store']]);
       $this->middleware('permission:Update User', ['only' => ['update','edit']]);
       $this->middleware('permission:Delete User', ['only' => ['destroy']]);
       
    }

    public function index(){
        
        $users = User::get();
        return view('user.index', ['users'=>$users]);
    }

    public function create(){

        $roles = Role::pluck('name','name')->all();
        return view('user.create',compact('roles'));
    }
    public function store(Request $request){
        
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255|unique:users,email',
            'password'=>'required|string|min:8|max:20',
            'roles'=>'required'
        ]);

        $users = User::create([

            'name' => $request -> name,
            'email' => $request -> email,
            'password' => Hash::make($request->password),
        ]);
        
        $users->syncRoles($request->roles);
    return redirect('users')->with('status','User added successfully');
    }

    public function edit(User $user){
        

        $roles = Role::pluck('name','name')->all();
        $userRoles = $user->roles->pluck('name','name')->all();
        return view('user.edit', compact('user','roles','userRoles'));
    }
    public function update(Request $request, User $user){

        $request->validate([
            'name'=>'required|string|max:255',
            'password'=>'nullable|string|min:8|max:20',
            'roles'=>'required'
        ]);

        $data = [

            'name' => $request -> name,
            'email' => $request -> email,
        ];

        if(!empty($request->password)){
            $data += [
                'password' => Hash::make($request->password),
            ];
        }
        $user->update($data);
        $user->syncRoles($request->roles);
        return redirect('users')->with('status','User updated successfully, with Roles.');
    }
    public function destroy($id){

        $users = User::findOrFail($id);
        $users->delete();
        return redirect('users')->with('status','User deleted successfully.');

    }
}
