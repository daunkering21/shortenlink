<?php

namespace App\Http\Controllers;

use App\Models\ShortenedLinks;
use Illuminate\Http\Request;

class ShortenedLinksController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'url',
        ]);
        dd($request);
    }
    public function show(ShortenedLinks $shortenedLinks, $username)
    {
        //
    }
    public function edit(ShortenedLinks $shortenedLinks, $username)
    {
        //
    }
    public function update(Request $request, ShortenedLinks $shortenedLinks)
    {
        //
    }
    public function destroy(ShortenedLinks $shortenedLinks)
    {
        //
    }
    public function latest()
    {
        
    }
}
