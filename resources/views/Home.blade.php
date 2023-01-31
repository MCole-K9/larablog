@extends('layout')


@section('title', 'Home')



@section('content')

    <div style="text-align: center;">
        <h1>Gaza</h1>

        @forelse ($posts as $post )
            <div class="card shadow mx-auto w-50 my-3">
                <div class="card-head">
                    <h3>{{$post->title}}</h3>
                </div>
                <div class="card-body">
                    <p>{{$post->description}}</p>
                    <p>{{$post->user->name}}</p>
                </div>
                <a href={{"posts/{$post->id}"}} class="btn btn-primary">View</a>
            </div>
            @empty
                <h1>You have no posts, login to create post</h1>
        @endforelse
    </div>
@endsection
