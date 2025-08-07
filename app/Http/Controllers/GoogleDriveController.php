<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GoogleDriveController extends Controller
{
    public function uploadForm()
    {
        return view('google-drive.upload');
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
        ]);

        $file = $request->file('file');
        Storage::disk('google')->put($file->getClientOriginalName(), file_get_contents($file));

        return redirect('/google-drive/files')->with('success', 'File uploaded successfully!');
    }

    public function fileList()
    {
        $files = Storage::disk('google')->allFiles();
        return view('google-drive.files', compact('files'));
    }

    public function downloadFile($filename)
    {

        if (Storage::disk('google')->exists($filename)) {
            return Storage::disk('google')->download($filename);
        }

        abort(404, 'File not found on Google Drive.');
    }
}