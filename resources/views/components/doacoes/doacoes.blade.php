@extends('main')
@section('title','Doações')
@section('content')

<link rel="stylesheet" type="text/css" href="style\doacoes\doacoes.css">
<link rel='stylesheet' type='text/css' href='style\pesquisa.css'>


<div id="div-principal" class="flex-container">
    <div class="div-pesquisa">
        <form action="/doacoes" method="get">
        <input type="text" id="pesquisaTxt" name="pesquisaTxt" class="pesquisa-text" placeholder="Pesquisar Doador"  >
        </form>
      </div>


    <div class="row">
        <div class="col-4">
            <div id="doador-div">

                <table id="doador-table" class="table table-dark">
                    <thead >
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doadores as $doadores)
                        <tr onclick="carregaId({{$doadores->id}})">        
                            <td scope="row">
                                <input type='radio' name="doadorSel{{$doadores->id}}" id="" value="{{$doadores->id}}"/></td>
                             
                            <td scope="row">{{$doadores->id}}</td>
                            <td scope="row">{{$doadores->nome}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        
        <div class="col-2">
            <div id="doacao-div">
                
                <table id="doacao-table" class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Doador</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Destino</th>
                            <th scope="col">Recebimento</th>
                            <th scope="col">Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doacoes as $doacoes)
                        <tr id="{{$doacoes->idDoador}}" id="doacaoLinha">
                        <form  method="get" id="doacaoTbForm" action="/doacoes"><!-- method="get" action="/delete-doacao"-->
                            @csrf
                            <input type="hidden" name="idDoacao" id="idDoacaoHd" value='{{$doacoes->id}}' data-toggle="modal" data-target="#alter-doacao">
                            <td scope="row"> {{$doacoes->idDoador}}</td>

                            <td scope="row" >
                                <input type="hidden" name="descricao" id="descricaoHd" value='{{$doacoes->descricao}}' data-toggle="modal" data-target="#alter-doacao">
                                {{$doacoes->descricao}}
                            </td>

                            <td scope="row" >
                                <input type="hidden" name="destino" id="destinoHd" value='{{$doacoes->destino}}' data-toggle="modal" data-target="#alter-doacao">
                                {{$doacoes->destino}}
                            </td>

                            <td scope="row" >
                                <input type="hidden" name="dataRecebimento" id="recebimentoHd" value='{{$doacoes->dataRecebimento}}' data-toggle="modal" data-target="#alter-doacao">
                                {{$doacoes->dataRecebimento}}
                            </td>

                            <td scope="row" >
                                <input type="hidden" name="tipoDoacao" id="tipoDoacaoHd" value='{{$doacoes->tipoDoacao}}' data-toggle="modal" data-target="#alter-doacao">
                                {{$doacoes->tipoDoacao}}
                            </td>

                            <td scope="row"><button class="btn btn-warning" id="alterarBtn" onclick="carregaAlterDoa()"
                            data-toggle="modal" data-target="#alter-doacao" >
                             Alterar</button></td>
                            
                            <td scope="row"><button class="btn btn-danger" id="removerBtn" value="Remover" >Remover</button></td>
                        </form>
                        </tr>

                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="row" id="btnDiv">
        <div class="col-1"></div>
        <div Class="col-6">
            <button value="cadastrar" class="btn btn-dark"
            data-toggle="modal" data-target="#doadorModal">
            Registrar Doador</button> 
        </div>
        <div Class="col-3">
            <button value="cadastrar" class="btn btn-dark"
            data-toggle="modal" data-target="#doacaoModal">
            Nova Doação</button>  
        </div>
    </div>
</div>

<!--Modals-->


<!-- Modal doador -->

<div class="modal fade" id="doadorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="doador-modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="regDoadorTitle">Registrar Doador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{Route('registrar-doador')}}"> 
        @csrf
        <div class="modal-body">
        
              <div class="row">
                  <div class="col-12">
                    <input type="text" class="form-control" id="doadorTxt" name="doadorTxt" placeholder="Nome do doador" required>
                  </div>
              </div>
            </div>
            <div class="modal-footer">

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit"  class="btn btn-dark">Registrar</button>
            
        </div>
        </form>   
    </div>
  </div>
</div>



<!-- Modal doacao -->

<div class="modal fade" id="doacaoModal" tabindex="-1" role="dialog" aria-labelledby="modal-doacao" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="doacao-modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="regDoacaoTitle">Registrar Doação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method="POST" action="{{route('registrar-doacao')}}">
                @csrf
            <div class="flex-container" id="formDiv">
                <input type="text" id="doadorIdTxt" name="doadorIdTxt" required oninvalid="alert('Selecione um doador')"> </input>
                <div class="row">
                    <div class="col-5">
                        <label for="tipoSel">Tipo</label>
                        <select name="tipoSel" id="tipoSel" class="form-control" required>
                            <option name="NULL" value="null"></option>
                            <option name="material" value="Material">Material</option>
                            <option name="especie" value="Especie">Em Espécie</option>
                        </select>
                    </div>
                    <div class="col-7">
                    
                    <label for="descricaoTxt">Descrição</label>
                    <input type="text" class="form-control" id="descricaoTxt" name="descricaoTxt" placeholder="Descrição" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        
                        <label for="destinoTxt">Destino</label>
                        <select  class="form-control" id="destinoTxt" name="destinoTxt" required >
                            <option name='comunidadeOpt' value="Comunidade">Comunidade</option>
                            <option name='externoOpt' value="Externo">Externo</option>
                        </select>
                    </div>
                    <div class="col-7">
                        <label for="recebimentoDate">Recebimento</label>
                        <input type="date" name="recebimentoDate" class="form-control" id="recebimentoDate" required>
                    </div>

                </div>
            </div>
            
            
            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-dark">Registrar</button>
            
        </form>
        </div>
    </div>
  </div>
</div>

<!-- Modal de alterar doacao -->

  <div class="modal fade" id="alter-doacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" id="doacao-modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="alterarDoacaoTitle">Alterar doação:  </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
            <div class="container">
                <form id="altera-doacaoForm"action="/atualiza-doacao" method="post">
                    @csrf
                    <input type="txt" name="idDoacaoAlter" id="idDoacaoAlter" >
                    <div class="flex-container" id="formDiv">
                        <div class="row">
                            <div class="col-5">
                                <label for="tipoSel">Tipo</label>
                                <select name="tipoSel" id="alterTipoSel" class="form-control" required>
                                    <option name="NULL" value="null"></option>
                                    <option name="material" value="Material">Material</option>
                                    <option name="especie" value="Especie">Em Espécie</option>
                                </select>
                            </div>
                            <div class="col-7">
                            
                            <label for="descricaoTxt">Descrição</label>
                            <input type="text" class="form-control" id="alterDescricaoTxt" name="alterDescricaoTxt"
                             placeholder="Descrição" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                
                                <label for="destinoTxt">Destino</label>
                                <select  class="form-control" id="alterDestinoTxt" name="destinoTxt" required >
                                    <option name='comunidadeOpt' value="Comunidade">Comunidade</option>
                                    <option name='externoOpt' value="Externo">Externo</option>
                                </select>
                            </div>
                            <div class="col-7">
                                <label for="recebimentoDate">Recebimento</label>
                                <input type="date" name="alterRecebimentoDate" class="form-control" id="alterRecebimentoDate" required>
                            </div>
        
                        </div>
                    </div>
                </div>
                    
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-dark">Alterar</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  <script src="jquery-3.6.0.min.js"></script>
  <script src="js/doacao/doacao.js">    
  </script>
 
@endsection