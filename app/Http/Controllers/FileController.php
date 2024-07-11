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

        // return $request;
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx,jpeg,jpg,png',
        ]);



        // Photo
        if ($request->file('file')) {
            $file = $request->file('file');

            $fileModel = new File();

            $image_full_name = time().'file'.'.'.$file->getClientOriginalExtension();
            $upload_path = 'officedocuments/';
            $image_url = $upload_path.$image_full_name;
            $success = $file->move($upload_path, $image_full_name);

            $fileModel->name = $file->getClientOriginalName();
            $fileModel->path = $image_url;
            $fileModel->mime_type = $file->getClientMimeType();
            $fileModel->save();
        }

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $file = File::findOrFail($id);

        return view('files.preview', compact('file'));
    }

    /**
     * Display the specified resource.
     */
    public function downloadFile($id)
    {

        $file = File::findOrFail($id);
        $filePath = public_path($file->path);

        if (file_exists($filePath)) {
            return response()->download($filePath, $file->name);
        } else {
            return redirect()->back()->with('error', 'File not found.');
        }
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
    public function destroy($id)
    {
        $file = File::findOrFail($id);
        $filePath = public_path($file->path);

        if (file_exists($filePath)) {
            unlink($filePath); // Delete the file from the server
        }

        $file->delete(); // Delete the file record from the database

        return redirect()->back()->with('success', 'File deleted successfully.');
    }
}
