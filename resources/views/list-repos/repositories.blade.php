@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('show.details', $showRepositories[0]['owner']['login']) }}">Desenvolvedor</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Repositórios</li>
                            </ol>
                        </nav>
                    </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Repositório</th>
                                    <th scope="col">GitHub</th>
                                    <th scope="col">Linguagem</th>
                                    <th scope="col">Última atualização</th>
                                    <th scope="col">Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($showRepositories as $showRepository)
                                    <tr>
                                        <th scope="row">{{ $showRepository['id'] }}</th>
                                        <td>{{ $showRepository['name'] }}</td>
                                        <td>
                                            <a href="{{ $showRepository['html_url'] }}" target="_blank">
                                                Repositório Github
                                            </a>
                                        </td>
                                        <td>{{ $showRepository['language'] }}</td>
                                        <td>{{ date('d/m/y', strtotime($showRepository['updated_at'])) }}</td>
                                        <td>
                                            <a href="{{ route('details.repository', ['developer' => $showRepository['owner']['login'], 'repository' => $showRepository['name']]) }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
