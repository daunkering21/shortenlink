<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.index');
    }
    public function loginPage()
    {
        return view('front.login');
    }
    public function registerPage()
    {
        return view('front.register');
    }

    public function showMedia()
    {
        return view('front.upload');
    }
    public function uploadImage(Request $request)
    {
        try {
            // Pastikan 'images' bisa berupa array atau single file
            $request->validate([
                'images'   => 'required',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif', // Tambahkan batasan ukuran
            ]);
    
            $paths = [];
    
            if ($request->hasFile('images')) {
                $files = is_array($request->file('images')) ? $request->file('images') : [$request->file('images')];
    
                foreach ($files as $image) {
                    $paths[] = $image->store('uploads', 'public');
                }
    
                return response()->json([
                    'status'  => 'success',
                    'message' => 'File uploaded successfully',
                    'paths'   => $paths,
                ]);
            }
    
            return response()->json([
                'status'  => 'error',
                'message' => 'No file uploaded',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
    
}
