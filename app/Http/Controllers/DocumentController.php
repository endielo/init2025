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
        return Inertia::render('Documents/Create');
    }

    public function store(DocumentRequest $request)
    {
        $validated = $request->validated();

        Document::create($validated);

        return redirect()->route('documents.index');
    }

    public function edit(Document $document)
    {
        return Inertia::render('Documents/Edit', [
            'document' => $document,
        ]);
    }

    public function update(DocumentRequest $request, Document $document)
    {
        $validated = $request->validated();

        $document->update([
            // TODO: Add document fields
        ]);

        return redirect()->route('documents.index');
    }

    public function destroy(Document $document)
    {
        $document->delete();

        return redirect()->route('documents.index');
    }
}
