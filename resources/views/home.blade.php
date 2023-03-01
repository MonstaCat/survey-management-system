@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="container">
                        <br>
                        <form action="{{ route('survey.submit') }}">
                            @foreach ($questions as $question)
                                <p class="font-weight-bold mb-2">{{ $question['question'] }}</p>
                                <ul style="list-style: none;">
                                    @foreach ($question->answers as $index => $answer)
                                        <li>
                                            <label>
                                                <input type="radio" name="answer[{{ $question['_id'] }}]" value="{{ $index }}">
                                                {{ $answer['answer'] }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
