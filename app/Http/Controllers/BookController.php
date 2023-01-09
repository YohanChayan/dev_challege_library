<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(5);
        return view('books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('name')->pluck('name')->toArray();
        
        return view('books.create-edit')
        ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^([^0-9]*)$/',
            'author' => 'required|regex:/^([^0-9]*)$/',
            'category' => 'required',
            'published_date' => 'required',
        ]);
        
        $newBook = new Book($request->except('_token'));
        $newBook->save();

        Alert::toast('Nuevo libro agregado correctamente!', 'success');
        return redirect('books');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        
        $categories = Category::select('name')->pluck('name')->toArray();
        return view('books.create-edit')
        ->with('book', $book)
        ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|regex:/^([^0-9]*)$/',  //No Numbers
            'author' => 'required|regex:/^([^0-9]*)$/',  //No Numbers
            'category' => 'required',
            'published_date' => 'required',
        ]);
        
        $book = Book::find($id);

        if(isset($book)){

            $book->fill($request->except('_token') );
            $book->save();
            Alert::toast('Libro actualizado correctamente!', 'success');

        }else
            Alert::toast('Recurso no encontrado!', 'error');
        
        return redirect('books');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(isset($id)){
            $book = Book::find($id);
            $book->delete();
            Alert::toast('Libro eliminado correctamente!', 'success');

        }else
            Alert::toast('Recurso no encontrado!', 'error');

        return redirect('books');
    }

    public function borrows($id)
    {
        $book = Book::find($id);

        if(isset($book)){
            $users = User::select('id', 'name', 'email')->where('role', '!=', 'admin')->get();
            return view('books.borrows')->with('book', $book)->with('users', $users);
        }
        
        Alert::toast('Recurso no encontrado!', 'error');
        return redirect('books');
    }

    public function assignUser(Request $request)
    {
        $request->validate([
            'book' => 'required|numeric',
            'user' => 'required|numeric',
        ]);
        $book_id = $request->input('book');
        $user_id = $request->input('user');

        $book = Book::find($book_id);


        if(isset($book)){

            $book->user_id = $user_id;
            $book->save();
            
            Alert::toast('Prestamo asignado correctamente!', 'success');

        }else
            Alert::toast('Recurso no encontrado!', 'error');


        return redirect('books');
    }

    public function returnBook(Request $request)
    {
        $request->validate([
            'Returnbook_id' => 'required|numeric',
        ]);

        $id = $request->input('Returnbook_id');
        $book = Book::find($id);

        if(isset($book)){
            $book->user_id = null;
            $book->save();
            Alert::toast('Libro entregado, ya disponible!', 'success');
        }else
            Alert::toast('Recurso no encontrado!', 'error');



        return redirect('books');

        // check pending users for borrowing

    }

}
