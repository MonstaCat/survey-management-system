@extends('admin._partials.default')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Question Update Form</h1>
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
        <form id="editForm" action="{{ route('question.update', $question['_id']) }}" method="post">
            @csrf
            <input type="hidden" name="_id" value="{{ $question['_id'] }}">
            <div class="form-group">
                <label for="question_order">Question Order</label>
                <input type="text" class="form-control" id="question_order" name="question_order" value="{{ $question['question_order'] }}">
            </div>
            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" class="form-control" id="question" name="question" value="{{ $question['question'] }}">
            </div>
            <!-- Hidden answer -->
            @foreach ($question['answers'] as $index => $answer)
            <input type="hidden" name="answers[{{ $index }}][answer]" value="{{ $answer['answer'] }}">
            <input type="hidden" name="answers[{{ $index }}][conclusion]" value="{{ $answer['conclusion'] }}">
            <input type="hidden" name="answers[{{ $index }}][recommendation]" value="{{ $answer['recommendation'] }}">
            @endforeach
            <button type="submit" class="btn btn-warning mb-4">Update</button>
        </form>
        <!-- End of hidden answer -->
        <div class="form-group">
            <div id="answersTable">
                <div class="card mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Answer</h6>
                        <a href="#" class="btn btn-primary btn-icon-split float-right" data-toggle="modal" data-target="#addAnswersModal">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Add New Answer</span>
                        </a>    
                    </a>    
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Answers</th>
                                <th scope="col">Conclusion</th>
                                <th scope="col">Recommendation</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($question['answers'] as $index => $answer)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $answer['answer'] }}</td>
                                <td>{{ $answer['conclusion'] }}</td>
                                <td>{{ $answer['recommendation'] }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning btn-icon-split my-1" data-toggle="modal" data-target="#answersModal-{{ $index }}">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                    </a>
                                    <form id="answerDelete-{{ $index }}" action="{{ route('answer.delete', ['question'=>$question['_id']]) }}" method="post">
                                        @csrf
                                        
                                        <input type="hidden" name="_id" value="{{ $question['_id'] }}">
                                        <input type="hidden" name="question" value="{{ $question['question'] }}">
                                        <input type="hidden" name="question_order" value="{{ $question['question_order'] }}">
                                        <input type="hidden" name="answer_index" value="{{ $index }}">
                                        @foreach ($question['answers'] as $index => $answer)
                                            
                                            <input type="hidden" name="answers[{{ $index }}][answer]" value="{{ $answer['answer'] }}">
                                            <input type="hidden" name="answers[{{ $index }}][conclusion]" value="{{ $answer['conclusion'] }}">
                                            <input type="hidden" name="answers[{{ $index }}][recommendation]" value="{{ $answer['recommendation'] }}">
                                        @endforeach
                                        
                                        <button type="submit" class="btn btn-sm btn-danger btn-icon-split my-1">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add answer modal -->
<div class="modal fade" id="addAnswersModal" tabindex="-1" role="dialog" aria-labelledby="addAnswerModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Answer</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="answerAddForm" action="{{ route('answer.add') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="_id" value="{{ $question['_id'] }}">
                    <input type="hidden" name="question" value="{{ $question['question'] }}">
                    <input type="hidden" name="question_order" value="{{ $question['question_order'] }}">
                    
                    <div class="mb-4">
                        <label for="answer" class="form-label font-weight-bold">Answer</label>
                        <input type="text" class="form-control" name="answer" id="answer" value="">
                    </div>
                    <div class="mb-4">
                        <label for="conclusion" class="form-label font-weight-bold">Conclusion</label>
                        <input type="text" class="form-control" name="conclusion" id="conclusion" value="">
                    </div>
                    <div class="mb-4">
                        <label for="recommendation" class="form-label font-weight-bold">Recommendation</label>
                        <input type="text" class="form-control" name="recommendation" id="recommendation" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Answer Edit Modal-->
@foreach($question['answers'] as $index => $answer)
<div class="modal fade" id="answersModal-{{ $index }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-{{ $index }}"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Answer Edit</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="answerUpdateForm-{{ $index }}" action="{{ route('answer.update', $question['_id']) }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="_id" value="{{ $question['_id'] }}">
                    <input type="hidden" name="question" value="{{ $question['question'] }}">
                    <input type="hidden" name="question_order" value="{{ $question['question_order'] }}">
                    <input type="hidden" name="answer_index" value="{{ $index }}">
                    
                    <div class="mb-4">
                        <label for="answer" class="form-label font-weight-bold">Answer</label>
                        <input type="text" class="form-control" name="answer" id="answer" value="{{ $answer['answer'] }}">
                    </div>
                    <div class="mb-4">
                        <label for="conclusion" class="form-label font-weight-bold">Conclusion</label>
                        <input type="text" class="form-control" name="conclusion" id="conclusion" value="{{ $answer['conclusion'] }}">
                    </div>
                    <div class="mb-4">
                        <label for="recommendation" class="form-label font-weight-bold">Recommendation</label>
                        <input type="text" class="form-control" name="recommendation" id="recommendation" value="{{ $answer['recommendation'] }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<script src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>

@stop