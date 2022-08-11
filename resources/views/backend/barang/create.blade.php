@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')

<section class="section">
    

    <div class="section-header">
        <h3>Create <span class="text-primary">Barang</span></h3>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header fw-bold">Form Tambah Barang</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <label for="kode" class="form-label">Image</label>
                        <input type="file" class="form-control">
                    </div>
                    <div class="col">
                        <label for="kode" class="form-label">Kode</label>
                        <input type="text" class="form-control" placeholder="Masukan kode barang">
                    </div>
                    <div class="col">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" placeholder="Nama barang">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="merk" class="form-label">Merk</label>
                        <input type="text" class="form-control" placeholder="Masukan merk barang">
                    </div>
                    <div class="col">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" placeholder="Jumlah barang">
                    </div>
                    <div class="col">
                        <label for="total" class="form-label">Total Harga</label>
                        <input type="number" name="total" class="form-control" placeholder="Total harga barang">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" class="form-select">
                            <option value="0">Pilih kategori barang</option>
                            <option value="1">Elektronik</option>
                            <option value="2">Furniture</option>
                            <option value="3">Plastik</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="sumber" class="form-label">Sumber Dana</label>
                        <select name="sumber" class="form-select" id="single-select-field" data-placeholder="Choose one thing">
                            <option value="0">Pilih sumber dana</option>
                            <option value="1">Universitas</option>
                            <option value="2">BOS</option>
                            <option value="3">Hibah</option>
                        </select>
                    </div>
                    
                </div>
                <button class="btn btn-primary">Tambahkan</button>
            </div>
        </div>          
    </div>


</section>
    
@endsection

@push('scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $( '#single-select-optgroup-field' ).select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
} );
        </script>

@endpush