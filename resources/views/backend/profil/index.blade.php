@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header rounded-2">
            <h1>Profil</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                          <h4>Data Diri</h4>
                        </div>
                        <div class="card-body">
                                                
                          <table class="table">
                            <thead>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$profil->nama}}</td>
                                    <td>{{$profil->telepon}}</td>
                                    <td> {{$profil->alamat}}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning">Edit</a>
                                    </td>
                                </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                          <h4>Ubah Sandi</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection