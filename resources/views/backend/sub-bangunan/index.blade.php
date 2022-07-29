@extends('layouts.app')

@section('title', 'Sub Bangunan')

@section('content')

    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h4>Sub Bangunan</h4>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Baru</button>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <p class="text-primary">List Sub Bangunan</p>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Bangunan</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Dibuat pada</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Bangunan Utama</td>
                                <td>FI</td>
                                <td>Fakultas Informatika</td>
                                <td>29-07-2022</td>
                                <td>
                                    <a href="#" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <a href="#" class="btn btn-danger">
                                        Hapus
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
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah <span class="text-primary">Sub Bangunan</span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="kode" class="form-label">Kode</label>
            <input type="text" class="form-control" name="kode" id="kode">
          </div>
          <div class="mb-3">
            <label for="bangunan" class="form-label">Bangunan</label>
            <select class="form-select" name="bangunan" id="bangunan">
                <option value="">Pilih Bangunan</option>
                @foreach ($bangunan as $bgn)
                <option value="{{ $bgn->id }}">{{ $bgn->kode }} - {{ $bgn->nama }}</option>
                @endforeach               
            </select>
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>



@endsection