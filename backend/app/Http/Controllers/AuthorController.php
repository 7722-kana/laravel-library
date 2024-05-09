<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\User;


class AuthorController extends Controller
{
    private $author;
    private $user;

    public function __construct(Author $author, User $user){
        $this->author = $author;
        $this->user = $user;
    }

    public function index()
    {
        $authorCount = Author::count();
        return view('authors.index', compact('authorCount'));
    }

    public function create()
    {        
        $authors = $this->author->all();
        return view('authors.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
        ]);

        $this->author->create([
            'name' => $request->name,
        ]);

        return redirect()->route('author.create');
    }

    public function edit($id)
    {
        $author = Author::find($id);
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:50',
        ]);

        $author = Author::find($id);
        $author->update([
            'name' => $request->name,
        ]);

        return redirect()->route('author.create');
    }

        public function delete($id)
    {
        $author = Author::findOrFail($id);
        return view('authors.delete', compact('author'));
    }


    public function destroy($id)
    {
        $author = $this->author->findOrFail($id);
        $author->delete();

        return redirect()->route('author.create');
    }


}
