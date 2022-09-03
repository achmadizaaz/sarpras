@extends('layouts.app')

@section('title', 'Tambah Bangunan Baru')

@section('content')
    <section class="section">
        <div class="section-header">
            <h4>Tambah Bangunan</h4>
        </div>
        <div class="section-body">
            <div class="row d-flex justify-content-between">
                <div class="col-md-6">
                    <form action="{{ route('bangunan.store') }}" method="POST" class="bg-white p-3 rounded-2">
                        @csrf
                        <div class="mb-3">
                            <label for="kode" class="form-label fw-bold ">Kode</label>
                            <input type="text" class="form-control @error('kode') is-invalid @enderror " name="kode" placeholder="Masukkan kode bangunan" value="{{ old('kode') }}">
                            @error('kode')
                               <span class="small text-danger">  {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-bold ">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan nama bangunan" value="{{ old('nama') }}">
                            @error('nama')
                                <span class="small text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                            
                        </div>
                    </form>
                </div>
                {{-- <div class="col-6">
                    <div class="bg-white p-3 rounded-2">
                        <div class="mb-2 text-primary fw-bold">List Bangunan</div>
                        <table class="table">
                            <thead>
                                <th>No</th>
                                <th>Bangunan</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Gedung Barat</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    
@endsection