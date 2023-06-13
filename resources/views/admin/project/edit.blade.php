@extends('layouts.admin')

@include('partials.header');
@section('content')
    <div class="container">

        <h1>Modifica il tuo progetto</h1>

        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <form action="{{ route('admin.project.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name">Nome progetto</label>
                <input type="text" class="form-control" name="name" id="name" required maxlength="150" minlength="3"
                    placeholder="Max 150 - Min 3" value="{{ $project->name }}">
            </div>

            <div class="d-flex">

                <div class="mb-3">
                    <label for="image">Immagine</label>
                    <input type="text" class="form-control" name="image" id="image" placeholder="Url"
                        value="{{ $project->image }}">
                </div>
            </div>

            <div class="mb-3">
                <label for="type_id">Tipo</label>
                <select name="type_id" id="type_id" class="form-control">
                    <option value="">Seleziona tipo</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ $type->id == old('type_id', $project->type_id) ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="description">Descrizione</label>
                <textarea name="description" id="description" rows="10" class="form-control">{{ $project->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Salva modifiche</button>
            <a href="{{ route('admin.project.index') }}" class="btn btn-danger">Annulla e torna indietro</a>

        </form>

    </div>
@endsection
