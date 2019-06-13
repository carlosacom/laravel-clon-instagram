@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subir Nueva Imagen</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('imagenes.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Descripción de la imagen" required>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
