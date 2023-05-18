@extends('user._partials.default')

@section('content')

<div class="page-header min-height-300 border-radius-xl mt-4"
    style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
    <span class="mask  bg-gradient-primary  opacity-6"></span>
</div>
<div class="card card-body mx-1 mx-md-4 mt-n6">
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
        <div class="col-lg-1 col-md-2 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
                <ul class="nav nav-pills nav-fill p-1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="javascript:;" role="tab"
                            aria-selected="true">
                            <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="row">
            <div class="col-12 col-xl-4">
                <div class="card card-plain h-100">
                    <div class="card-body p-3">
                        <h6 class="text-uppercase text-body text-l font-weight-bolder mt-2 mb-3">Perguruan Tinggi</h6>
                        <table class="list-group">
                            <tr>
                                <td><li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">NPSN</strong></td>
                                <td><li class="list-group-item border-0 ps-0 text-sm"> : 201005</td>
                            </tr>
                            <tr>
                                <td><li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Bentuk Pendidikan</strong></td>
                                <td><li class="list-group-item border-0 ps-0 text-sm"> : Universitas</td>
                            </tr>
                            <tr>
                                <td><li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Status</strong></td>
                                <td><li class="list-group-item border-0 ps-0 text-sm"> : Swasta</td>
                            </tr>
                            <tr>
                                <td><li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Akreditasi Perguruan Tinggi</strong></td>
                                <td><li class="list-group-item border-0 ps-0 text-sm"> : B</td>
                            </tr>
                        </table>
                        <!-- <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">NPSN:</strong> &nbsp; 201005</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Bentuk Pendidikan:</strong> &nbsp; Universitas</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Status:</strong> &nbsp; Swasta</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Akreditasi Perguruan Tinggi:</strong> &nbsp; B</li>
                        </ul> -->
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="card card-plain h-100">
                    <div class="card-body p-3">
                        <h6 class="text-uppercase text-body text-l font-weight-bolder mt-2 mb-3">Program Studi</h6>
                        <table class="list-group">
                            <tr>
                                <td><li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nama Program Studi</strong></td>
                                <td><li class="list-group-item border-0 ps-0 text-sm"> : Manajemen Perusahaan</td>
                            </tr>
                            <tr>
                                <td><li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Kode Program Studi</strong></td>
                                <td><li class="list-group-item border-0 ps-0 text-sm"> : 61405</td>
                            </tr>
                            <tr>
                                <td><li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Jenjang Pendidikan</strong></td>
                                <td><li class="list-group-item border-0 ps-0 text-sm"> : D3</td>
                            </tr>
                            <tr>
                                <td><li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Akreditasi Program Studi</strong></td>
                                <td><li class="list-group-item border-0 ps-0 text-sm"> : B</td>
                            </tr>
                        </table>
                        <!-- <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nama Program Studi:</strong> &nbsp; Manajemen Perusahaan</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Kode Program Studi:</strong> &nbsp; 61405</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Jenjang Pendidikan:</strong> &nbsp; D3</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Akreditasi Program Studi:</strong> &nbsp; B</li>
                        </ul> -->
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="card card-plain h-100">
                    <div class="card-body p-3">
                        <h6 class="text-uppercase text-body text-l font-weight-bolder mt-2 mb-3">Pembina Perguruan Tinggi</h6>
                        <table class="list-group">
                            <tr>
                                <td><li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Induk Pembina</strong></td>
                                <td><li class="list-group-item border-0 ps-0 text-sm"> : Ditjen Pendidikan Islam</td>
                            </tr>
                            <tr>
                                <td><li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Pembina</strong></td>
                                <td><li class="list-group-item border-0 ps-0 text-sm"> : PTA Islam Negeri</td>
                            </tr>
                            <tr>
                                <td><li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Provinsi</strong></td>
                                <td><li class="list-group-item border-0 ps-0 text-sm"> : Riau</td>
                            </tr>
                        </table>
                        <!-- <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Induk Pembina:</strong> &nbsp; Ditjen Pendidikan Islam</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Pembina:</strong> &nbsp; PTA Islam Negeri</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Provinsi:</strong> &nbsp; Riau</li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop