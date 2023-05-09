@extends('admin._partials.default')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Category</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">Category List</h6>
        <a href="{{ route('category.add') }}" class="btn btn-primary btn-icon-split float-right">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add New Category</span>
        </a>    
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="category-table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Category Order</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Category Order</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category['category_order'] }}</td>
                        <td>{{ $category['category'] }}</td>
                        <td>
                            <a href="{{ '/admin/category/'.$category['_id'] }}" class="btn btn-sm btn-warning btn-icon-split my-1">
                                <span class="icon text-white-50">
                                    <i class="fas fa-pen"></i>
                                </span>
                                <span class="text">Edit</span>
                            </a>
                            <a 
                            
                            onclick="Swal.fire({
                                        title: 'Are you sure?',
                                        text: 'You wont be able to revert this!',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes, delete it!'
                                        }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '{{ '/admin/category/delete/'.$category['_id'] }}';
                                            
                                        }
                                        }) "
                            
                            class="btn btn-sm btn-danger btn-icon-split my-1">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Delete</span>
                            </a>
                            
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Details Modal-->
@foreach($categories as $category)
<div class="modal fade" id="categoriesModal-{{ $category['_id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Category Details</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <label for="category" class="form-label font-weight-bold">Category Order</label>
                    <input type="text" class="form-control" id="category" value="{{ $category['category_order'] }}" readonly>
                </div>
                <div class="mb-4">
                    <label for="category" class="form-label font-weight-bold">Question</label>
                    <input type="text" class="form-control" id="category" value="{{ $category['category'] }}" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('#category-table').DataTable();
    });
</script>

<script src="sweetalert2.all.min.js"></script>


@stop