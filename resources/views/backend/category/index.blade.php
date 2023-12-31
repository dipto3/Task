@extends('backend.layouts.master')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">Category List</h4>
                <a href="{{ route('categories.create') }}" class="btn btn-info">Create Category</a>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    No.
                                </th>
                                <th>
                                    Category name
                                </th>
                                <th>
                                    Description
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
                            @forelse($categories as $category) 
                            <tr>
                                <td>
                                    {{ $category->id }}
                                </td>
                                <td>
                                    {{ $category->name }}
                                </td>
                                <td>
                                    {{ $category->description }}
                                </td>
                                <td>
                                    <label class="switch">
                                        <input class="switch_change" name="status" id="{{ $category->id }}"
                                            value="{{ $category->status }}" data-onstyle="info" type="checkbox"
                                            @php if ($category->status == 1) echo "checked"; @endphp>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td>
                                    
                                    <a class="btn btn-info" type="submit" href="{{ route('categories.edit',$category->id) }}"
                                        class="btn btn-danger delete_product">
                                        <i class="las la-edit"></i>
                                    </a>
                                    <form action="{{ route('categories.destroy',$category->id) }}" method="post" class="btn">
                                        @csrf
                                    @method('delete')
                                    <button type="submit" href="" class="btn btn-danger delete_product">
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
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
           //for category status change
        $(document).ready(function() {
            $("#example").DataTable()
        });
        $('.switch_change').on('change', function(e) {
            e.preventDefault();
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).attr('id');

            $.ajax({

                url: '{{ route('status') }}',
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