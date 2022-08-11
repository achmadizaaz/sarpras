@extends('layouts.app')

@section('title', 'Barang')

@section('content')
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h4>Barang</h4>
            <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Barang</a>
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
                    
                    <table class="table align-middle border display nowrap" style="width:100%" id="example">
                        <thead class="bg-primary ">
                            <th class="text-white">No</th>
                            <th class="text-white">Kode</th>
                            <th class="text-white">Nama</th>
                            <th class="text-white">Merk</th>
                            <th class="text-white">Jumlah</th>
                            <th class="text-white">Total</th>
                            <th class="text-white">Dibuat</th>
                            <th class="text-white">Kondisi</th>
                            <th class="text-white">Aksi</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>123.456.7</td>
                                <td>Laptop</td>
                                <td>Asus N441XA</td>
                                <td>10</td>
                                <td>5.500.000</td>
                                <td>24 Agustus 2017</td>
                                <td>
                                    <div class="dropdown">
                                    <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                        Klik Disini
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <div class="dropdown-title">Kondisi Barang</div>
                                        <li class="text-center mb-2"> 
                                            <button type="button" class="btn btn-sm btn-success btn-icon icon-left">
                                                <i class="bi bi-hand-thumbs-up"></i> Baik <span class="badge badge-transparent">4</span>
                                            </button>
                                        </li>
                                        <li class="text-center mb-2"> 
                                            <button type="button" class="btn btn-sm btn-danger btn-icon icon-left">
                                                <i class="bi bi-hand-thumbs-up"></i> Rusak <span class="badge badge-transparent">10</span>
                                            </button>
                                        </li>
                                      </ul>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </section>


@endsection

@push('scripts')

<script type="text/javascript">
  

    // DataTables
    $(document).ready(function() {
        
      var t = $('#example').DataTable({
        
        "columnDefs": [{
          "scrollX": true,
          "searchable": false,
          "orderable": false,
          "targets": 0
        }],
        "order": [
          [1, 'asc']
        ]
      });
      t.on('order.dt search.dt', function() {
        let i = 1;
        t.cells(null, 0, {
          search: 'applied',
          order: 'applied',
          scrollX: true,
        }).every(function(cell) {
          this.data(i++);
        });
      }).draw();
    });
  </script>
@endpush
