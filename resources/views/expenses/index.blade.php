@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                 <form action="{{route('expenses.fileterDate')}}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-md-4 mb-3">
                        <label for="startDate" class="form-label">Start Date:</label>
                        <input type="date" class="form-control" id="startDate" name="startDate">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="endDate" class="form-label">End Date:</label>
                        <input type="date" class="form-control" id="endDate" name="endDate">
                    </div>
                    <div class="col-md-4 mb-4" style="margin-top:3rem;">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Category name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($expenses as $expense)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $expense->item_name }}</td>

                                <td>{{ $expense->category->name }}</td>
                                <td>{{ $expense->created_at }}</td>

                                <td>
                                    <!-- Edit Button -->
                                    <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-primary btn-sm me-2">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <!-- Delete Button -->
                                    <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display: inline;">
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
                <div class="col-md-2">
                    <!-- Small card on the right side -->
                    <div class="card">
                        <div class="card-header">Total Price</div>
                        <div class="card-body">
                            ${{ $totalPrice }}
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection