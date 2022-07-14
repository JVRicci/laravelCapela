@extends('main')
@section('title','Doações')
@section('content')
<link rel="stylesheet" href="style/contas/contas.css">

<div class="menuContas">

    <div class="pesq-div">

        <dir class="row">
        <div class="col-lg">
            
        <form action="/cons-contas" method="get">
            <select name="estado" class="form-control" aria-label="Estado da Conta">
                <option value="">Todas</option>
                <option value="Aberto">Em Aberto</option>
                <option value="Vencido">Vencido</option>
                <option value="Pago">Pago</option>
            </select>
        </div>
            <div class="col-sm">
            <button name="listConta" class="btn btn-dark" id="filtro-btn">Filtrar</button>
            </div>
        </form>


            <div class="col-sm">
            <button name="cadastraConta" class="btn btn-dark" id="caddastrar-btn" 
            data-toggle="modal" data-target="#cadastroModal">
                Cadastrar
                </button>
            </div>

        </dir>
    </div>

    <div class="table-div">
        
        <table class='table table-dark' id="tabela-contas">
        <thead class="thead">
            <th></th>
            <th>ID</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Categoria</th>
            <th>Fornecedor</th>
            <th>Vencimento</th>
            <th>Pagamento</th>
        </thead>
        <tbody class="tbody">
            @foreach ($contas as $contas)
            <tr>
                <td></td>
                <td>{{$contas->id}}</td>
                <td>{{$contas->descricao}}</td>
                <td>{{$contas->valor}}</td>
                <td>{{$contas->categoria}}</td>
                <td>{{$contas->fornecedor}}</td>
                <td>{{$contas->vencimento}}</td>
                <td>{{$contas->pagamento}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    </div>
</div>

<div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="cadastroModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cadastroModalLabel">Registrar Nova Conta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
    <form id="cad-conta" action="{{route('registrar-conta')}}" method="post">
        @csrf
      <div class="modal-body">

            <div class="container">
            <div class="row">
                <div class="col-7">
                    <label for="descricaoTxt">Descrição</label>
                    <input type="text" class="form-control" name="descricaoTxt" placeholder="Descrição" required>
                </div>
                
                <div class="col-5">
                    <label for="pagamentoDate">Pagamento</label>
                        <input type="date" name="pagamentoDate" class="form-control" required>
                    
                </div>
            </div>


            <div class="row">
                <div class="col-sm">
                    <label for="valorTxt">Valor</label>
                    <input type="text" name="valorTxt" class="form-control" required>
                </div>

                <div class="col-sm">
                    <label for="categoriaCombo">Categoria</label>
                        <select name="categoriaCombo" id="categoriaCombo" class="form-control" required>
                            <option value=""></option>
                            <option value="aberto">Unico</option>
                            <option value="vencido">Mensal</option>
                            <option value="pago">Anual</option>
                        </select>
                    
                </div>

                <div class="col-sm">
                    <label for="vencimentoDate">Vencimento</label>
                    <input type="date" name="vencimentoDate" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <label for="fonecedorText">Fornecedor</label>
                    <input type="text" name="fonecedorTxt" id="fonecedorTxt" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <label for="responsavelCombo">Responsavel: </label>
                    
                    <select name="responsavelCombo" id="responsavelCombo" class="form-control">
                        @foreach ($responsavel as $responsavel)
                            <option value="nomeUser">{{$responsavel->name}}</option><!--{ {nomeUser} }-->
                        @endforeach
                    </select>
                </div>

                <div class="col-4">
                    <label for="pagamentoCombo">Pagamento:</label>
                    <select name="pagamentoCombo" id="pagamentoCombo" class="form-control">
                        <option value="cartao">Cartão</option>
                        <option value="boleto">Boleto</option>
                        <option value="dinheiro">Dinheiro</option>
                    </select>
                </div>

                <div class="col-4">
                    <label for="estadoCombo">Estado</label>
                    <select name="estadoCombo" id="estadoCombo" class="form-control">
                        <option value="aberta">Aberta</option>
                        <option value="vencida">Vencida</option>
                        <option value="paga">Paga</option>
                    </select>
                </div>
            </div>
       
        
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <input type="submit" class="btn btn-dark" value="Registrar"></input>
      </div>
       </form>
    </div>
  </div>
</div>

@endsection