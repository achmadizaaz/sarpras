@extends('layouts.app')

@section('title', 'Edit Ruangan')
    
@section('content')
    <section class="section">
        <div class="section-header">
            <h4>Edit Ruangan</h4>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('ruangan.update') }}" method="post">
                                @csrf
                                @method('put')
                                <input type="hidden" name="id" value="{{ $ruangan->id }}">
                                <div class="mb-3">
                                    <label for="kode" class="form-label">Kode</label>
                                    <input type="text" class="form-control" name="kode" value="{{ $ruangan->kode }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $ruangan->nama }}">
                                </div>
                                <div class="mb-3">
                                    <label for="selectBangunan" class="form-label">Bangunan</label>
                                    <select class="form-select @error('bangunan_id') is-invalid @enderror" name="bangunan" id="selectBangunan" required>
                                        <option value="" hidden>Pilih Bangunan</option>
                                        @foreach ($bangunan as $bgn)
                                    <option value="{{ $bgn->id }}" @if (old('bangunan_id',$ruangan->sub_bangunan->bangunan_id) == $bgn->id)selected @endif>{{ $bgn->kode }} - {{ $bgn->nama }}</option>
                                    @endforeach 
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="sub_bangunan" class="form-label">Sub Bangunan</label>
                                    <select class="form-select" name="sub_bangunan_id" id="sub_bangunan" required>
                                        @foreach ($sub_bangunan as $sb)
                                        <option value="{{ $sb->id }}" @if (old('sub_bangunan_id',$ruangan->sub_bangunan->id) == $sb->id)selected @endif> {{ $sb->nama }}</option>
                                        @endforeach
                                 
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>


    </section>    



    <script>
        $(document).ready(function() {
            $('#selectBangunan').on('change', function() {
                   let idBangunan = $(this).val();
                   let url = '{{ route("getSubBangunan", ":idBangunan") }}';
                   let csrf_token = {"_token":"{{ csrf_token() }}"};
                   document.getElementById("sub_bangunan").disabled = false;
                    url = url.replace(':idBangunan', idBangunan);
                   if(idBangunan) {
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
            });
        </script>
        
@endsection