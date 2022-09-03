@extends('layouts.app')

@section('title', 'Tambah Bangunan Baru')

@section('content')
    <section class="section">
        <div class="section-header">
            <h4>Edit <span class="text-primary">{{ $bangunan->nama }}</span></h4>
        </div>
        <div class="section-body">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-6 col-md-12">
                    <form action="{{ route('bangunan.update') }}" method="POST" class="bg-white p-3 rounded-2">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $bangunan->id }}">
                        <div class="mb-3">
                            <label for="kode" class="form-label fw-bold ">Kode</label>
                            <input type="text" class="form-control @error('kode') is-invalid @enderror " name="kode" placeholder="Masukkan kode bangunan" value="{{ old('kode', $bangunan->kode) }}">
                            @error('kode')
                               <span class="small text-danger">  {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-bold ">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan nama bangunan" value="{{ old('nama', $bangunan->nama) }}">
                            @error('nama')
                                <span class="small text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
@endsection