@extends('layouts.app')

@section('title', 'Ruangan')

@section('content')
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h4>Ruangan</h4>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Ruangan</button>
        </div>
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="section-body">
          <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Ruangan</th>
                        <th>Bangunan</th>
                        <th>Sub-Bangunan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($ruangan as $rgn)
                            
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $rgn->kode }}</td>
                            <td>{{ $rgn->nama }}</td>
                            <td>{{ $rgn->sub_bangunan->bangunan->nama }}</td>
                            <td>{{ $rgn->sub_bangunan->nama }}</td>
                            <td>
                                <a href="{{ route('ruangan.edit',$rgn->id) }}" class="btn btn-warning">Edit</a>
                                <a href="#" class="btn btn-danger">Hapus</a>
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
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('ruangan.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode" class="form-label">Kode</label>
                        <input type="text" class="form-control @error('bangunan_id') is-invalid @enderror" name="kode" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('bangunan_id') is-invalid @enderror" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="selectBangunan" class="form-label">Bangunan</label>
                        <select class="form-select @error('bangunan_id') is-invalid @enderror" name="bangunan" id="selectBangunan" required>
                            <option value="" hidden>Pilih Bangunan</option>
                            @foreach ($bangunan as $bgn)
                        <option value="{{ $bgn->id }}" @if (old('bangunan_id') == $bgn->id)selected @endif>{{ $bgn->kode }} - {{ $bgn->nama }}</option>
                        @endforeach 
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sub_bangunan" class="form-label">Sub Bangunan</label>
                        <select class="form-select" name="sub_bangunan_id" id="sub_bangunan" disabled="disabled" required></select>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
          </div>
        </div>
      </div>

        
<script>
$(document).ready(function() {
    $('#selectBangunan').on('change', function() {
           let idBangunan = $(this).val();
           let url = '{{ route("getSubBangunan", ":idBangunan") }}';
           let csrf_token = {"_token":"{{ csrf_token() }}"};
           if(idBangunan) {
            document.getElementById("sub_bangunan").disabled = false;
            url = url.replace(':idBangunan', idBangunan);
               $.ajax({
                   url: url,
                   type: "GET",
                   data : csrf_token,
                   dataType: "json",
                   success:function(data)
                   {
                     if(data){
                        $('#sub_bangunan').empty();
                        $('#sub_bangunan').append('<option value="" hidden>Pilih Sub-Bangunan</option>'); 
                        $.each(data, function(key, sub_bangunan){
                            $('select[name="sub_bangunan_id"]').append('<option value="'+ sub_bangunan.id +'">'+ sub_bangunan.nama+ '</option>');
                        });
                    }else{
                        $('#sub_bangunan').empty();
                    }
                 }
               });
           }else{
             $('#sub_bangunan').empty();
           }
         });


        //  Edit
        
    });
</script>
    
@endsection
