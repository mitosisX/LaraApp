<?php
/*     Projects started: 1:33 PM 11 September, 2022
        -- This is being written 20:56 PM (same day)

        Finished and published to GitHub
            -- 21:35 PM (same time writing this)

 */

namespace App\Http\Controllers;

use App\Models\Notes;
use App\Models\Notes_Props;
use Illuminate\Http\Request;
use App\Http\Requests\NoteValidatorRequest;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Notes::all();

        return view('notes.index', 
            compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteValidatorRequest $request)
    {
        $request->validated();

        $validatedData = $request->safe()->only(['color']);

        $color = $validatedData['color'];
        
        $notes = Notes::create($request->all());
        
        $id = $notes->id;

        $notes->addColor($id, $color);

        return redirect()->route('notes.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Notes $note)
    {
        return view('notes.show.index',compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Notes $note)
    {
        return view('notes.edit.index', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoteValidatorRequest $request, Notes $note)
    {
        $request->validated();

        $validatedData = $request->safe()->only(['color']);

        $color = $validatedData['color'];
        
        $note->update($request->validated()->only(['title', 'content']));
        
        Notes_Props::find($note->id)->update([
            'color' => $color
        ]);

        return redirect()->route('notes.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notes $note)
    {
        $note->delete();

        return redirect()->route('notes.home');
    }
}
