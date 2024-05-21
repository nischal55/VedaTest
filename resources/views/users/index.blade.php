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
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                {{-- <td><img class="img-fluid" style="max-height:100px;" src="{{ url('/images/' . $user->image) }}"></td> --}}
                                <td>
                                    <!-- Edit Button -->
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm me-2">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <!-- Delete Button -->
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>                    
                </table>
            </div>
        </div>
    </div>
@endsection
