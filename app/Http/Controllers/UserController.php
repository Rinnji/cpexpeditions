<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);
        if ($user->is_admin == 0) {
            $user->is_admin = 1;
        } else {
            $user->is_admin = 0;
        }
        $user->update();
        return redirect('users');
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('users');
    }
}
