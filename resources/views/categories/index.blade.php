@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $category->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>                    
                </table>
            </div>
        </div>
    </div>
@endsection
