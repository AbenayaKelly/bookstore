@extends('layout')

@section('content')
<div class=" janela">
 <h1>Checkout para: {{ $book->titulo}}</h1>
 <br>
 <div class="content-center">
 <div class="form-container">
 <p>Autor: {{$book->autor}}</p>
 <p>Preço: R$ {{number_format($book->preco, 2,',','.')}}</p>
 <form action="{{ route('books.processPayment', $book->id) }}" method="POST">
 @csrf
 <label for= 'payment_method'> Método de Pagamento</label>
 <select name= 'payment_method' required>
    <option value="credit_card">Cartão de credito</option>
    <option  value="debit_card">Cartão de Débito</option>
    <option value="paypal">Paypal</option>
 </select>
 </div> 
 <br>
 <button type="submit" >Confirmar Pagamento</button>

</form>
 </div>
</div>
@endsection