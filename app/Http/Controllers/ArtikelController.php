<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::where('user_id', auth()->id())->first();
        $articles = Article::all();
        return view('user.artikel.artikel', compact('profile'), compact('articles'));
    }

    public function render()
    {
        $profile = Profile::where('user_id', auth()->id())->first();
        return view('components.navbar', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $article = Article::findOrFail($id);
        $profile = Profile::where('user_id', auth()->id())->first();
        $article = DB::table('articles')->where('article_id', $id)->first();

        return view('user.artikel.content', compact('article'), compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
