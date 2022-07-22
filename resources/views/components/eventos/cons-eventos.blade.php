@extends('main')
@section('title', 'Consultar Eventos')
@section('content')

<link rel="stylesheet" type="text/css" href="style\eventos\eventos.css">

<!-- Inicio da tela de eventos -->
<div class="flex-container" id="div-eventos">

    <div class="row">

    @foreach($eventos as $e)

        <div class="col-3" id="evento">
            <label for="nome">Nome:<h6 name="nome">{{$e->nomeEvt}}</h6></label>
            <label for="data">Data:<h6 name="data">{{$e->data}}</h6></label>
            <label for="responsavel">Responsavel:<h6 name="responsavel">{{$e->responsavel}}</h6></label>
            <div id="imgEvento"><a href="/evento/--nome--">
            <img src="img/fundo.jpg"/>
            </a></div>

        </div>
    @endforeach

        <div class="col-3" id="novo-evento">
            <h6>Adcionar novo evento</h6>
            <img src="img/adcionar.png" alt="Adcionar evento"
            data-toggle="modal" data-target="#registrar-evento"></div>
        </div>
    </div>
</div>


<!-- fim da tela de eventos -->

<!-- modais -->
<!-- Modal de cadastro de evento -->
<div class="modal fade" id="registrar-evento" tabindex="-1" role="dialog" aria-labelledby="registrar-evento" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registrar-evento-Label">Registrar evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
    <form method="POST" action="{{Route('registrar-eventos')}}" >
        @csrf
      <div class="modal-body">

            <div class="row">
                <div class="col-12">
                    <label for="nome-evento">Nome do Evento</label>
                    <input type="text" Placeholder="Nome do Evento" name="nomeTxt" 
                     class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label for="data-evento">Data</label>
                    <input type="date" name="dataDate" id="data-evento" class="form-control" required>
                </div>
                <div class="col-6">
                    <label for="responsavelCombo">Responsavel</label>
                    <select name="responsavelCombo" class="form-control" required>
                        <option value="">Selecione</option>

                        @foreach($users as $u)
                            <option value="{{$u->id}}">{{$u->name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    
                    <label for="decricao-evento">Descrição do evento</label>
                    <input type="textarea" class="form-control" placeholder="Descrição" name="descricaoTxt">
                </div>
            </div>


      </div>
      <div class="modal-footer">
          
        <input type="submit" value="Registrar" class="btn btn-light"></input>
      </div>
      
    </form>
    </div>
  </div>
</div>
<!--Fim do Modal de cadastro de evento -->


@endsection