@extends('main')
@section('title','Consultar Catequese')
@section('content')

<div class="container">
    <div class="pesquisa-div" id="form-group">
        <form action="/cons-catequese" method="get">
            <select name="anoCatequeseCombo" class="form-control">
                <option value="Ano 1">Ano 1</option>
                <option value="Ano 2">Ano 2</option>
                <option value="Ano 3">Ano 3</option>
                <option value="Ano 4">Ano 4</option>
                <option value="Ano 5">Ano 5</option>
            </select>
        </form>
    </div>
</div>
@endsection