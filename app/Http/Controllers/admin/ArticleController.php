<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'writer' => 'required',
            'content' => 'required',
            'publish_date' => 'required|date',
            'reference' => 'required',
            'article_image' => 'nullable|image',
        ]);

        $data = $request->all();

        if ($request->hasFile('article_image')) {
            $image_file = $request->file('article_image');
            $image_name = time() . '.' . $image_file->getClientOriginalExtension();
            $image_file->move(public_path('image'), $image_name);
            $data['article_image'] = $image_name;
        }

        $article = new Article($data);
        $article->save();

        return redirect()->route('admin.articles.index')->with('success', 'Article created successfully');
    }

    public function edit($article_id)
    {
        $article = Article::findOrFail($article_id);
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, $article_id)
    {
        $request->validate([
            'title' => 'required',
            'writer' => 'required',
            'content' => 'required',
            'publish_date' => 'required|date',
            'reference' => 'required',
            'article_image' => 'nullable|image',
        ]);

        $article = Article::findOrFail($article_id);
        $data = $request->all();

        if ($request->hasFile('article_image')) {
            $image_file = $request->file('article_image');
            $image_name = time() . '.' . $image_file->getClientOriginalExtension();
            $image_file->move(public_path('image'), $image_name);
            $data['article_image'] = $image_name;
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully');
    }

    public function destroy($article_id)
    {
        $article = Article::findOrFail($article_id);
        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully');
    }
}
