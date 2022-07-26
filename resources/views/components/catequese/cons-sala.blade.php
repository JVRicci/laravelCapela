@extends('main')
@section('title','Catequizando')
@section('content')

<link rel='stylesheet' href='../style/main.css'>
<link rel='stylesheet' href='../style/catequese/cons-turma.css'>

<div class="container">
<!-- Inicio do layout-->

    <div class="row">
        <div class="col-4" id="dados-turma-div">
            <table>
                @foreach($turma as $t)
                <tr>
                    <td>Turma: </td>
                    <td>{{$t->formacao}}</td>
                </tr>
                <tr>
                    <td>Dia de Encontro: </td>
                    <td>{{$t->diaEncontro}}</td>
                </tr>
                <tr>
                    <td>Catequista: </td>
                    <td>{{$t->nome}}</td>
                </tr>
                <tr>
                    <td>Turma ativa: </td>
                    <td>{{$t->ativo}}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <div class="col-6" >
            <div class="form-group" id="turmas-div">
                <table class="table table-dark table-striped-columns">
                    <thead class='thead'>
                        <tr>
                            <td>ID</td>
                            <td>Nome</td>
                            <td>Faltas por Encontro</td>
                            <td>Faltas por Missa</td>
                            <td>Situação</td>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                        @foreach($catequizandos as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>
                                <a href="/cons-catequizando/id={{$c->id}}">{{$c->nome}}
                                </a></td>
                            <td>{{$c->faltaEncontro}}</td>
                            <td>{{$c->faltaMissa}}</td>
                            <td>{{$c->ativo}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button class="btn btn-dark" data-toggle="modal" data-target="#cad-catequizando-modal">
                Adcionar Catequizando
            </button>
            <button class="btn btn-dark" data-toggle="modal" data-target="#cad-encontro-modal">Registrar encontro</button>
        
        </div>
    </div>

<!-- Fim da tela-->
</div>



<!-- Modals -->

<!-- Modal de cad-catequizando-->
<div class="modal fade" id="cad-catequizando-modal" tabindex="-1" role="dialog" aria-labelledby="modal-cad-catequizando" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="catequizando-title-modal">Dados do Catequizando</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('registrar-cat-turma')}}" method="POST">
            @csrf
        <div class="modal-body">
                <div id="dados-catequizando-div">
                        
                    <div class="row">
                        <div class="col-8">
                            <input type="hidden" name="idTxt" value="{{request('id')}}">
                            <label for="nomeTxt">Nome</label>
                            <select class="form-control" name="catequizandoTxt" required>

                            @foreach ($catSemSala as $cs)
                                <option value="{{$cs->id}}"> {{$cs->nome}}</option>
                            @endforeach

                            </select>
                        </div>
                        
                    </div>
                </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-secondary" value="Cadastrar" >
        </div>
    </form>
      </div>
    </div>
  </div>

<!-- Fim do Modal de cad-catequizando-->

<!-- Modal de cad-encontro-->
<div class="modal fade" id="cad-encontro-modal" tabindex="-1" role="dialog" aria-labelledby="modal-cad-encontro" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="encontro-title-modal">Registrar encontro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('registrar-encontro')}}" method="POST">
        @csrf
        <div class="modal-body">
                <div id="dados-catequizando-div">
                    <input type="hidden" name="turmaTxt" value="{{request('id')}}">
                    <div class="row">
                        <div class="col-10">
                            <label for="nomeTxt">Descrição</label>
                            <input type="text" class="form-control" name="descricaoTxt" placeholder="Nome" required>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-6">
                        <!--Tabela para registro de faltas -->
                        <table>
                            <thead>
                                <tr>
                                    <td>Nome</td>
                                    <td>Faltas</td>
                                </tr>
                            </thead>
                            @foreach($catequizandos as $c)
                            <tr>
                                <td>
                                    <a href="/cons-catequizando/id={{$c->id}}">{{$c->nome}}
                                    </a></td>
                                <td><input type="checkbox" class="" name="presencaCheck[{{$c->id}}]" value="{{$c->id}}" id=""></td>
                            </tr>
                            @endforeach
                        </table>
                        </div>
                    </div>
                </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-secondary" value="Registrar" >
        </div>
    </form>
      </div>
    </div>
  </div>
<!-- Modal de cad-encontro-->


  @endsection
