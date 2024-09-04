<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function profil(Request $request) {
        $user = Auth::user();
        return view("auth.profil", compact("user"));
    }

    public function update(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,id',
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->district1 = $request->district1;
        $user->district2 = $request->district2;
        $user->district3 = $request->district3;
        $user->save();
        return redirect()->back();
    }
}
