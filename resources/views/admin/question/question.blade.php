@extends('admin._partials.default')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Question</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">Question List</h6>
        <a href="#" class="btn btn-primary btn-icon-split float-right">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add New Question</span>
        </a>    
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="question-table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Question Order</th>
                        <th>Question</th>
                        <th>Total Answer</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Question Order</th>
                        <th>Question</th>
                        <th>Total Answer</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                @foreach($questions as $question)
                    <tr>
                        <td>{{ $question['question_order'] }}</td>
                        <td>{{ $question['question'] }}</td>
                        <td>{{ count($question['answers']) }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary btn-icon-split my-1">
                                <span class="icon text-white-50">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                                <span class="text">Details</span>
                            </a>
                            <a href="#" class="btn btn-sm btn-warning btn-icon-split my-1">
                                <span class="icon text-white-50">
                                    <i class="fas fa-pen"></i>
                                </span>
                                <span class="text">Edit</span>
                            </a>
                            <a href="#" class="btn btn-sm btn-danger btn-icon-split my-1">
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

@stop