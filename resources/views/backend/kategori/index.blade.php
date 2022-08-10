@extends('layouts.app')

@section('title', 'Ruangan')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"/>
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h4>Kategori</h4>
            <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Ruangan</a>
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
                    <table class="table" id="example">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $ktg)                            
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ktg->nama }}</td>
                                <td>{{ $ktg->keterangan }}</td>
                                <td>{{ $ktg->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('kategori.edit', $ktg->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    <button type="button" class="btn btn-danger remove" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{$ktg->id}}" data-nama="{{ $ktg->nama }}" ><i class="bi bi-trash"></i></button>
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
            <h5 class="modal-title" id="exampleModalLabel">Hapus <span class="text-danger">Kategori</span></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('kategori.delete') }}" method="post">
              @csrf
              <input id="idHapus" name="id" type="hidden">
          <div class="modal-body text-center">
              <i class="bi bi-exclamation-circle text-danger" style="font-size:64px"></i>
              <div class="text-center">Apakah anda yakin ingin menghapus kategori, <span id="remove-kategori-nama" class="fw-bold text-danger"></span>?</div>
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
      let kategori_id = $(this).attr('data-id');
      let nama_kategori = $(this).attr('data-nama');
      console.log(nama_kategori);
      $('#idHapus').val(kategori_id);
      $('#remove-kategori-nama').text(nama_kategori);

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
