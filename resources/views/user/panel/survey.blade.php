@extends('user._partials.default')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Form Penilaian SPMI</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gx-4 mb-2">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                <i class="fas fa-school text-secondary fa-3x"></i>
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    Universitas Islam Negeri Sultan Syarif Kasim Riau
                                </h5>
                                <p class="mb-0 font-weight-normal text-sm">
                                    Manajemen Perusahaan
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach($questions as $question)
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex p-2 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <span class="mb-2 text-m">{{ $question['question'] }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@stop