@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">Subir Nueva Imagen</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('imagenes.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image">Imagen</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" required/>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Descripción de la imagen" required>{{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Publicar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
