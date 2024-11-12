@extends('layout')

@section('content')
@if(session('success'))
        <div id="success-message"  style="color: green" >{{ session('success') }}</div>
    @endif
@if(session('error'))
        <div id="error-message"  style=" color: red;">{{ session('error') }}</div>
    @endif

<div class="janela">
   
<h1> Login</h1>
<div class="content-center">
<form action="{{ route('login') }}" method="POST">

    @csrf 
    <div class="form-container ">
    <label class="s">Email</label>
    <input type="email" name="email" id="email" value="{{ old('email') }}">
    @if ($errors->has('email'))
    <div id="email-error" style="color: red;">{{$errors->first('email')}}</div>
    @endif
   <br>
    <label>Senha</label>
    <input type="password" name="password" id="password" value="{{ old('password') }}"   >
    @if ($errors->has('password'))
    <div id="password-error" style="color: red;">{{$errors->first('password')}}</div>
    @endif
    </div>
    <br>
    <button type="submit">Login</button>
</form>
</div>
</div>
<script>
  
        const successmessage = document.getElementById('success-message');
        const errormessage = document.getElementById('error-message');
        const emailerror = document.getElementById('email-error');
        const passworderror = document.getElementById('password-error');
        setTimeout(()=>{
        if(successmessage){
            successmessage.style.display= 'none';

        }
        if(errormessage){
            errormessage.style.display =' none';
        }
        if(emailerror){
            emailerror.style.display='none';
        }
        if(passworderror){
            passworderror.style.display='none';
        }


    }, 5000) // 5000 ms = 5 segundos 
</script>
@endsection