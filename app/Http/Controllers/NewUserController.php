<?php

namespace App\Http\Controllers;

use App\newUser;
use Illuminate\Http\Request;

class NewUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = newUser::all();
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);

        $user = new newUser([
            'name' => $request->get('name'),
            'password' => $request->get('password'),
            'email' => $request->get('email'),
            'role' => $request->get('role')
        ]);

       $user->save();

        return redirect('/user')->with('success', 'User has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\newUser  $newUser
     * @return \Illuminate\Http\Response
     */
    public function show(newUser $newUser)
    {
        //
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $user = newUser::findOrFail($id);
        return view('user.edit', ['user' => $user]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);

        $user = newUser::find($id);
        $user->name = $request->get('name');
        $user->password = $request->get('new_password');
        $user->email = $request->get('email');
        $user->role = $request->get('role');
        $user->save();

        return redirect('/user')->with('success', 'User has been added');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        newUser::find($id)->delete();
        return redirect('/user')->with('success', 'User has been added');
    }

}
