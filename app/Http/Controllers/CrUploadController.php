<?php

namespace App\Http\Controllers;

use App\Models\CrUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CrUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $uploads = CrUpload::with('uploader')->latest()->get();
        return view('cr_uploads.index', compact('uploads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cr_uploads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv'
        ]);

        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('cr_uploads', $filename, 'public');

        CrUpload::create([
            'filename' => $filename,
            'uploaded_by' => Auth::id(),
        ]);

        return redirect()->route('cr-uploads.index')->with('success', 'File uploaded successfully!');

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
