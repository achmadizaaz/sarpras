@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')

<section class="section">
    <div class="section-header">
        <h3>Create <span class="text-primary">Kategori</span></h3>
    </div>
    <div class="section-body">
    
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header fw-bold">Form Tambah Kategori</div>
                    <div class="card-body">
                        <form action="{{ route('kategori.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10" style="min-height:100px ">{{ old('keterangan') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary">Tambahkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>


</section>
    
@endsection