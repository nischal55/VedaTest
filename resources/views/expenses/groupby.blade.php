@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                 <form action="{{route('expenses.fileterDateGroupBy')}}" method="POST" class="row g-3">
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
                            <th scope="col">Category Name</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">TotalProduct</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($expenses as $expense)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $expense->item_name }}</td>

                                <td>{{ $expense->category_name }}</td>
                                <td>Rs.{{ $expense->total_price }}</td>

                                <td>{{ $expense->count }}</td>

                               
                            </tr>
                        @endforeach
                    </tbody>                    
                </table>
                @if(request()->route()->getName() == 'expenses.groupby')
                <div class="col-md-2">
                    <!-- Small card on the right side -->
                    <div class="card">
                        <div class="card-header">Total Price</div>
                        <div class="card-body">
                            @if(isset($totalPrice))
                            Rs.{{ $totalPrice }}
                        @endif
                        </div>
                    </div>
            </div>
            @endif
        </div>
    </div>
@endsection