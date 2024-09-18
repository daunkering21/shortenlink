<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function save(Request $request)
    {
        
    }

    public function testgeboymujaer()
    {
        return view('testgeboymujaer');
    }

    public function terimagambar(Request $request)
    {
        // Validasi bahwa file yang diterima adalah gambar
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif', // Validasi gambar
        ]);
    
        // Simpan file ke direktori tertentu
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public'); // Simpan di storage/app/public/uploads
    
            // Kembalikan respons sukses
            return response()->json(['success' => true, 'file_path' => $filePath], 200);
        }
    
        // Jika file tidak ada atau error
        return response()->json(['success' => false, 'message' => 'File tidak diterima'], 400);
    }    
}
