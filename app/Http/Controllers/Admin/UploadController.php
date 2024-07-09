<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $imageUrl = url('uploads/' . $imageName);
            
            return response()->json(['url' => $imageUrl]);
        }

        return response()->json(['error' => 'No image uploaded'], 400);
    }
}
