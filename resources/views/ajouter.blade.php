<!-- resources/views/ajouter.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter une photo à l'album "{{ $album->title }}"</h1>

    <!-- Affichage des messages de succès ou d'erreur -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire d'ajout de photo -->
    <form action="{{ route('album.store', ['id' => $album->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="photo">Sélectionnez une photo (JPEG, PNG) :</label>
            <input type="file" name="photo" id="photo" class="form-control" accept=".jpg,.jpeg,.png" required>
            @error('photo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nom">Nom de la photo :</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
            @error('nom')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="etiquettes">Étiquettes :</label>
            <input type="text" name="etiquettes" id="etiquettes" class="form-control">
            @error('etiquettes')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Ajouter la photo</button>
    </form>
</div>
@endsection
