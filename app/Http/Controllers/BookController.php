<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo'=> 'required|string',
            'autor'=>'required|string',
            'preco'=>'required|numeric',
            'estoque'=>'required|integer',
            'image'=> 'required|image|mimes:jpg,jpeg,png|max:2048', // Máximo 2MB

        ],[
            'titulo.required'=>'O campo titulo é obrigatório',
            'autor.required'=>'O campo autor é obrigatório',
            'preco.required'=>'O campo preco é obrigatório',
            'estoque.required'=>'O campo estoque é obrigatório',
            'image.required'=>'O campo image é obrigatório',
            'image.required' => 'O campo de imagem é obrigatório.',
            'image.image' => 'O arquivo deve ser uma imagem.',
            'image.mimes' => 'A imagem deve ser do tipo: jpg, jpeg ou png.',
            'image.max' => 'A imagem não pode ter mais que 2 MB.',
        ]);


      $book = new Book();
      $book->titulo = $request->input('titulo');
      $book->autor = $request->input('autor');
      $book->preco = $request->input('preco');
      $book->estoque = $request->input('estoque');

      if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $path = $request->file('image')->store('images', 'public');
        $book->image_path = $path;
    }
      $book->save();

      return redirect()->route('books.index')->with('success', 'Livro adicionado com sucesso!');
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
    public function checkout(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.checkout', compact('book'));
    }

    public function processPayment(Request $request, $id)
    {
        
        $book = Book::findOrFail($id);
    
         $request->validate([
            'payment_method'=> 'required|string',
         ]);
         if($book->estoque > 0){
            $book->estoque -=1;
            $book->save();
            return redirect()->route('books.index')->with('success', 'Pagamento realizado com sucesso para o livro ' . $book->titulo . '!');
         }else{
            return redirect()->route('books.index')->with('error', 'Estoque insuficiente para o livro ' . $book->titulo . '!');
         }
        
    }   
      
    public function edit(string $id)
    {
        $book = Book::find($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);
        $book->titulo = $request->input('titulo');
        $book->autor = $request->input('autor');
        $book->preco = $request->input('preco');
        $book->estoque = $request->input('estoque');
        $book->save();
  
        return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Livro deletado com sucesso!');
    }
}
