@extends('admin._partials.default')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Category Update Form</h1>
<p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, asperiores enim. Alias provident esse aperiam aspernatur eaque reiciendis quas ab ut quos exercitationem ipsa dignissimos eius fuga, reprehenderit, obcaecati nihil!.</p>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('admin.category') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-chevron-left"></i>
            </span>
            <span class="text">Back</span>
        </a>    
    </div>
    <div class="card-body">
        <form id="editForm" action="{{ route('category.update', $category['_id']) }}" method="post">
            @csrf
            <input type="hidden" name="_id" value="{{ $category['_id'] }}">
            <div class="form-group">
                <label for="category_order">Category Order</label>
                <input type="text" class="form-control" id="category_order" name="category_order" value="{{ $category['category_order'] }}">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="{{ $category['category'] }}">
            </div>
            <button type="submit" class="btn btn-warning mb-4">Update</button>
        </form>
    </div>
</div>

@stop