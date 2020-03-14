<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;

class BookController extends Controller
{
    public function index()
    {
        $bookModel = app(Book::class);
        $books = $bookModel->all();

        return view('Books/index', compact('books'));
    }

    public function create()
    {
        return view('Books/create');
    }
    public function store(BookStoreRequest $request)
    {
        $data = $request->all();

        $bookModel = app(Book::class);
        $book = $bookModel->create([
            'name' => $data['name'],
            'writer' => $data['writer'],
            'page_number' => $data['page_number']
        ]);
        return redirect('/book')->with('success', 'Contact saved!');
    }
    public function destroy($id)
    {
        if (!empty($id)) {
            $bookModel = app(book::class);
            $book = $bookModel->find($id);
            if (!empty($book)) {
                $book->delete();
                return response()->json([
                    'status'  => 'success',
                    'message' => 'book deletado com sucesso.',
                    'reload'  => true,
                ]);
            } else {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'book não encontrado.',
                    'reload'  => true,
                ]);
            }
        } else {
            return response()->json([
                'status'  => 'error',
                'message' => 'ID não está na requisição',
                'reload'  => true,
            ]);
        }
    }
    public function edit($id){
        $bookModel = app(book::class);
        $book = $bookModel->find($id);
        
        return view('books/edit', compact('book'));
    }
    public function update(bookUpdateRequest $request,$id){
        $data = $request->all();
        $bookModel = app(book::class);
        $book = $bookModel->find($id);
        $book->update([
            'name'=> $data['name'],
            'writer'=>$data['writer'],
            'page_number'=>$data['page_number']
        ]);
        return redirect()->route('book.index');
    }
}
