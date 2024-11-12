<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela Inicial</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Verifique se o caminho do CSS está correto -->
</head>
<body class="specific-page "> <!-- Aplica o fundo nesta página -->
   <div class="container">
    <div class="center">
  <h1 class="text">Bem-vindo ao nosso site </h1>
    </div>

    <div class="buttons-container">
        
  <form action="{{ route('login') }}" method="GET">
        <button type="submit" class="buttonsgeral">Login</button>
    </form>

    <form action="{{ route('register') }}" method="GET">
        <button type="submit" class="buttonsgeral">Cadastrar</button>
    </form>
    
    </div>
    </div> 
</body>
</html>