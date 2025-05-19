<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DocumentRequest;

use App\Models\Document;
use Inertia\Inertia;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::paginate(50);

        return Inertia::render('Documents/Index', [
            'documents' => $documents,
        ]);
    }

    public function create()
    {
        return Inertia::render('Documents/Create', [
            'documentLines' => [],
        ]);
    }

    public function store(DocumentRequest $request)
    {
        $validated = $request->validated();

        $document = Document::create($validated);

        if (isset($validated['document_lines'])) {
            foreach ($validated['document_lines'] as $line) {
                $document->documentLines()->create($line);
            }
        }

        return redirect()->route('documents.index');
    }

    public function edit(Document $document)
    {
        return Inertia::render('Documents/Edit', [
            'document' => $document,
            'documentLines' => $document->documentLines,
        ]);
    }

    public function update(DocumentRequest $request, Document $document)
    {
        $validated = $request->validated();

        $document->update($validated);

        if (isset($validated['document_lines'])) {
            // Delete existing document lines
            $document->documentLines()->delete();

            // Create new document lines
            foreach ($validated['document_lines'] as $line) {
                $document->documentLines()->create($line);
            }
        }

        return redirect()->route('documents.index');
    }

    public function destroy(Document $document)
    {
        $document->delete();

        return redirect()->route('documents.index');
    }
}
