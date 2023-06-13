@extends('layouts.admin')

@include('partials.header')

@section('content')
    <div class="container w-50">
        <div class="py-4">
            <a href="{{ route('admin.project.index') }}" class="btn btn-secondary">Torna indietro</a>
        </div>


        <div class="card">
            <img src="{{ $project->image }}" class="card-img-top" alt="{{ $project->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $project->name }}</h5>
                <p> {{ $project->types->name }}</p>
                <p class="card-text">{{ $project->description }}</p>
            </div>
        </div>
    </div>
@endsection
