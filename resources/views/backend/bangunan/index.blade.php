@extends('layouts.app')

@section('title', 'Bangunan')

@section('content')
    <section class="section">
        <div class="section-header rounded-2 d-flex justify-content-between">
            <h1>Bangunan</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bangunanModal">Tambah Baru</button>
        </div>

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <p class="text-primary">List Bangunan</p>
                </div>
                <div class="card-body">
                    <table id="bahanTable" class="table table-striped" style="width:100%">
                        <thead>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Dibuat pada</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($bangunan as $bgn)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bgn->kode }}</td>
                                <td>{{ $bgn->nama }}</td>
                                <td>{{ $bgn->created_at }}</td>
                                <td>
                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#bangunanModal-{{$bgn->kode}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$bgn->kode}}">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Tambah Bangunan -->
    <div class="modal fade" id="bangunanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah <span class="text-primary">Bangunan</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="{{ route('bangunan.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="kode" class="form-label text-dark">Kode</label>
                            <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode') }}" required>
                            @error('kode')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label text-dark">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



 <!-- Modal Edit Bangunan -->
  @foreach ($bangunan as $modal)

  <div class="modal fade" id="bangunanModal-{{$modal->kode}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit <span class="text-warning">Bangunan</span></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="{{ route('bangunan.update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $modal->id }}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode" class="form-label text-dark">Kode</label>
                        <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode', $modal->kode) }}" required>
                        @error('kode')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label text-dark">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama',$modal->nama) }}" required>
                        @error('nama')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


  {{-- Modal Hapus Bangunan --}}
<div class="modal fade" id="deleteModal-{{$modal->kode}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus <span class="text-danger">Bangunan</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    Apakah Anda Yakin Ingin Menghapus, <strong>{{ $modal->nama }}</strong>?
                </div>
                <div class="small">
                    <b class="text-danger"> Warning</b>: Sub-Bangunan dan Ruangan yang terelasi dengan bangunan ini akan ikut terhapus.
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('bangunan.delete', $modal->id) }}" method="post">
                @method('delete')
                @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

  @endforeach

@endsection