
@extends('layout')

@section('content')
@if(session('error'))
        <div id="error-message"  style=" color: red;">{{ session('error') }}</div>
    @endif

<div class="janela">
<h1>Adicionar Livros</h1>
<div class="content-center">
<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-container">
<label for="image">Imagem:</label>
<input type="file" name="image" id="image" value="{{ old('image')}}">
@if ($errors->has('image'))
        <div class="error-message"style="color: red;">{{ $errors->first('image') }}</div>
    @endif
<br>

<label for='titulo'>Titulo:</label>
<input type='text' name='titulo' id="titulo" value="{{ old('titulo')}}">
@if ($errors->has('titulo'))
        <div class="error-message"style="color: red;">{{ $errors->first('titulo') }}</div>
    @endif
<br>
<label for='autor'>Autor:</label>
<input type='text' name='autor' id="autor" value="{{ old('autor')}}">
@if ($errors->has('autor'))
        <div class="error-message"style="color: red;">{{ $errors->first('autor') }}</div>
    @endif
<br>
<label for='preco'>Preço:</label>
<input type='number' step="0.01" name='preco' id="preco" value="{{ old('preco')}}">
@if ($errors->has('preco'))
        <div class="error-message"style="color: red;">{{ $errors->first('preco') }}</div>
    @endif
<br>
<label for='estoque'>Estoque:</label>
<input type='number' name='estoque' id="estoque" value="{{ old('estoque')}}" >
@if ($errors->has('estoque'))
        <div class="error-message"style="color: red;">{{ $errors->first('estoque') }}</div>
    @endif
<br>
<button type="submit" >Adicionar</button>
</div>
</form>
</div>
</div>


<script>
        
        setTimeout(()=>{
            const errormessage = document.querySelectorAll('.error-message');
            errormessage.forEach(message=>{
                message.style.display =' none';
            });


    }, 5000); // 5000 ms = 5 segundos 
</script>
@endsection
