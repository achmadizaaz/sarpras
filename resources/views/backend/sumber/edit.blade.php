@extends('layouts.app')

@section('title', 'Edit Sumber: '.$sumber->nama)

@section('content')

<section class="section">
    <div class="section-header">
        <h3>Edit Sumber <span class="text-primary">{{ $sumber->nama }}</span></h3>
    </div>
    <div class="section-body">
    
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header fw-bold">Form Edit Sumber</div>
                    <div class="card-body">
                        <form action="{{ route('sumber.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $sumber->id }}">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Sumber</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $sumber->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10" style="min-height:100px ">{{ old('keterangan', $sumber->keterangan) }}</textarea>
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