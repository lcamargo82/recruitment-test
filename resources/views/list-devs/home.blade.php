@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Home</li>
                        </ol>
                    </nav>
                    @can('Admin')
                    <form method="post" action="{{ route('search.language') }}">
                        @csrf
                        <div class="row">
                            <div class="input-group mb-3 col-3">
                                <input type="text" class="form-control" placeholder="Buscar linguagem" name="search[language]" aria-label="Language" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3 col-3">
                                <input type="text" class="form-control" placeholder="Buscar localização" name="search[location]" aria-label="Language" aria-describedby="basic-addon1">
                            </div>
                            <div>
                                <button class="btn btn-info">Buscar</button>
                            </div>
                        </div>
                    </form>
                    @endcan
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">Desenvolvedor</th>
                            @can('Admin')
                            <th scope="col">Ação</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listUsers as $listUser)
                        <tr>
                            <th scope="row">{{ $listUser['id'] }}</th>
                            <td>
                                <img style="width: 1.4rem" src="{{ $listUser['avatar_url'] }}" alt="{{ $listUser['avatar_url'] }}">
                            </td>
                            <td>{{ $listUser['login'] }}</td>
                            @can('Admin')
                            <td>
                                <a href="{{ route('show.details', $listUser['login']) }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
