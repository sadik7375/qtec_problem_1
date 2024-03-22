<?php

namespace App\Http\Controllers\Notes;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $userId = Auth::id();

        $notes = Note::where('created_by', $userId)->get();

        return view('notes.alltask', compact('notes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status'=>'nullable|string',
             'created_by'=>'nullable|string',


        ]);



        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'status'=>$request->status,
            'created_by'=>auth()->id()
        ];



        Note::create($data);

        return redirect()->route('notes.list')->with('success', 'Note created successfully.');


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

        $note = Note::find($id);
        return view("notes.edit", compact('note'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'nullable|string',

        ]);

        $note->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,

        ]);

        return redirect()->route('notes.list')->with('success', 'Note updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return redirect()->route('notes.list')->with('success', 'Note deleted successfully');
    }



    public function search(Request $request)
    {
        $query = $request->input('query');


        $notes = Note::where('title', 'like', "%$query%")
            ->orWhere('status', 'like', "%$query%")
            ->get();


        return view('notes.search', compact('notes'));
    }










}
