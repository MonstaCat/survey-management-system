@extends('admin._partials.default')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Question Add Form</h1>
<p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, asperiores enim. Alias provident esse aperiam aspernatur eaque reiciendis quas ab ut quos exercitationem ipsa dignissimos eius fuga, reprehenderit, obcaecati nihil!.</p>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('admin.question') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-chevron-left"></i>
            </span>
            <span class="text">Back</span>
        </a>    
    </div>
    <div class="card-body">
        <form id="addForm" action="{{ route('question.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="question_order">Question Order</label>
                <input type="text" class="form-control" id="question_order" name="question_order" value="">
            </div>
            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" class="form-control" id="question" name="question" value="">
            </div>
            <button type="submit" class="btn btn-warning mb-4">Save</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>

@stop