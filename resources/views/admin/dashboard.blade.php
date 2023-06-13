@extends('layouts.admin')

@section('content')
    <div class="container">

        <ul class="nav">

            <li class="nav-item">

                <a class="nav-link active" aria-current="page" href="{{ route('admin.project.index') }}">Tutti i progetti</a>
            </li>

            <li class="nav-item">

                <a class="nav-link" href="{{ route('admin.project.create') }}">Aggiungi nuovo progetto</a>

            </li>

        </ul>

    </div>
@endsection
