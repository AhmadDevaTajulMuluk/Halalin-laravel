<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class AdminTestimoni extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonis = Testimoni::all();
        return view('admin.testimoni.index', compact('testimonis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimoni.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required',
            'content' => 'required',
            'image' => 'nullable|image',
            'rating' => 'required|numeric',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $image_file = $request->file('image');
            $image_name = time() . '.' . $image_file->getClientOriginalExtension();
            $image_file->move(public_path('images/testimoni'), $image_name);
            $data['image'] = $image_name;
        }

        $testimoni = new Testimoni($data);
        $testimoni->save();

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimoni = Testimoni::findOrFail($id);
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'author' => 'required',
            'content' => 'required',
            'image' => 'nullable|image',
            'rating' => 'required|numeric',
        ]);

        $testimoni = Testimoni::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $image_file = $request->file('image');
            $image_name = time() . '.' . $image_file->getClientOriginalExtension();
            $image_file->move(public_path('images/testimoni'), $image_name);
            $data['image'] = $image_name;
        }

        $testimoni->update($data);

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimoni = Testimoni::findOrFail($id);
        if ($testimoni->image) {
            // Hapus gambar dari direktori jika ada
            $image_path = public_path('images/testimoni/' . $testimoni->image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        $testimoni->delete();

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni deleted successfully');
    }
}
