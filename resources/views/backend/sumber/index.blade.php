@extends('layouts.app')

@section('title', 'Sumber Dana')

@section('content')
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h4>Sumber</h4>
            <a href="{{ route('sumber.create') }}" class="btn btn-primary">Tambah Sumber</a>
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
                    <table class="table align-middle border " id="example">
                        <thead class="bg-primary ">
                            <th class="text-white">No</th>
                            <th class="text-white">Nama</th>
                            <th class="text-white">Keterangan</th>
                            <th class="text-white">Dibuat</th>
                            <th class="text-white">Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($sumber as $sbr)
                            </tr>
                                <td>{{ $loop->iteration }}</td>            
                                <td>{{ $sbr->nama }}</td>            
                                <td>{{ $sbr->keterangan }}</td>            
                                <td>{{ $sbr->created_at }}</td>            
                                <td>
                                    <a href="{{ route('sumber.edit', $sbr->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    <button type="button" class="btn btn-danger remove" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{$sbr->id}}" data-nama="{{ $sbr->nama }}" ><i class="bi bi-trash"></i></button>
                                  
                                </td>            
                            </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </section>

{{-- MODAL --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus <span class="text-danger">Sumber</span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('sumber.delete') }}" method="post">
            @csrf
            <input id="idHapus" name="id" type="hidden">
        <div class="modal-body text-center">
            <i class="bi bi-exclamation-circle text-danger" style="font-size:64px"></i>
            <div class="text-center">Apakah anda yakin ingin menghapus sumber, <span id="remove-sumber-nama" class="fw-bold text-danger"></span>?</div>
        </div>
        <div class="modal-footer">
           
            <button type="submit" class="btn btn-danger">Delete</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
         </form>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
  
    // Delete kategori
    $(document).on('click', '.remove', function(){
      let sumber_id = $(this).attr('data-id');
      let nama_sumber = $(this).attr('data-nama');
      console.log(nama_sumber);
      $('#idHapus').val(sumber_id);
      $('#remove-sumber-nama').text(nama_sumber);

    }); 


    // DataTables
    $(document).ready(function() {
      var t = $('#example').DataTable({
        "columnDefs": [{
          "searchable": false,
          "orderable": false,
          "targets": 0
        }],
        "order": [
          [1, 'desc']
        ]
      });
      t.on('order.dt search.dt', function() {
        let i = 1;
        t.cells(null, 0, {
          search: 'applied',
          order: 'applied'
        }).every(function(cell) {
          this.data(i++);
        });
      }).draw();
    });
  </script>
@endpush
