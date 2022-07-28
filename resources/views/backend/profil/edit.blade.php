@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header rounded-2">
            <h1>Edit Profil</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $profil->id }}">
                                <input type="hidden" name="imageLama" value="{{ $profil->image }}">
                                <div class="mb-3">
                                <div class="input-group d-flex">
                                    <div class="me-3">
                                        @if ($profil->image)
                                        <img alt="image" src="{{ asset('storage/'.$profil->image) }}" class="border border-light rounded-circle pr-3" style="width: 80px;height:80px">
                                        @else
                                            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="border border-light rounded-circle pr-3" style="width: 80px;height:80px">
                                        @endif
                                       
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror " id="nama" name="nama" value="{{ old('nama', $profil->nama) }}" autocomplete="off">
                                    @error('nama')
                                    <div class="small text-danger ">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="telepon" class="form-label">Telepon</label>
                                    <div class="input-group ">
                                        <span class="input-group-text">+62</span>
                                        <input type="text" class="form-control  @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ old('telepon', $profil->telepon) }}" autocomplete="off">
                                    </div>
                                    @error('telepon')
                                        <div class="small text-danger ">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" style="height: 100px">{{ old('alamat', $profil->alamat) }}</textarea>
                                </div>
                                <button class="btn btn-primary">Update</button>
                            </form>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
@endsection