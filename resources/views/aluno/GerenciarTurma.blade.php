@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header"><b>Turma:</b> {{$turma->nome}}</div>

              <div class="card-body">

                <div class="panel-body">

                    @if (Auth::guard()->check() && Auth::user()->isAluno == true)
                    <i class="ni ni-ruler-pencil text-yellow"></i> <b>Listas</b>
                    <a class="nav-link" href="{{ route("/aluno/listasRespondidas", ['id' => $turma->id]) }}">
                        <i class="ni ni-folder-17 text-blue"></i> Ver listas respondidas
                    </a>
                    <a class="nav-link" href="{{ route("/aluno/listasNaoRespondidas", ['id' => $turma->id]) }}">
                        <i class="ni ni-single-copy-04 text-blue"></i> Ver listas não respondidas
                    </a>

                    @endif
              </div>
            </div>
        </div>
    </div>
</div>
@endsection