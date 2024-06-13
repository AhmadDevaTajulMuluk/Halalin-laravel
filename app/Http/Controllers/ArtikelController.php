<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Profile;
use App\Models\Ustadz;
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
        if (auth('ustadz')->check()) {
            $ustadz = Ustadz::where('ustadz_id', auth('ustadz')->id())->first();
            return view('ustadz.artikel', compact('profile', 'articles'));
        }
        return view('user.artikel.artikel', compact('profile', 'articles'));
    }

    public function render()
    {
        if (auth('ustadz')->check()) {
            $ustadz = Ustadz::where('user_id', auth()->id())->first();
            return view('components.navbarustadz', compact('ustadz'));
        }
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
    public function show(Request $request, $id)
    {
        $profile = Profile::where('user_id', auth()->id())->first();
        $article = DB::table('articles')->where('article_id', $id)->first();
        $ipAddress = $request->ip();

        // Check if the IP has already viewed the article
        $existingView = DB::table('article_views')
            ->where('article_id', $id)
            ->where('ip_address', $ipAddress)
            ->first();

        if (!$existingView) {
            // Increment viewers if not already viewed from this IP
            DB::table('articles')->where('article_id', $id)->increment('viewers');

            // Store the view record
            DB::table('article_views')->insert([
                'article_id' => $id,
                'ip_address' => $ipAddress,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if (auth('ustadz')->check()) {
            $ustadz = Ustadz::where('ustadz_id', auth('ustadz')->id())->first();
            return view('user.artikel.content', compact('profile', 'article', 'ustadz'));
        }

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
        if (auth('ustadz')->check()) {
            $ustadz = Ustadz::where('ustadz_id', auth('ustadz')->id())->first();
            return view('ustadz.artikel', compact('profile', 'articles', 'ustadz'));
        }
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
