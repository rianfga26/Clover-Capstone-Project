@extends('layouts.master-admin')

@section('body')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-capitalize">kategori Dokumentasi</h3>
                <br>
                <br>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kategori</li>
                        <li class="breadcrumb-item active" aria-current="page">Dokumentasi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">


            </div>

            <div class="card-body">
                <button type="button" class="btn btn-secondary btn-lg">Tambah data</button>

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>

                            <th>judul</th>
                            <th>gambar</th>
                            <th>deskripsi</th>
                            <th>tanggal dibuat</th>
                            <th>lokasi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>

                            <td>Marco</td>
                            <td>xxx</td>
                            <td>haha</td>

                            <td>1</td>
                            <td>surabaya</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm ">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>

                            </td>
                        </tr>
                        <tr>

                            <td>sasa</td>
                            <td>xxx</td>
                            <td>haha</td>

                            <td>1</td>
                            <td>surabaya</td>
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