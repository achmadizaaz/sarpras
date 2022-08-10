@extends('layouts.app')

@section('title', 'Edit Kategori: '.$kategori->nama)

@section('content')

<section class="section">
    <div class="section-header">
        <h3>Edit Kategori <span class="text-primary">{{ $kategori->nama }}</span></h3>
    </div>
    <div class="section-body">
    
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header fw-bold">Form Edit Kategori</div>
                    <div class="card-body">
                        <form action="{{ route('kategori.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $kategori->id }}">
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $kategori->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10" style="min-height:100px ">{{ old('keterangan', $kategori->keterangan) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary">Perbarui</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>


</section>
    
@endsection