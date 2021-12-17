@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <div class="container">
        <div class="py-4 text-center">
            <img class="d-block mx-auto mb-4" src="{{ asset('storage/imagens/logo.jpg') }}" alt="" width="90" height="90">
        </div>
        <div class="row">
                <div class="col-md-12">
                    <h2 class="card-title">Sorteios</h2>
                    <p class="card-text">
                        Crie um amigo secreto e convide seus amigos a participar ou <br>
                        Inscreva-se e participe de um amigo secreto!
                    </p>
                    <a href="/grupoSorteio" class="btn btn-lg btn-block btn-primary">Acesse</a>
                </div>
        </div>
    </div>
</div>
@endsection