@extends('layouts.app')

@section('title', 'Ruangan')

@section('content')
    <section class="section">
        <div class="section-header">
            <h4>Ruangan</h4>
        </div>

        <div class="section-body">
            <div class="mb-3">
                <select class="form-select" name="bangunan" id="selectBarang">
                    <option hidden>Choose Category</option>
                    @foreach ($bangunan as $bgn)
                  <option value="{{ $bgn->id }}" @if (old('bangunan_id') == $bgn->id)selected @endif>{{ $bgn->kode }} - {{ $bgn->nama }}</option>
                @endforeach 
                </select>
            </div>
            <div class="mb-3">
                <label for="sub_bangunan" class="form-label">sub_bangunan</label>
                <select class="form-control" name="sub_bangunan" id="sub_bangunan" ></select>
            </div>


        </div>


    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        
<script>
$(document).ready(function() {
    $('#selectBarang').on('change', function() {
           const categoryID = $(this).val();
           if(categoryID) {
               $.ajax({
                   url: 'dashboard/bangunan/sub-bangunan/'+categoryID,
                   type: "GET",
                   data : {"_token":"{{ csrf_token() }}"},
                   dataType: "json",
                   success:function(data)
                   {
                     if(data){
                        $('#sub_bangunan').empty();
                        $('#sub_bangunan').append('<option hidden>Choose Course</option>'); 
                        $.each(data, function(key, sub_bangunan){
                            $('select[name="sub_bangunan"]').append('<option value="'+ key +'">' + sub_bangunan.nama+ '</option>');
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
