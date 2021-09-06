<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return view('accounts.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('accounts.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' =>  $request->password,
            'role_id' => $request->role_id
        ]);

        return redirect()->route('account.index');
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
    public function edit($id)
    {
        $get = User::find($id);
        $role = Role::all();

        return view('accounts.edit', compact('get','role'));
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
        $request->validate([
            'name'              =>  "required",
            'username'           =>  'required',
            'password'           =>  'required',
            'role_id'           =>  'required',
        ]);

        $update = User::findOrFail($id);
        $update->name = $request->name;
        $update->username = $request->username;
        $update->password = $request->password;
        $update->role_id = $request->role_id;
        $update->save();

        return redirect()->route('account.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get = User::find($id);
        $get->delete();

        return redirect()->back();
    }
}
