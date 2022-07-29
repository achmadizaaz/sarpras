@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header rounded-2">
            <h1>Profil</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('profil.edit') }}" class="btn btn-warning">Edit</a>
                        </div>
                        <div class="card-body">
                                                
                          <table class="table">
                            <thead>
                                <th>Image</th>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Role</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        @if (Auth::user()->profil->image)
                                        <img alt="image" src="{{ asset('storage/'. Auth::user()->profil->image) }}" class="rounded-circle mr-1 " style="width: 30px;height:30px">
                                       @else
                                       <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="border border-light rounded-circle pr-3" style="width: 30px;height:30px">
                                       @endif
                                    </td>
                                    <td>{{ $profil->nama }}</td>
                                    <td>{{ $profil->telepon }}</td>
                                    <td>{{ $profil->user->email }}</td>
                                    <td> {{ $profil->alamat }}</td>
                                    <td>
                                        @if (Auth::user()->role_id == 1)
                                        <span class="badge bg-danger">Admin</span>
                                        @else
                                        <span class="badge bg-warning">User</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
@endsection