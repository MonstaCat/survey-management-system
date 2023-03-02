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
        <a href="{{ route('question.add') }}" class="btn btn-primary btn-icon-split float-right">
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
                            <a href="#" class="btn btn-sm btn-primary btn-icon-split my-1" data-toggle="modal" data-target="#detailsModal-{{ $question['_id'] }}">
                                <span class="icon text-white-50">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                                <span class="text">Details</span>
                            </a>
                            <a href="{{ '/admin/question/'.$question['_id'] }}" class="btn btn-sm btn-warning btn-icon-split my-1">
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
                                            window.location.href = '{{ '/admin/question/delete/'.$question['_id'] }}';
                                            
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
@foreach($questions as $question)
<div class="modal fade" id="detailsModal-{{ $question['_id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Question Details</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <label for="question" class="form-label font-weight-bold">Question Order</label>
                    <input type="text" class="form-control" id="question" value="{{ $question['question_order'] }}" readonly>
                </div>
                <div class="mb-4">
                    <label for="question" class="form-label font-weight-bold">Question</label>
                    <input type="text" class="form-control" id="question" value="{{ $question['question'] }}" readonly>
                </div>
                <div class="mb-4">
                    <label for="answers" class="form-label font-weight-bold">Answer</label>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Answers</th>
                            <th scope="col">Conclusion</th>
                            <th scope="col">Recommendation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($question['answers'] as $index => $answer)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $answer['answer'] }}</td>
                                <td>{{ $answer['conclusion'] }}</td>
                                <td>{{ $answer['recommendation'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
        $('#question-table').DataTable();
    });
</script>

<script src="sweetalert2.all.min.js"></script>


@stop