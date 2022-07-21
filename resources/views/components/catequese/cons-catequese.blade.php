@extends('main')
@section('title','Consultar Catequese')
@section('content')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js"></script> 


<link rel="stylesheet" href="style/catequese/cons-catequese.css">

<!-- barra de pesquisa da pagina-->
<div class="container">
    <div class="form-group" id="pesquisa-div" >
        
        <div class="row">
                
                    <div class="col-4">
                        <form action="/cons-catequese" method="get">
                            @csrf
                            <select name="anoCatequeseCombo" class="form-control">
                                <option value="">Selecionar ano</option>
                                <option value="Ano 1">Ano 1</option>
                                <option value="Ano 2">Ano 2</option>
                                <option value="Ano 3">Ano 3</option>
                                <option value="Ano 4">Ano 4</option>
                                <option value="Ano 5">Ano 5</option>
                            </select>
                        
                    </div>
                        <div class="col-4">
                        
                            <button class="btn btn-dark">Pesquisar</button>
                    </form>  

                        </div>                
                    
                <div class="col-4">
                    <button class="btn btn-dark" data-toggle="modal"  data-target="#modal-cad-catequista" >Cadastrar Catequista</button>
                </div>  
                    
            
        </div>

    </div>
</div>
<!-- fim da barra de pesquisa -->

<!-- Tabelas de turmas e catequisandos -->
<div class="container" id="tables-div">

    <div class="row">

        <div class="col-6 ">
            <div class="form-group" id="turmas-div">
                <table class="table table-dark table-striped-columns">
                    <thead class='thead'>
                        <tr>
                            <td>ID</td>
                            <td>Catequista</td>
                            <td>Dia do encontro</td>
                            <td>Formação</td>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                        
                        @foreach($turmas as $t)
                            <tr>
                                <td>{{$t->id}}</td>
                                <td>{{$t->nome}}</td>
                                <td>{{$t->diaEncontro}}</td>
                                <td>{{$t->formacao}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button class="btn btn-dark" data-toggle="modal" data-target="#modal-cad-turmas">Registrar sala</button>
        </div>



        <div class="col-6" >
            <div class="form-group" id="turmas-div">
                <table class="table table-dark table-striped-columns">
                    <thead class='thead'>
                        <tr>
                            <td>ID</td>
                            <td>Nome</td>
                            <td>Responsavel</td>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                        <tr>
                            @foreach($catequizandos as $c)
                            <td>{{$c->id}}</td>
                            <td>{{$c->nome}}</td>
                            <td>{{$c->responsavel}}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            <button class="btn btn-dark" data-toggle="modal" data-target="#cad-catequizando-modal">
                Registrar Catequizando
            </button>
        </div>

    </div>



</div>
<!-- Fim das Tabelas de turmas e catequisandos -->






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
        <form action="{{route('registrar-catequizando')}}" method="POST">
        <div class="modal-body">
           
                @csrf
                <div id="dados-catequizando-div">
                        
                    <div class="row">
                        <div class="col-8">
                            <label for="nomeTxt">Nome</label>
                            <input type="text" class="form-control" name="nomeTxt" placeholder="Nome" required>
                        </div>
                        <div class="col-4">
                            <label for="nacimentoTxt">Nascimento</label>
                            <input type="date" class="form-control" name="nascimentoTxt" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <label for="responsavelTxt">Responsável</label>
                            <input type="text" class="form-control" name="responsavelTxt" placeholder="Responsável" required>
                        </div>
                        <div class="col-4">
                            <label for="nascimentoResponTxt">Nascimento</label>
                            <input type="date" class="form-control" name="nascimentoResponTxt" required>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-4">
                            <label for="tipoCasamento"  class="form-label">Tipo de casamento</label>
                                <select name="tipoCasamentoCombo" class="form-control">
                                    <option value="nenhum">Nenhum</option>
                                    <option value="igreja">Igreja</option>
                                    <option value="civil">Civil</option>
                                    <option value="ambos">Ambos</option>
                                </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <label for="padrinhoTxt">Padrinho</label>
                            <input type="text" class="form-control" name="padrinhoTxt" placeholder="Padrinho" required>
                        </div>
                        <div class="col-6">
                            <label for="madrinhaTxt">Madrinha</label>
                            <input type="text" class="form-control" name="madrinhaTxt" placeholder="Madrinha" required>
                        </div>
                    </div>

                    <hr>
                    
                    <div class="row">

                        <div class="col-6">
                            <label for="enderecoTxt" class="form-label">Endereço</label>
                            <input type="text" name="enderecoTxt" class="form-control" placeholder="Endereço" required>
                        </div>

                        <div class="col-4">
                            <label for="cepTxt" class="form-label">CEP</label>
                            <input type="text" name="cepTxt"  id="cepTxt" 
                            class="form-control" placeholder="CEP" required>
                        </div>

                        <div class="col-2">
                            <label for="numeroTxt" class="form-label">Número</label>
                            <input type="txt" name="numeroTxt" class="form-control" required>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-6">
                            <label for="cidadeTxt" class="form-label">Cidade</label>
                            <input type="text" name="cidadeTxt" class="form-control" placeholder="Cidade" required>
                        </div>        

                        <div class="col-4">
                            <label for="bairroTxt" class="form-label">Bairro</label>
                            <input type="text" name="bairroTxt" class="form-control" placeholder="Bairro" required>
                        </div>

                        <div class="col-2">
                            <label for="ufTxt" class="form-label">UF</label>
                            <input type="text" name="ufTxt" class="form-control" placeholder="UF" required>
                        </div>

                    </div>

                    <hr>

                    <div class="row">
                        
                        <div class="col-6">
                            <label for="telefoneTxt" class="form-label">Telefone</label>
                            <input type="text" name="telefoneTxt" id="telefoneTxt"
                            class="form-control" placeholder="Número" required>
                        </div>
                        <div class="col-5">
                            <label for="celularTxt" class="form-label">Celular</label>
                            <input type="text" name="celularTxt"  id="celularTxt" 
                            class="form-control" placeholder="Número" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="emailTxt" class="form-label">Email</label>
                            <input type="email" name="emailTxt" class="form-control" placeholder="Email" required>
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

<!-- Inicio do Modal de cad-catequista-->
<div class="modal fade" id="modal-cad-catequista" tabindex="-1" role="dialog" aria-labelledby="modal-cad-catequista" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="catequistas-title-modal">Dados do Catequista</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('registrar-catequista')}}" method="POST">
            @csrf
        <div class="modal-body">
           
                <div id="dados-catequizando-div">
                        
                    <div class="row">
                        <div class="col-8">
                            <label for="nomeTxt">Nome</label>
                            <input type="text" class="form-control" name="nomeTxt" placeholder="Nome" required>
                        </div>
                        <div class="col-4">
                            <label for="nacimentoTxt">Nascimento</label>
                            <input type="date" class="form-control" name="nascimentoTxt" required>
                        </div>
                    </div>

                    <hr>
                    
                    <div class="row">

                        <div class="col-6">
                            <label for="enderecoTxt" class="form-label">Endereço</label>
                            <input type="text" name="enderecoTxt" class="form-control" placeholder="Endereço" required>
                        </div>

                        <div class="col-4">
                            <label for="cepTxt" class="form-label">CEP</label>
                            <input type="text" name="cepTxt"  id="cepTxt" 
                            class="form-control" placeholder="CEP" required>
                        </div>

                        <div class="col-2">
                            <label for="numeroTxt" class="form-label">Número</label>
                            <input type="txt" name="numeroTxt" class="form-control" required>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-6">
                            <label for="cidadeTxt" class="form-label">Cidade</label>
                            <input type="text" name="cidadeTxt" class="form-control" placeholder="Cidade" required>
                        </div>        

                        <div class="col-4">
                            <label for="bairroTxt" class="form-label">Bairro</label>
                            <input type="text" name="bairroTxt" class="form-control" placeholder="Bairro" required>
                        </div>

                        <div class="col-2">
                            <label for="ufTxt" class="form-label">UF</label>
                            <input type="text" name="ufTxt" class="form-control" placeholder="UF" required>
                        </div>

                    </div>

                    <hr>

                    <div class="row">
                        
                        <div class="col-6">
                            <label for="telefoneTxt" class="form-label">Telefone</label>
                            <input type="text" name="telefoneTxt" id="telefoneTxt"
                            class="form-control" placeholder="Número" required>
                        </div>
                        <div class="col-5">
                            <label for="celularTxt" class="form-label">Celular</label>
                            <input type="text" name="celularTxt"  id="celularTxt" 
                            class="form-control" placeholder="Número" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="emailTxt" class="form-label">Email</label>
                            <input type="email" name="emailTxt" class="form-control" placeholder="Email" required>
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



<!-- Fim do Modal de cad-catequista-->

<!-- Inicio do modal de turmas-->
<div class="modal fade" id="modal-cad-turmas" tabindex="-1" role="dialog" aria-labelledby="modal-cad-turmas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="catequistas-title-modal">Registrar turmas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('registrar-turma')}}" method="POST">
            @csrf
        <div class="modal-body">
           
            <div id="dados-catequizando-div">
                    
                <div class="row">

                    <div class="col-6">
                        <label for="catequistaCombo">Catequista</label>
                        <select name="catequistaCombo" class="form-control" required>
                            <option value="">Selecione</option>
                            @foreach ($catequistas as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="diaEncontroCombo">Dia de Encontro</label>
                        <select class="form-control" name="diaEncontroCombo" required>
                            <option value="">Selecione</option>
                            <option value="Domingo">Domingo</option>
                            <option value="Segunda-Feira">Segunda-Feira</option>
                            <option value="Terça-Feira">Terça-Feira</option>
                            <option value="Quarta-Feira">Quarta-Feira</option>
                            <option value="Quinta-Feira">Quinta-Feira</option>
                            <option value="Sexta-Feira">Sexta-Feira</option>
                            <option value="Sábado">Sábado</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="formacaoCombo">Formação</label>
                        <select class="form-control" name="formacaoCombo" required>
                            <option value="">Selecione</option>
                            <option value="Ano 1">Ano 1</option>
                            <option value="Ano 2">Ano 2</option>
                            <option value="Ano 3">Ano 3</option>
                            <option value="Ano 4">Ano 4</option>
                            <option value="Ano 5">Ano 5</option>
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
<!-- Fim do modal de turmas-->


  
<script  src="js/cadastro-masks.js"></script>


@endsection