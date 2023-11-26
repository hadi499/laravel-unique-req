<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NoteController extends Controller
{
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $userId = auth()->user()->id;

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'tags' => [Rule::unique('notes')->where(function ($query) use ($userId) {
                return $query->where('user_id', $userId);
            })],
            'body' => 'required'
        ]);

        $validatedData['user_id'] = $userId;

        Note::create($validatedData);
        return redirect('/dashboard')->with('success', 'New note added!');
    }
}
