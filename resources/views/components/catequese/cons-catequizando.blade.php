@extends('main')
@section('title','Catequizando')
@section('content')

<link rel='stylesheet' href='../style/main.css'>
<link rel='stylesheet' href='../style/catequese/cons-catequizando.css'>

<div class="container">

    <div id='dados-cat-div'>
        <h4>Dados do catequizando</h4>
        <table id='dados-cat-table'>
            @foreach($catequizando as $c)

            <div id='dados-catequizando'>
                <tr>
                    <td><h6>Nome: </h6></td>
                    <td>{{$c->nomec}}</td>
                </tr>
                <tr>
                    <td><h6>Data de Nascimento: </h6></td>
                    <td>{{$c->nascimentoc}}</td>
                </tr>
                <tr>
                    <td><h6>Faltas: </h6></td>
                    <td>{{$c->faltas}}</td>
                </tr>
                <tr>
                    <td><h6>Ativo: </h6></td>
                    <td>{{$c->ativo}}</td>
                </tr>
                <tr>
                    <td><h6>Turma: </h6></td>
                    <td>{{$c->turma}}</td>
                </tr>
            </div>
            
            <tr><td><hr></td></tr>
            <tr><td><h4>Responsável </h4></td></tr>
            <div id='dados-responsavel'>
                <tr>
                    <td><h6>Responsável: </h6></td>
                    <td>{{$c->nomer}}</td>
                </tr>
                <tr>
                    <td><h6>Nascimento do Resp.: </h6></td>
                    <td>{{$c->nascimentor}}</td>
                </tr>
                <tr>
                    <td><h6>Casamento: </h6></td>
                    <td>{{$c->casamento}}</td>
                </tr>
                </tr>
                <tr>
                    <td><h6>Padrinho: </h6></td>
                    <td>{{$c->padrinho}}</td>
                </tr>
                <tr>
                    <td><h6>Madrinha: </h6></td>
                    <td>{{$c->madrinha}}</td>
                </tr>
            </div>

            
            <tr><td><hr></td></tr>
            <tr><td><h4>Endereço </h4></td></tr>
            <div id='dados-endereco'>
                <tr>
                    <td><h6>Endereço: </h6></td>
                    <td>{{$c->endereco}}</td>
                </tr>
                <tr>
                    <td><h6>CEP: </h6></td>
                    <td>{{$c->cep}}</td>
                </tr>
                <tr>
                    <td><h6>Número: </h6></td>
                    <td>{{$c->numero}}</td>
                </tr>
                <tr>
                    <td><h6>Cidade: </h6></td>
                    <td>{{$c->cidade}}</td>
                </tr>
                <tr>
                    <td><h6>Bairro: </h6></td>
                    <td>{{$c->bairro}}</td>
                </tr>
                <tr>
                    <td><h6>Estado: </h6></td>
                    <td>{{$c->uf}}</td>
                </tr>
            </div>

            <tr><td><hr></td></tr>
            <tr><td><h4>Contato </h4></td></tr>
            <div id="dados-contato">
                <tr>
                    <td><h6>Telefone: </h6></td>
                    <td>{{$c->telefone}}</td>
                </tr>
                <tr>
                    <td><h6>Celular: </h6></td>
                    <td>{{$c->celular}}</td>
                </tr>
                <tr>
                    <td><h6>Email: </h6></td>
                    <td>{{$c->email}}</td>
                </tr>
            </div>

            @endforeach
        </table>
    </div>

    

</div>
    
@endsection