@extends('layouts.app')

@section('content')

<script language= 'javascript'>

function avisoDeletar(){
  if(confirm (' Deseja realmente excluir esta turma? ')) {
    location.href="/turma/remover/{{$turma->id}}";
  }
  else {
    return false;
  }
}
</script>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="panel-heading">
                  Turma: <strong>{{$turma->nome}}</strong>
                </div>

                <div class="panel-body">
                    <div style="width: 100%; margin-left: 0%" class="row">
                        <div style="width: 100%; float: left" class="column col-md-8">
                            <strong>Nome</strong>
                            <p>{{$turma->disciplina->nome}}</p>
                            <strong>Descrição</strong>
                            <p>{{$turma->disciplina->descricao}}</p>
                            <strong>Ano</strong>
                            <p>{{$turma->ano}}</p>
                            <strong>Carga horária</strong>
                            <p>{{$turma->disciplina->carga_horaria}}</p>
                            <strong>Professor</strong>
                            <p>{{$professor->name}}</p>
                        </div>

                    </div>
                    <hr>

                    <div class="panel-footer">
                      <a class="btn btn-primary" href="{{URL::previous()}}">Voltar</a>

                    @if (Auth::guard()->check() && Auth::user()->isProfessor == true && $professor->id == Auth::user()->id)
                    <a class="btn btn-primary" href="/turma/editar/{{$turma->id}}">Editar</a>
                    <a class="btn btn-primary" onClick="avisoDeletar({{$turma->id}});">Excluir</a>
                    <a class="btn btn-primary" href="/turma/listarSolicitacoes/{{$turma->id}}">Solicitações</a>

                    @endif
                    <a class="btn btn-primary" href="/turma/listarConteudos/{{$turma->id}}">Conteúdos</a>
                    @if (Auth::guard()->check() && Auth::user()->isAluno == true)
                    <?php
                    $turma_participa = \App\Turma_aluno::where('aluno_id', '=', Auth::user()->id)
                                                      ->where('turma_id', '=', $turma->id)
                                                      ->first();

                    if($turma_participa == null){ ?>
                      <a class="btn btn-primary" href="/turma/participar/{{$turma->id}}">Soliciar Participação</a>
                    <?php } else if ($turma_participa->ativo == false) { ?>
                    Solitação já enviada
                  <?php } else { ?>
                    <a class="btn btn-primary" href="">Sair da turma</a>
                  <?php } ?>
                    @endif
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
