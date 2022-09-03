@extends('layouts.app')

@section('title', 'Sub Bangunan')

@section('content')

    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h4>Sub Bangunan</h4>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Baru</button>
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
                          @foreach ($sub_bangunan as $sb)
                              
                          
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sb->bangunan->nama }}</td>
                                <td>{{ $sb->kode }}</td>
                                <td>{{ $sb->nama }}</td>
                                <td>{{  $sb->created_at }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal-{{$sb->id}}"><i class="bi bi-pencil-square"></i></button>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$sb->id}}"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah <span class="text-primary">Sub Bangunan</span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('sub-bangunan.store') }}" method="POST">
          @csrf

          <div class="modal-body">
            <div class="mb-3">
              <label for="kode" class="form-label">Kode</label>
              <input type="text" name="kode" class="form-control  @error('kode') is-invalid @enderror" name="kode" id="kode" value="{{ old('nama') }}" required>
              @error('kode') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control  @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}" required>
              @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
              <label for="bangunan" class="form-label">Bangunan</label>
              <select class="form-select select2 @error('bangunan_id') is-invalid @enderror" name="bangunan_id" id="bangunan_id" required>
                <option value="">Pilih Bangunan</option>
                @foreach ($bangunan as $bgn)
                  <option value="{{ $bgn->id }}" @if (old('bangunan_id') == $bgn->id)selected @endif>{{ $bgn->kode }} - {{ $bgn->nama }}</option>
                @endforeach               
              </select>
              @error('bangunan_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambahkan</button>
        </div>
      </form>
      </div>
    </div>
</div>


@foreach ($sub_bangunan as $sb)
    
  <!-- Modal Edit -->
  <div class="modal fade" id="editModal-{{$sb->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah <span class="text-primary">Sub Bangunan</span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('sub-bangunan.update') }}" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" value="{{ $sb->id }}" name="id">
          <div class="modal-body">
            <div class="mb-3">
              <label for="kode" class="form-label">Kode</label>
              <input type="text" name="kode" class="form-control  @error('kode') is-invalid @enderror" name="kode" id="kode" value="{{ old('kode', $sb->kode) }}" required>
              @error('kode') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control  @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama', $sb->nama) }}" required>
              @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
              <label for="bangunan" class="form-label">Bangunan</label>
              <select class="form-select @error('bangunan_id') is-invalid @enderror" name="bangunan_id" id="bangunan_id" required>
                <option value="">Pilih Bangunan</option>
                @foreach ($bangunan as $bgn)
                <option value="{{ $bgn->id }}" @if (old('bangunan_id', $sb->bangunan_id) == $bgn->id)selected @endif>{{ $bgn->kode }} - {{ $bgn->nama }}</option>
                @endforeach               
              </select>
              @error('bangunan_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
  </div>



  {{-- Modal Hapus Sub Bangunan --}}
  <div class="modal fade" id="deleteModal-{{$sb->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus <span class="text-danger">Sub-Bangunan</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    Apakah Anda Yakin Ingin Menghapus, <strong>{{ $sb->nama }}</strong>?
                </div>
                <div class="small">
                    <b class="text-danger"> Warning</b>: Ruangan yang terelasi dengan sub-bangunan ini akan ikut terhapus.
                </div>
            </div>
            
            <div class="modal-footer">
              <form action="{{ route('sub-bangunan.delete', $sb->id) }}" method="post">
                @method('delete')
                @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                
            </div>
        </div>
    </div>
  </div>

@endforeach


@endsection

@push('scripts')
    <script>
      $( '.select' ).select2( {
          theme: 'bootstrap-5'
      } );
    </script>
@endpush