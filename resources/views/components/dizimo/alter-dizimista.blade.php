@extends('main')
@section('title','Alterar Dizimista')
@section('content')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js"></script> 

<link rel="stylesheet" href="../style/dizimo/cad-dizimista.css">
<link rel='stylesheet' href='../style/main.css'>



@foreach($dizimista as $dizimista)
<form method="POST" class="form-todo" action="/alterar-dizimista/id={{$dizimista->id}}" > 
@csrf

<div id="dados-pessoais" class="container">    
    <h2 align="center" >Atualizar Cadastro</h2>
    <input type="hidden" name="idDizTxt" value="{{$dizimista->id}}">
    <input type="hidden" name="idEndTxt" value="{{$dizimista->idend}}">
    <input type="hidden" name="idContTxt" value="{{$dizimista->idcont}}">

    <h5 id="infos-titulo">Informações pessoais</h5>

    <div class="row">

        <div class="col-11">
            <label for="nome-text" class="form-label">Nome do Dizimista</label>
            <input type="txt" name="nomeTxt" placeholder="Nome" class="form-control" value="{{$dizimista->nomed}}" required>
        </div>

    </div>

    <div class="row">
        
        <div class="col-4">
            <label for="nascimentoDate" class="form-label">Data de nascimento</label>
            <input type="date" name="nascimentoDate" placeholder="Data de nascimento" value="{{$dizimista->nascimento}}" class="form-control"required>
        </div>

        <div class="col-4">
            <label for="cpfTxt" class="form-label">CPF</label>
            <input type="txt" name="cpfTxt" id="cpfTxt" value="{{$dizimista->cpf}}"
             placeholder="CPF" maxlength="11" class="form-control" required>
        </div>
 
        <div class="col-3">
            <label for="estadoCivil" class="form-label">Estado civil</label>
            <select id="estadoCivil" name="estadoCivil" value="{{$dizimista->estadoCivil}}" class="form-control" required>
                <option value="nulo"></option>
                <option value="solteiro">Solteiro</option>
                <option value="casado">Casado</option>
                <option value="divorciado">Divorciado</option>
                <option value="amasiado">Amasiado</option>
            </select>
        </div>

    </div>

    <div class="div-casamento" >
    <div class="row" >

        <div class="col-11">
            <label for="conjugeTxt" class="form-label">Conjuge</label>
            <input type="txt" name="conjugeTxt" class="form-control" value="{{$dizimista->conjuge}}" placeholder="Conjuge">
        </div>

        <div class="col-6">
            <label for="tipoCasamento" class="form-label">Tipo de casamento</label>
            <select name="tipoCasamento" class="form-control">
                <option value="nenhum">Nenhum</option>
                <option value="igreja">Igreja</option>
                <option value="civil">Civil</option>
                <option value="ambos">Ambos</option>
            </select>
        </div>

        <div class="col-5">
            <label for="conjuge-date" class="form-label">Data de Nascimento</label>
            <input type="date" name="conjugeDate" placeholder="Nascimento" value="{{$dizimista->conjugeNascimento}}" class="form-control">
        </div>

    </div>
    </div>

    <hr>

    <h5>Endereço</h5>

    <div class="row">

        <div class="col-5">
            <label for="enderecoTxt" class="form-label">Endereço</label>
            <input type="text" name="enderecoTxt" class="form-control" value="{{$dizimista->endereco}}" placeholder="Endereço" required>
        </div>

        <div class="col-4">
            <label for="cepTxt" class="form-label">CEP</label>
            <input type="text" name="cepTxt"  id="cepTxt" value="{{$dizimista->cep}}"
            class="form-control" placeholder="CEP" required>
        </div>

        <div class="col-2">
            <label for="numeroTxt" class="form-label">Número</label>
            <input type="txt" name="numeroTxt" class="form-control" value="{{$dizimista->numero}}" required>
        </div>

    </div>

    <div class="row">

        <div class="col-5">
            <label for="cidadeTxt" class="form-label">Cidade</label>
            <input type="text" name="cidadeTxt" class="form-control" placeholder="Cidade" value="{{$dizimista->cidade}}" required>
        </div>        

        <div class="col-4">
            <label for="bairroTxt" class="form-label">Bairro</label>
            <input type="text" name="bairroTxt" class="form-control" placeholder="Bairro" value="{{$dizimista->bairro}}"required>
        </div>

        <div class="col-2">
            <label for="ufTxt" class="form-label">UF</label>
            <input type="text" name="ufTxt" class="form-control" placeholder="UF" value="{{$dizimista->uf}}" required>
        </div>

    </div>

    <hr>

    <h5>Contato</h5>
    <div class="row">
        
        <div class="col-6">
            <label for="telefoneTxt" class="form-label">Telefone</label>
            <input type="text" name="telefoneTxt" id="telefoneTxt" value="{{$dizimista->telefone}}"
            class="form-control" placeholder="Número" required>
        </div>
        <div class="col-5">
            <label for="celularTxt" class="form-label">Celular</label>
            <input type="text" name="celularTxt"  id="celularTxt" value="{{$dizimista->celular}}"
            class="form-control" placeholder="Número" required>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <label for="emailTxt" class="form-label">Email</label>
            <input type="email" name="emailTxt" class="form-control" placeholder="Email" value="{{$dizimista->email}}" required>
        </div>
    </div>
    <hr>

    <input name="cadastrar" type="submit" value="Cadastrar"  class="btn btn-secondary" id="cadastrar-btn"/>
    
</div>

<hr>

</form>
@endforeach 

<script  src="../js/dizimo/cad-dizimista-scr.js">

var estado = document.querySelector("#estado-civil");

carregaDiv();
</script>



<script  src="../js/cadastro-masks.js"></script>



@endsection