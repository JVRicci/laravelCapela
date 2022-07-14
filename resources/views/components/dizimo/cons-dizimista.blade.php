@extends('main')
@section('Title','Consultar Dizimista')
@section('content')
<link rel='stylesheet' type='text/css' href='style\dizimo\dizimo.css'>
<link rel='stylesheet' type='text/css' href='style\pesquisa.css'>
<link rel='stylesheet' type='text/css' href='style\table-style.css'>

<div class="principal">
      <div class="div-pesquisa">
      <form action="/cons-dizimista"  method='get'>
        <input type="text" id="pesquisaTxt" name="pesquisaTxt" class="pesquisa-text" placeholder="Pesquisar Doador" >
        
      </form>
      </div>

      <div class="dizimista-div">

          <table class="table table-dark" id="dizimistas">
              <thead class="thead">
                  <tr>
                      <th scope="col"></th>
                      <th scope="col">ID</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Endereço</th>
                      <th scope="col">Bairro</th>
                      <th scope="col">Telefone</th>
                  </tr>
              </thead>
              <tbody >
                @foreach ($dizimista as $dizimista)
                  <tr id="row" >
                      <td></td>
                      <td>{{$dizimista->id}}</td>
                      <td ><a href="/cons-dizimos/id={{$dizimista->id}}">{{$dizimista->nome}}</a></td>
                      <td>{{$dizimista->endereco}}</td>
                      <td>{{$dizimista->telefone}}</td>
                      <td>{{$dizimista->celular}}</td>
                  </tr>
                @endforeach
              </tbody>
          </table>

      </div>
      <div class="dizimo-div">

      </div>

      </div>
    
  <!-- Imports de scripts -->
  <script src="js/dizimo/pesq-dizimista.js">

  </script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</div>

@endsection