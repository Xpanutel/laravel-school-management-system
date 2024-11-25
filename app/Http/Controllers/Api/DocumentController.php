<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        return Document::with('teacher')->get();
    }

    public function show($id)
    {
        return Document::with('teacher')->findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:200',
            'file' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $path = $request->file('file')->store('documents');

        $document = Document::create([
            'title' => $request->title,
            'file_path' => $path,
            'uploaded_by' => auth()->id(),
        ]);

        return response()->json($document, 201);
    }

    public function update(Request $request, $id)
    {
        $document = Document::findOrFail($id);

        $request->validate([
            'title' => 'sometimes|required|string|max:200',
            'file' => 'sometimes|file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('file')) {
            if (Storage::exists($document->file_path)) {
                Storage::delete($document->file_path);
            }

            $path = $request->file('file')->store('documents');
            $document->file_path = $path;
        }

        $document->title = $request->input('title', $document->title);
        $document->save();

        return response()->json($document);
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        
        if (Storage::exists($document->file_path)) {
            Storage::delete($document->file_path);
        }

        $document->delete();
        
        return response()->json(null, 204);
    }

    public function download($id)
    {
        $document = Document::findOrFail($id);
        return Storage::download($document->file_path);
    }
}
