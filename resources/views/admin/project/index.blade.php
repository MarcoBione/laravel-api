@extends('layouts.admin')

@include('partials.header')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Index Projects</h1>

            <a class="btn btn-success text-white" href="{{ route('admin.project.create') }}">Aggiungi nuovo progetto</a>

        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Created</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->name }}</td>
                        <td><img class="img-thumbnail" style="height:100px" src="{{ $project->image }}"
                                alt="{{ $project->name }}">
                        </td>
                        <td>{{ $project->created_at }}</td>
                        <td>
                            <div class="d-flex align-items-center justify-content-around">

                                <a href="{{ route('admin.project.show', $project->id) }} "
                                    class="btn btn-primary text-white">Info</a>

                                <a href="{{ route('admin.project.edit', $project->id) }}"
                                    class="btn btn-warning text-white">Modifica</a>

                                <form class="align-content-center"
                                    action="{{ route('admin.project.destroy', $project->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit' class="btn btn-danger text-white"
                                        data-item-title="{{ $project->title }}">Delete</button>

                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
</div>
