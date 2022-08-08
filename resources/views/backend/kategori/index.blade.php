@extends('layouts.app')

@section('title', 'Ruangan')

@section('content')
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h4>Kategori</h4>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Ruangan</button>
        </div>
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="section-body">
    </section>

@endsection
