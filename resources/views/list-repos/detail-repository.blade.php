@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('show.details', $detailRepository['owner']['login']) }}">Desenvolvedor</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('show.repositories', $detailRepository['owner']['login']) }}">Repositórios</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Repositório</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $detailRepository['name'] }}</h5>
                        <p class="card-text"><a href="{{ $detailRepository['html_url'] }}" target="_blank">Github</a></p>
                        <p class="card-text">Linguagem: {{ $detailRepository['language'] }}</p>
                        <p class="card-text">Descrição: {{ $detailRepository['description'] }}</p>
                        <p class="card-text"><small class="text-muted">Última atualzação: {{ date('d/m/y H:m', strtotime($detailRepository['updated_at'])) }}</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
