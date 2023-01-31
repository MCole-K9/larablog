@extends("layout")

@section("titile", $post->titile)


@section("content")

<form class="p-5" method="POST" action="{{route('posts.update', ['post' => $post->id])}}">
    @csrf
    @method("PUT")
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Title</label>
      <input type="text" name="title" value="{{old('titile') ? old('titile') : $post->title}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      @error('title')
          <div class="text-red">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
        <label for="">Description</label>
      <textarea name="description" class="form-control" id="" cols="30" rows="10">{{old("description") ? old("description") : $post->description}}</textarea>
      @error('description')
          <div class="text-red">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection

@endsection
