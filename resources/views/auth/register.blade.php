@extends('layout')


@section('titile', 'Register')


@section('content')
    <h1>Gaza Registration</h1>


    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your name">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleFormControlInput1"
                placeholder="name@example.com">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleFormControlInput1">

            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Confirm Password</label>
            <input name="password_confirmation" type="password" class="form-control" id="exampleFormControlInput1">
            @error('password_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">Submiy</button>
    </form>
@endsection
