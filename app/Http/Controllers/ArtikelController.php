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
        $articles = Article::paginate(5); // Menampilkan 10 artikel per halaman
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
        $profile = Profile::where('user_id', auth()->id())->first();
        $article = DB::table('articles')->where('article_id', $id)->first();

        // Increment viewers
        DB::table('articles')->where('article_id', $id)->increment('viewers');

        return view('user.artikel.content', compact('article', 'profile'));
    }
    public function search(Request $request)
    {
        $profile = Profile::where('user_id', auth()->id())->first();
        $searchQuery = $request->input('search');
        $filter = $request->input('filter');

        $query = Article::query();

        if ($searchQuery) {
            $query->where('title', 'LIKE', "%{$searchQuery}%");
        }

        if ($filter == 'populer') {
            $query->orderByRaw('RANK() OVER (ORDER BY viewers DESC)');
        }

        $articles = $query->paginate(5);

        return view('user.artikel.artikel', compact('profile', 'articles'));
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
