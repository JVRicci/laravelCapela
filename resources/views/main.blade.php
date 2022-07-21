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
 
    <link rel='stylesheet' href='style/main.css'>
</head>
<body>

    
    @auth
    <header class="nav-list" id="headerItens">
        <nav class="navbar navbar-expand-lg fixed-top">
        <p>
            <a href="/">Inicio</a>
        </p>

        <div class="dropdown">
            <p>
                <a href="/cons-catequese">Catequese</a>
            </p>
        </div>

        <div class="dropdown">
            <p>Dizimo</p>
            <div class="dropdown-content">
                <a href="/cad-dizimista">Cadastrar</a>
                <a href="/cons-dizimista">Consultar</a>
            </div>
        </div>

        <p>
        <a href="/doacoes">Doações</a>
        </p>
        <p>
            <a href="/">Eventos</a>
        </p>
        <p>
        <a href="/cons-contas">Contas</a>

            <p id="nav-item">
                <!--<a href="/dashboard">Meu perfil</a>-->
                <form action="/logout" method="post">
                    @csrf
                <p>
                        <a href="/logout" id="nav-link" onclick="event.preventDefault();
                        this.closest('form').submit();">Sair</a>
                </p>    
                </form>
            </p>
            </p>
        
        </nav>
    </header>

    @yield('content')

    @endauth

    

    <script href="{{ asset ('js/jquery-2.1.3.min.js') }}" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     
    
    
</body>
</html>