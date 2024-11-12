@extends('layout')

@section('content')
<h1 class="content-center">Livros Disponíveis</h1>

<!-- Verificação para aplicar um estilo diferente para o Cliente -->
<div class="content-center {{ auth()->check() && auth()->user()->tipo === 'client' ? 'client-view' : ''}}">
    
    <!-- Verificação para Admin -->
    @if(auth()->check() && auth()->user()->tipo === 'admin')
    <form action="{{ route('books.create') }}" method="GET">
        <button type="submit" class="adicionar">Adicionar novo Livro</button>
    </form>
    @endif

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="space-top">Sair</button>
    </form> 

    @if(session('success'))
        <div id="success-message" style="color: black">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div id="error-message" style="color: red;">{{ session('error') }}</div>
    @endif

    <div class="content-center">
        <ul class="ul">
            @foreach($books as $book)
                <li class="space-top li">
                    @if ($book->image_path)
                        <img src="{{ asset('storage/' . $book->image_path) }}" alt="{{ $book->titulo }}" style="width: 100px; height: auto;">
                    @endif
                    <p>{{$book->titulo}} - {{$book->autor}} - {{$book->preco}}</p>
                    
                    @if(auth()->check() && auth()->user()->tipo === 'admin')
                    <a href="{{ route('books.edit', $book->id) }}">Editar</a>
                    
                    <div >
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                            @method('DELETE')
                            <button type="submit" class="space-top">Excluir</button>
                        </form>
                    </div>
                    @endif
                    
                    <form action="{{ route('books.checkout', $book->id) }}" method="GET">
                        <button type="submit" class="space-top">Comprar</button>    
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    const successmessage = document.getElementById('success-message');
    const errormessage = document.getElementById('error-message');
    setTimeout(() => {
        if(successmessage) {
            successmessage.style.display = 'none';
        }
        if(errormessage) {
            errormessage.style.display = 'none';
        }
    }, 5000); // 5000 ms = 5 segundos 
</script>

@endsection