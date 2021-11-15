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
                                <li class="breadcrumb-item active" aria-current="page">Desenvolvedor</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $detailsUser['avatar_url'] }}" class="img-fluid rounded-start" alt="{{ $detailsUser['avatar_url'] }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $detailsUser['name'] }}</h5>
                                <p class="card-text"><a href="{{ $detailsUser['html_url'] }}" target="_blank">Github</a></p>
                                <p class="card-text">E-mail: {{ $detailsUser['email'] }}</p>
                                <p class="card-text">Localidade: {{ $detailsUser['location'] }}</p>
                                <p class="card-text">Empresas: {{ $detailsUser['company'] }}</p>
                                <p class="card-text"><a href="{{ route('show.repositories', $detailsUser['login']) }}">Repositórios públicos ({{ $detailsUser['public_repos'] }})</a></p>
                                <p class="card-text">Seguidores: {{ $detailsUser['followers'] }}</p>
                                <p class="card-text"><small class="text-muted">Última atualzação: {{ date('d/m/y H:m', strtotime($detailsUser['updated_at'])) }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
