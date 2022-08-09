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
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $ktg)                            
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ktg->nama }}</td>
                                <td>{{ $ktg->keterangan }}</td>
                                <td>
                                    <a href="#" class="btn btn-warning">Edit</a>
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

@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
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
