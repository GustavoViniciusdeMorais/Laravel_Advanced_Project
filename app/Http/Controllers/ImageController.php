<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            'url' => ['required', 'string'],
            'imageable_id' => ['required', 'numeric'],
            'imageable_type' => ['required', 'string']
        ]);

        $image = Image::create($validate);

        return response()->json(['sucess', $image]);
    }

    public function show($id)
    {
        try{
            $image = Image::find($id);
            return response()->json([$image->imageable]);
        }catch(\Exception $e){
            return [
            'msg' => $e->getMessage(), 
            'file' => $e->getFile(), 
            'line' => $e->getLine(), 
            'trace' => $e->getTrace()];
        }
    }
}
