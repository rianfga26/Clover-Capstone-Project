@extends('layouts.master-admin')

@section('body')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-capitalize">Akun Admin Dusun </h3>
               <br>
               <br>
               
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active text-capitalize" aria-current="page">Akun admin dusun</li>
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
                           
                            <th>username</th>
                            
                            <th>email</th>
                            <th>password</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                        
                            <td>Marco</td>
                            <td>Saint-Remy-Geest</td>
                         
                            <td>1</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm ">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                
                            </td>
                        </tr>
                        <tr>
                           
                            <td>sasa</td>
                            <td>Saint-Remy-Geest</td>
                           
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

