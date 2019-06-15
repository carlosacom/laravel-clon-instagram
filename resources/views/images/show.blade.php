@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-3 shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-1">
                            @if ($image->user->image)
                            <img src="{{ route('userAvatar', ['filename' => $image->user->image]) }}"  width="40" height="40" class="rounded-circle" alt="Imagen del usuario">
                            @endif
                        </div>
                        <div class="col-11 d-flex align-self-center">
                            {{ $image->user->name . ' ' . $image->user->surname }}
                            <span class="text-secondary">
                                &nbsp;
                                {{ ' | @' . $image->user->nick }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <img src="{{ route('imageFile', ['image_path' => $image->image_path]) }}" alt="Imagen a mostrat" class="img-fluid w-100">
                    <div class="px-3 pt-3">
                        <a href="#" class="mr-3">

                            <i class="far fa-heart h2 text-secondary"></i>

                        </a>

                        <a href="#" class="mr-3 h2 text-secondary text-decoration-none" >
                            <i class="far fa-comment"></i>
                            {{ count($image->comments) }}
                        </a>
                    </div>
                    <div class="p-3">
                        <span class="text-secondary mb-0">
                            {{ '@' . $image->user->nick }}
                        </span>
                        <small class="text-muted">
                            {{ ' | ' .  \FormatTime::LongTimeFilter($image->created_at) }}
                        </small>
                        <br>
                        <p class="pb-0">
                            {{ $image->description }}
                        </p>
                        
                        <div> 
                            <h2>Commentarios </h2>
                            <hr>
                            <form action="{{-- route('comments.store') --}}#" method="POST">
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection