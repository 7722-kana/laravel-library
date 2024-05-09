<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    const LOCAL_STORAGE_FOLDER = 'public/images/';

    private $book;

    public function __construct(Book $book){
        $this->book = $book;
    }

    // public function index()
    // {
    //     $bookCount = Book::count();
    //     return view('authors.index', compact('bookCount'));
    // }

    public function bookcreate()
    {
        $authors = Author::all();
        $books = Book::all();
        return view('books.bookcreate', compact('authors', 'books'));
    }

    public function bookstore(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'year_published' => 'required|digits:4',
            'cover_photo' => 'image|mimes:jpeg,png,jpg,gif|max:1048',
        ]);

        $this->book->author_id       =   $request->author_id;
        $this->book->title           =   $request->title;
        $this->book->year_published  =   $request->year_published;
        
        if($request->cover_photo){
            $this->book->cover_photo     =   $this->saveImage($request);
        }
    
        $this->book->save();

        return redirect()->route('book.bookcreate');
    }

    private function saveImage($request)
    {
        $cover_photo_name = time() . "." . $request->cover_photo->extension();

        $request->cover_photo->storeAs(self::LOCAL_STORAGE_FOLDER, $cover_photo_name);

        return $cover_photo_name;
    }

    public function show($id)
    {
        $book = $this->book->findOrFail($id);

        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:150',
            'year_published' => 'required|digits:4',
            'cover_photo' => 'image|mimes:jpeg,png,jpg,gif|max:1048',
        ]);

        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->year_published = $request->year_published;

        if ($request->hasFile('cover_photo')) {
            $book->cover_photo = $this->saveImage($request);
        }

        $book->save();

        return redirect()->route('book.show', $id);
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        return view('books.delete', compact('book'));
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('book.bookcreate');
    }

}
