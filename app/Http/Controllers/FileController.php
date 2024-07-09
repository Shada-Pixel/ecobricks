<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::all();
        return view('files.index', compact('files'));
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
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx,jpeg,jpg,png|max:2048',
        ]);

        $file = $request->file('file');
        $path = $file->store('uploads');

        $fileModel = new File();
        $fileModel->name = $file->getClientOriginalName();
        $fileModel->path = $path;
        $fileModel->save();

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        $file = File::findOrFail($id);
        return Storage::download($file->path, $file->name);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        $file = File::findOrFail($id);
        Storage::delete($file->path);
        $file->delete();

        return redirect()->back()->with('success', 'File deleted successfully.');
    }
}
