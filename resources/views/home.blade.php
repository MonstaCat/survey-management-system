@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-body">
                    <div class="container">
                        <br>
                        @if ($userHasTakenSurvey == 0)
                            <form action="{{ route('survey.submit') }}" method="post">
                                @csrf
                                @foreach ($questions as $question)
                                    <input type="text" name="question" readonly class="form-control-plaintext" id="question" value="{{ $question['question'] }}">
                                    <ul style="list-style: none; margin-left: -20px">
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
                                <button type="submit" class="btn btn-block btn-primary mt-4 mb-3">Cek Hasil</button>
                            </form>
                        @else
                            <h2>Hasil Survey</h2>
                            <hr>
                            @foreach ($results as $result)
                                <div class="card mb-4">
                                    <div class="card-header" style="word-wrap: break-word;">
                                        <input type="text" name="question" readonly class="form-control-plaintext" id="question" value="{{ $result['question'] }}">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">{{ $result['answer'] }}</h5>
                                        <table class="table table-fixed">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 50%;">Kesimpulan</th>
                                                    <th scope="col" style="width: 50%;">Rekomendasi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $result['conclusion'] }}</td>
                                                    <td>{{ $result['recommendation'] }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
