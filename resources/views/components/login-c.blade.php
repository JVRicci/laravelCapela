<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel='stylesheet'
    href='https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css'
    integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T'
    crossorigin='anonymous'/>
 
    <link rel='stylesheet' href='style/login.css'>
</head>
<body>


<form method="POST" action='/login'>
    @csrf
    <div align="center"  id="divPrincipal" class="form-todo">

        <h4>Bem vindo!</h4><br/>

        <div class="form-group">
        <label for="loginTxt">Login</label>
        <input type="text"  name="login" class="form-field" placeholder="Nome de Usuário" required/> 
        </div>

        <div class="form-group">
        <label for="senhaTxt">Senha</label>
        <input type="password"  name="senha" class="form-field" placeholder="Senha" required/> 
        </div>

        <div class="form-group">
        <input type="submit" name="logar" class="btn btn-dark" value="Entrar"/>
        </div>
    </div>
</form> 
</body>