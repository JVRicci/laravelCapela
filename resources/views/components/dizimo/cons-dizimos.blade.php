@extends('main')
@section('title','Cadastrar')
@section('content')

<link rel="stylesheet" href="../style/dizimo/perfil-dizimista.css">
<link rel='stylesheet' href='../style/main.css'>
<div id="principal" class="container">

    <div class="row">
    <div id="dados-dizimista">

        @foreach ($dizimista as $dizimista)
            <h6> {{$dizimista->id}} - {{$dizimista->nomed}}</h6>
            <p>CPF: {{$dizimista->cpf}}</p>
            <p>Nascimento: {{$dizimista->nascimento}}</p>
            <p>Estado Civil: {{$dizimista->estadoCivil}}</p>
            <p>Tipo de Casamento: {{$dizimista->tipoCasamento}}</p>
            <p>Conjuge:{{$dizimista->conjuge}} </p>
            <p>Data de Nascimento: {{$dizimista->conjugeNascimento}}</p>
            <p>Ativo: {{$dizimista->ativo}}</p>

            <hr>
            
            <div id="conDiv">
            <p>Telefone: {{$dizimista->telefone}}</p>
            <p>Celular: {{$dizimista->celular}}</p>
            </div>

            <hr>
            <div id="endDiv">
            <p>Endereço: {{$dizimista->endereco}}</p>
            <p>Número: {{$dizimista->numero}}</p>
            <p>Bairro: {{$dizimista->bairro}}</p>
            <p>Cidade: {{$dizimista->cidade}}</p>
            </div>
        @endforeach
    </div>

    <div id="dados-dizimo">

        <table class="table table-dark" id="tabela-dizimo">
            <thead class="thead">
                <th>ID</th>
                <th>Data</th>
                <th>Quantia</th>
            </thead>
            <tbody>
                @foreach ($dizimos as $dizimos)
                <form action="/delete-dizimo" method="post">
                    @csrf
                    <tr>
                        <td name='id_dizimo' value="{{$dizimos->id}}">{{$dizimos->id}}</td>
                        <td>{{$dizimos->dataRecebimento}}</td>
                        <td>{{$dizimos->qtdRecebida}}</td>
                        <td>
                            <button id="btn-excluir" class="btn btn-danger"> Excluir</button>
                        </td>
                    </tr>
                </form>
                @endforeach
            </tbody>
        </table>

        <button class="btn btn-dark" id="dizimo-btn" data-toggle="modal" data-target="#modal-dizimo" >
            Registrar Dizimo
        </button>

    </div>
</div>
</div>

<!--Modal de Verifica dizimo-->

    <div class="modal fade" id="modal-dizimo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="dizimosTitulo">Registrar Dizimo</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{route('registrar-dizimos')}}">
                    @csrf
                    <div class="row">
                        <div class="col-1" id="idDiz" >
                            <input type="txt" class="form-control" name="idTxt" value="{{request('id')}}">
                        </div>
                        <div class="col-5">
                            <input type="txt" class="form-control" name="valorTxt" onkeypress="$(this).mask('R$ 999.990,00')"
                            id="valorTxt" placeholder="Valor" required>
                        </div>
                        <div class="col-5">
                            <input type="date" class="form-control" name="data" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <input type="submit" class="btn btn-dark" id="salvar" ></input>
            
            </form>

            </div>
        </div>
        </div>
    </div>

<!--Fim do modal de cadastro-->


<!--Imports de scripts-->
<script src="js/dizimo/cad-dizimo.js">
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

@endsection