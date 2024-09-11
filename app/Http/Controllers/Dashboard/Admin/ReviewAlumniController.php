<?php

namespace App\Http\Controllers\dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReviewAlumni;
use Illuminate\Support\Facades\Storage;

class ReviewAlumniController extends Controller
{
    public function index()
    {
        $data = ReviewAlumni::all();

        return view('dashboard.admin.review-alumni.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reviews = ReviewAlumni::all();
        return view('dashboard.admin.review-alumni.create', compact('reviews'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $file = $request->file('photo');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        $photo_path = $request->file('photo')->storeAs('public/reviews', $filename);
        $photo_path = str_replace('public/', '', $photo_path);

        $reviews = ReviewAlumni::create([
            'name' => $data['name'],
            'nim' => $data['nim'],
            'phone' => $data['phone'],
            'angkatan' => $data['angkatan'],
            'tempat_kerja' => $data['tempat_kerja'],
            'experience' => $data['experience'],
            'motivation' => $data['motivation'],
            'instagram' => $data['instagram'],
            'photo' => $photo_path,
        ]);

        return redirect()->route('dashboard.admin.review-alumni.index');
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
    public function edit(Request $request, string $id)
    {
        $ganti = ReviewAlumni::find($id);
        return view('dashboard.admin.review-alumni.edit', compact('ganti'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $file = $request->file('photo');
        if ($file != null) {
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $photo_path = $request->file('photo')->storeAs('public/reviews', $filename);
            $photo_path = str_replace('public/', '', $photo_path);
        }

        $ganti = ReviewAlumni::find($id);
        $ganti->name = $request->name;
        $ganti->nim = $request->nim;
        $ganti->phone = $request->phone;
        $ganti->angkatan = $request->angkatan;
        $ganti->tempat_kerja = $request->tempat_kerja;
        $ganti->experience = $request->experience;
        $ganti->motivation = $request->motivation;
        $ganti->instagram = $request->instagram;
        if (isset($photo_path)) {
            $ganti->photo = $photo_path;
        }
        $ganti->save();
        return redirect()->route('dashboard.admin.review-alumni.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ganti = ReviewAlumni::find($id);
        try {
            Storage::delete('public/' . $ganti->photo);
            $ganti->delete();
        } catch (\Throwable $th) {
        }
        $ganti->delete();
        return redirect()->route('dashboard.admin.review-alumni.index')->with('success', 'Data Berhasil Dihapus');
    }
}
