@extends('layouts.app')

@section('title', 'Bangunan')

@section('content')
    <section class="section">
        <div class="section-header rounded-2 d-flex justify-content-between">
            <h1>Bangunan</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bangunanModal">Tambah Baru</button>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Dibuat pada</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>BU</td>
                                <td>Bangunan Utara</td>
                                <td>29-07-2022</td>
                                <td>
                                    <a href="#" class="btn btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="bangunanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah <span class="text-primary">Bangunan</span></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="kode" class="form-label text-dark">Kode</label>
                    <input type="text" class="form-control" id="kode" name="kode">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label text-dark">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama">
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Tambahkan</button>
            </div>
        </div>
        </div>
    </div>
@endsection