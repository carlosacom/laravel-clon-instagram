<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Symfony\Component\HttpFoundation\Response;

class ImageController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        return view('images.create');
    }

    public function store(Request $request) {
        $request->validate([
            'description' => 'required|string|max:255',
            'image' => 'required|mimes:jpg,png,gif,jpeg,JPG,PNG,GIF,JPEG'
        ]);
        $image = new Image();
        $image->user_id = \Auth::user()->id;
        $image->description = $request->input('description');
        $image_p = $request->file('image');
        $image_path = time() . $image_p->getClientOriginalName();
        \Storage::disk('images')->put($image_path, \File::get($image_p));
        $image->image_path = $image_path;
        $image->save();
        return redirect()->route('home')->with(['message' => 'Se Publicó la imagen con éxito']);
    }
    
    public function show(String $id) {
        $image = Image::find($id);
        return view('images.show', ['image' => $image]);
    }

    public function getImage(String $filename) {
        $file = \Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

}
