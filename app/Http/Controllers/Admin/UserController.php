<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Repositories\Eloquent\UserRepository;
use App\Http\Requests\StoreUserRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepository $user)
    {
        // $this->middleware('is.admin');
        $this->userRepo = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->orderBy('id','DESC')->paginate(5);
        // dd($users);
        // dd($users->links('vendor.pagination.bootstrap-4'));
        return view('admin.users.list', compact(['users']));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::with('roles')->get();
        $roles =Role::all();

        return view('admin.users.create', compact(['users','roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->except(['role']);
        $role =$request->only('role');

        $data['password']=bcrypt($request->password);
        dd($data);
        User::create($data);
        $user = User::with('roles')->orderBy('id','desc')->first();
        $user->assignRole($role);

        return redirect()->route('admin.users.list')
        ->with('success','User created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        $data = 'Name: ' . $user->name
            . '<br/>Email: ' . $user->email
            . '<br/>User ID: ' . $user->id;

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('roles')->find($id);
        $roles =Role::all();

        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->userRepo->find($id);
        // DB::enableQueryLog();
        $data = $request->except('role');
        $role =$request->only('role');
        $user->update($data);
        $user->assignRole($role);

        return redirect()->route('admin.users.list')
        ->with('update','User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->userRepo->find($id);
        $user->delete();
        return redirect()->route('admin.users.list')
        ->with('delete','User deleted successfully!');
    }


    public function searchByName(Request $request)
    {
        $users = User::where('name', 'like', '%' . $request->value . '%')->get();

        return response()->json($users);
    }

    public function searchByEmail(Request $request)
    {
        $users = User::where('email', 'like', '%' . $request->value . '%')->get();

        return response()->json($users);
    }

    public function searchAll(Request $request)
    {
        $users = User::where('email', 'like', '%' . $request->q . '%')
        ->orWhere('name', 'like', '%' . $request->q . '%')
        ->paginate(3);

        // dd();
        return view('admin.users.listSearch',compact('users'));
    }




}
