@extends('layouts.master-admin')

@section('body')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pendaftaran Anggota </h3>
                <br>
                <br>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pendaftaran Anggota</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">


            <div class="card-body">
                <button type="button" class="btn btn-secondary btn-lg">Tambah data</button>
                <button type="button" class="btn btn-secondary btn-lg">Cetak</button>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>nkk</th>
                            <th>nik</th>
                            <th>nama</th>
                            <th>tempat lahir</th>
                            <th>tanggal lahir</th>
                            <th>alamat</th>
                            <th>dusun</th>
                            <th>rt/rw</th>
                            <th>tanggal dibuat</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>21345</td>
                            <td>3130021021</td>
                            <td>Marco</td>
                            <td>Saint-Remy-Geest</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm ">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>

                            </td>
                        </tr>
                        <tr>
                            <td>213414</td>
                            <td>3130021020</td>
                            <td>sasa</td>
                            <td>Saint-Remy-Geest</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>

                            </td>
                        </tr>
                        <tr>
                            <td>213414</td>
                            <td>3130021020</td>
                            <td>sasa</td>
                            <td>Saint-Remy-Geest</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection