@extends('user._partials.default')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card-header p-0 position-relative mt-n4 my-4 z-index-2">
                <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-dark text-xl text-capitalize ps-3">Form Penilaian SPMI</h6>
                    <div class="row gx-4 mb-2 ps-3">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                <i class="fas fa-school text-dark fa-3x"></i>
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1 text-dark">
                                    Universitas Islam Negeri Sultan Syarif Kasim Riau
                                </h5>
                                <p class="mb-0 font-weight-normal text-dark text-sm">
                                    Manajemen Perusahaan
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($userHasTakenSurvey == 0)
        <div class="col-12">
            <form action="{{ route('survey.submit') }}" method="post">
                @csrf
                @foreach($categories as $category)
                <div class="card mt-5">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-dark text-capitalize text-xl ps-3">{{ $category['category'] }}</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($questions as $question)
                            @if($category['_id'] == $question['category'])
                            <li class="list-group-item d-flex border-0 p-4 mb-3 bg-gray-200 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <span class="mb-2 text-l">{{ $question['question'] }}</span>
                                    @foreach ($question['answers'] as $index => $answer)
                                    <label class="text-l form-label">
                                        <input type="radio" name="answer[{{ $question['_id'] }}]" value="{{ $index }}">
                                        {{ $answer['answer'] }}
                                    </label>
                                    @endforeach
                                </div>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
                <button type="submit" class="btn btn-block btn-primary col-12 mt-4">Cek Hasil</button>
            </form>
        </div>
        @else
        <h2>Hasil Survey</h2>
        <div class="col-12">
            @foreach($categories as $category)
            <div class="card mt-5">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-dark text-capitalize text-xl ps-3">{{ $category['category'] }}</h6>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($results as $result)
                        @foreach($questions as $question)
                        @if($category['_id'] == $question['category'] && $result['question_id'] == $question['_id'])
                        <li class="list-group-item border-0 p-4 mb-3 bg-gray-200 border-radius-lg">
                            <div class="flex-column">
                                <span class="mb-2 text-l">{{ $result['question'] }}</span><br>
                                <span><h5>{{ $result['answer'] }}</h5></span>
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-md-6 mb-md-0 mb-4">
                                            <div class="card card-body border card-plain border-radius-lg">
                                                <h6 class="mb-0">
                                                    Kesimpulan
                                                </h6>
                                                <span class="text-l">{{ $result['conclusion'] }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card card-body border card-plain border-radius-lg">
                                                <h6 class="mb-0">
                                                    Rekomendasi
                                                </h6>
                                                <span class="text-l">{{ $result['recommendation'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>

@stop