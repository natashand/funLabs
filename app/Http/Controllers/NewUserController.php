<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Requests\UserRequest;
use App\newUser;

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
        $user = new newUser();
        return view('user.create', ['user' => $user]);
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UserRequest $request)
    {
        $userData = $request->all();
        if (empty($userData['id'])) {
            $user = new newUser();
        } else {
            $user = newUser::find($userData['id']);
        }
        $user->fill($userData);
        $user->save();

        return redirect('/user')->with('success', 'User has been added');
    }

      /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $user = newUser::findOrFail($id);
        return view('user.create', ['user' => $user]);
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
