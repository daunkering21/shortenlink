<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        return view('front.articles');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Articles $articles)
    {
        //
    }
    public function edit(Articles $articles)
    {
        //
    }
    public function update(Request $request, Articles $articles)
    {
        //
    }
    public function destroy(Articles $articles)
    {
        //
    }
}
