@extends('layouts.master-admin')

@section('body')

<div class="page-heading">
    <h3>Profile Statistics</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row text-center">
                                <div
                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center ">
                                    <iconify-icon icon="fa-solid:clinic-medical" style="color: #018cb5;"
                                        width="50" height="50"></iconify-icon>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-extrabold my-2">3</h6>
                                    <h6 class="text-muted font-semibold ">Total Posyandu</h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row text-center">
                                <div
                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center ">

                                    <iconify-icon icon="icon-park-outline:baby" style="color:#018cb5;"
                                        width="50" height="50"></iconify-icon>

                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-extrabold my-2">78</h6>
                                    <h6 class="text-muted font-semibold">Total Balita</h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row text-center">
                                <div
                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center ">
                                    <iconify-icon icon="streamline:toilet-women-solid"
                                        style="color: #018cb5;" width="44"
                                        height="44"></iconify-icon>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-extrabold my-2">47</h6>
                                    <h6 class="text-muted font-semibold">Total Ibu Hamil</h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row text-center">
                                <div
                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center ">
                                    <iconify-icon icon="ic:baseline-blind" style="color: #018cb5;"
                                        width="50" height="50"></iconify-icon>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-extrabold my-2">112</h6>
                                    <h6 class="text-muted font-semibold">Total Posbindu lansia</h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Total balita</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Total ibu hamil</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="{{ asset('/assets/compiled/jpg/1.jpg') }}" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">John Duck</h5>
                            <h6 class="text-muted mb-0">@johnducky</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Visitors Profile</h4>
                </div>
                <div class="card-body">
                    <div id="chart-visitors-profile"></div>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection