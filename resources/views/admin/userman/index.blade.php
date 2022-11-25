@extends('layouts.main')

@section('title', 'Daftar Pengguna - SILANI STIS')

@section('body')
<div class="container">
  <h2 class="mt-5 mb-3">Daftar Semua Pengguna SILANI STIS</h2>
  <div class="d-flex gap-3">
    <a href="{{route('admin_user_create')}}" class="btn btn-primary">Tambah Pengguna</a>
    <a href="{{route('admin_dashboard')}}" class="btn btn-dark">Kembali</a>
  </div>
  <div class="mt-3">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>NIM</th>
          <th>Nama</th>
          <th>Program Studi</th>
          <th>Status</th>
          <th>Tahun Lulus</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{$user['nim']}}</td>
          <td>{{$user['name']}}</td>
          <td>{{$user['prodi']}}</td>
          <td>{{$user['status']}}</td>
          <td>{{$user['tahun_lulus']}}</td>
          <td>
            <div class="row">
              <div class="col">
                <a href="{{route('admin_user_detail', ['id' => $user['id']])}}" class="btn btn-success btn-sm w-100">Detail</a>
              </div>
              <div class="col">
                <a href="{{route('admin_user_update', ['id' => $user['id']])}}" class="btn btn-warning btn-sm w-100">Ubah</a>
              </div>
              <div class="col">
                <a href="{{route('admin_user_delete', ['id' => $user['id']])}}" class="btn btn-danger btn-sm w-100">Hapus</a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection