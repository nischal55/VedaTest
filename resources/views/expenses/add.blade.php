@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{ route('expenses.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="item_name">Item Name</label>
                        <input type="text" class="form-control" id="item_name" name="item_name" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Item</button>
                </form>
            </div>
        </div>
    </div>
@endsection
