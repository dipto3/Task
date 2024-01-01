@extends('backend.layouts.master')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title ">Product List</h4>
                <div class="row">

              
                    <div class="col-md-2">
                        <a href="{{ route('product.create') }}" class="btn btn-info">Create Product</a>
                    </div>
                    <div class="col-md-6" >
                        <form action="{{ route('import') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <input type="file" name="file">
                            <button class="btn btn-info" type="submit">Import</button>
                        </form>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('export') }}" style="float: right;" class="btn btn-primary">Export</a>
                    </div>
                    

            </div>

                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    No.
                                </th>
                                <th>
                                    Product name
                                </th>
                                <th>
                                    Product Category
                                </th>
                                <th>
                                    Product Price
                                </th>
                                <th>
                                    Product Quantity
                                </th>
                                <th>
                                    Status
                                </th>

                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product) 
                            <tr>
                                <td>
                                    {{ $product->id }}
                                </td>
                                <td>
                                    {{ $product->name }}
                                </td>
                                <td>
                                    {{ $product->category->name }}
                                </td>
                                <td>
                                    {{ $product->price }}
                                </td>
                                <td>
                                    {{ $product->quantity }}
                                </td>
                                <td>
                                    <label class="switch">
                                        <input class="switch_change" name="status" id="{{ $product->id }}"
                                            value="{{ $product->status }}" data-onstyle="info" type="checkbox"
                                            @php if ($product->status == 1) echo "checked"; @endphp>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td>

                                    <a class="btn btn-info" href="{{ route('product.edit', $product->id) }}"
                                        class="btn btn-danger delete_product">
                                        <i class="las la-edit"></i>
                                    </a>
                                    <form action="{{ route('product.remove', $product->id) }}" method="post"
                                        class="btn">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger delete_product">
                                            <i class="las la-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                                
                               
                            </tr>
                            @empty
                            <b>
                                <p style="color: red;  font-size:18px; text-align:center">No category available!</p>
                            </b>
                            @endforelse
                           
                        </tbody>
                    </table>
                  
                </div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        //for product status change 
        $(document).ready(function() {
            $("#example").DataTable()
        });
        $('.switch_change').on('change', function(e) {
            e.preventDefault();
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).attr('id');

            $.ajax({

                url: '{{ route('product.status') }}',
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    status: status,
                    id: id
                },
            });
        });
    </script>
@endpush