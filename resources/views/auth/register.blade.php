@extends('layout')

@section('content')
@if(session('error'))
        <div id="error-message"  style=" color: red;">{{ session('error') }}</div>
    @endif
    <div class="janela">
<h1> Tela de Cadastro</h1>
<div class="content-center">
<form action="{{ route('register') }}" method="POST">
    
    @csrf
    
    <div class="form-container">
    <label  for="name">Nome</label>
    <input type="text" name="name" id="name"  value="{{ old('name') }}" >
    @if ($errors->has('name'))
        <div id="name"style="color: red;">{{ $errors->first('name') }}</div>
    @endif
    <br>

    <label  for="email">Email</label>
    <input type="email" name="email" id="email"  value="{{ old('email') }}" >
    @if ($errors->has('email'))
        <div id="email" style="color: red;">{{ $errors->first('email') }}</div>
    @endif
    <br>

    <label  for="password">Senha</label>
    <input type="password" name="password"  id="password"  value="{{ old('password') }}" >
    @if ($errors->has('password'))
        <div  id="password" style="color: red;">{{ $errors->first('password') }}</div>
    @endif
    <br>

    <label for="password_confirmation">Confirme a Senha</label>
    <input type="password" name="password_confirmation"  id="password_confirmation">
  <br>
    <label for="tipo">Tipo de usuário:</label>
        <select name="tipo">
            <option value="client">Cliente</option>
            <option value="admin">Administrador</option>
        </select>
        </div>
        <br>
    <button type="submit">Registrar</button>
</form>
</div>
</div>
<script>
  
        const errormessage = document.getElementById('error-message');
        const name = document.getElementById('name');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        
        setTimeout(()=>{
        
        if(errormessage){
            errormessage.style.display =' none';
        }
        if(name){
            nome.style.display='none';
        }
           
        if(email){
            email.style.display='none';
        }
           
        if(password){
            passworderror.style.display='none';
        }


    }, 5000) // 5000 ms = 5 segundos 
</script>
@endsection