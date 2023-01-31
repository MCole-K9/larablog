@extends("layout")

@section("content")

<h1>View Route</h1>

<main class="my-5">
    <div class="card shadow mx-auto w-50 my-3">
        <div class="card-head">
            <h3>{{$post->title}} by <p>{{$post->user->name}}</p> </h3>
        </div>
        <div class="card-body">
            <p>{{$post->description}}</p>

        </div>

        @if (Auth::user()->id == $post->user_id)
            <a href={{route('posts.edit', ['post' => $post->id])}} class="btn btn-primary">EDIT</a>
            <form method="POST" action="{{route('posts.destroy', [$post])}}">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        @endif

    </div>
</main>

@endsection
