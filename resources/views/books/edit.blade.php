@extends('layout')

@section('content')
<div class="janela">
<h1>Editar Livro </h1>
<div class="content-center">
<form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        <div class="form-container">
        @method('PUT')
        @if ($book->image_path)
            <img src="{{ asset('storage/' . $book->image_path) }}" alt="{{ $book->titulo }}" style="width: 100px; height: auto;">
        @endif
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" value="{{ $book->titulo }}" require>
        <br>
        <label for="autor">Autor:</label>
        <input type="text" name="autor" value="{{ $book->autor }}" required>
        <br>
        <label for="preco">Preço:</label>
        <input type="number" step="0.01" name="preco" value="{{ $book->preco }}" required>
        <br>
        <label for="estoque">Estoque:</label>
        <input type="number" name="estoque" value="{{ $book->estoque }}" required>
        <br>
        <button type="submit">Atualizar Livro</button>
        </div>
    </form>
</div>
</div>
@endsection