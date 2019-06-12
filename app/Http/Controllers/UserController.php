<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function config() {
        return view('user.config');
    }
    public function update(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nick' => ['required', 'string', 'max:255', 'unique:users,nick,' . \Auth::user()->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email, ' . \Auth::user()->id]
        ]);
        $user = \Auth::user();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->nick = $request->input('nick');
        $user->email = $request->input('email');

        // subir imagen
        $image_p = $request->file('image');
        if (!is_null($image_p)) {
            $image_path = time() . $image_p->getClientOriginalName();
            Storage::disk('users')->put($image_path, File::get($image_p));
            $user->image = $image_path;
        }
        $user->update();
        return redirect()->route('config')->with(['message' => 'Usuario actualizado correctamente']);
    }
}
