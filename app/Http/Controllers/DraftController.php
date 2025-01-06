<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie; // Pastikan model Movie sudah ada

class DraftController extends Controller
{
    // Menampilkan form edit
    public function edit($id)
    {
        $draft = Movie::findOrFail($id);
        return view('drafts.edit', compact('draft'));
    }

    // Memperbarui data draft
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
        ]);

        $draft = Movie::findOrFail($id);
        $draft->update($request->all());

        return redirect()->route('draft.index')->with('alert', 'Draft updated successfully!');
    }

    // Menghapus data draft
    public function destroy($id)
    {
        $draft = Movie::findOrFail($id);
        $draft->delete();

        return redirect()->route('draft.index')->with('alert', 'Draft deleted successfully!');
    }
}
