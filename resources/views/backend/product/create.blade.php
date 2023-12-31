@extends('backend.layouts.master')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Product</h4>
                <form class="forms-sample" action="{{ route('product.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter Name">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control category" name="category_id" id="category">
                            <option>Choose Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                  
                    
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" value="{{ old('price') }}" placeholder="Enter Name">
                        @error('price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" name="quantity" class="form-control" value="{{ old('quantity') }}" placeholder="Enter Name">
                        @error('quantity')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                    
                   
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
