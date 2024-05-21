@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{route('categories.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Name</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
