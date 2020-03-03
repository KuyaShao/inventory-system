<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RolesRequest;
use App\Http\Requests\UsersRequest;
use App\Role;
use App\User;
use Exception;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        if(Gate::denies('manage-users')){
            return view('statusCode');
        }

        $users = User::paginate(10);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        if(Gate::denies('manage-users')){
            return view('statusCode');
        }
        $role=Role::all();
        return view('admin.users.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UsersRequest $request
     * @param User $user
     * @return void
     */
    public function store(UsersRequest $request)
    {
        //
      //  dd($request->roles);
        if(Gate::denies('manage-users')){
            return view('statusCode');
        }
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),

        ]);
        $user->role()->attach($request->roles);

        return back()->with('success','Successfully Save');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        //
        if(Gate::denies('manage-users')){
            return view('statusCode');
        }
        $roles = Role::all();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UsersRequest $request
     * @param User $user
     * @return void
     */
    public function update(RolesRequest $request, User $user)
    {
        //
        if(Gate::denies('manage-users')){
            return view('statusCode');
        }
       $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        $user->role()->sync([$request->roles]);
        return back()->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     * @throws Exception
     */
    public function destroy(User $user)
    {
        //

        if(Gate::denies('manage-users')){
            return view('statusCode');
        }
        $user->role()->detach();
        $user->delete();
        return back()->with('success','Successfully Deleted');
    }
}
