<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Note;
use Illuminate\Http\Request;
use Flash;
use Response;

class NoteController extends AppBaseController
{
    /**
     * Display a listing of the Note.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Note $notes */
        $notes = Note::all();

        return view('notes.index')
            ->with('notes', $notes);
    }

    /**
     * Show the form for creating a new Note.
     *
     * @return Response
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created Note in storage.
     *
     * @param CreateNoteRequest $request
     *
     * @return Response
     */
    public function store(CreateNoteRequest $request)
    {
        $input = $request->all();
        /** @var Note $note */
        $note = Note::create($input);

        Flash::success('Note saved successfully.');

        return redirect(route('notes.index'));
    }

    /**
     * Display the specified Note.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Note $note */
        $note = Note::find($id);

        if (empty($note)) {
            Flash::error('Note not found');

            return redirect(route('notes.index'));
        }

        return view('notes.show')->with('note', $note);
    }

    /**
     * Show the form for editing the specified Note.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Note $note */
        $note = Note::find($id);

        if (empty($note)) {
            Flash::error('Note not found');

            return redirect(route('notes.index'));
        }

        return view('notes.edit')->with('note', $note);
    }

    /**
     * Update the specified Note in storage.
     *
     * @param int $id
     * @param UpdateNoteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNoteRequest $request)
    {
        /** @var Note $note */
        $note = Note::find($id);

        if (empty($note)) {
            Flash::error('Note not found');

            return redirect(route('notes.index'));
        }

        $note->fill($request->all());
        $note->save();

        Flash::success('Note updated successfully.');

        return redirect(route('notes.index'));
    }

    /**
     * Remove the specified Note from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Note $note */
        $note = Note::find($id);

        if (empty($note)) {
            Flash::error('Note not found');

            return redirect(route('notes.index'));
        }

        $note->delete();

        Flash::success('Note deleted successfully.');

        return redirect(route('notes.index'));
    }
}
