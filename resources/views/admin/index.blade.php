@extends('layouts.main')

@section('title', 'Admin Dashboard - SILANI STIS')

@section('body')
<div class="container">
  <h2 class="text-center my-5">Selamat Datang di Admin SILANI STIS</h2>
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4 class="mb-3">Form</h4>
          <p>Form adalah fitur untuk melihat pengajuan layanan dari pengguna aplikasi. Admin dapat menyetujui atau menolak permintaan dari pengguna.</p>
          <a href="#" class="btn btn-primary">Buka Form</a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4 class="mb-3">Manajemen Pengguna</h4>
          <p>Manajemen Pengguna adalah fitur dimana Admin bisa membuat akun pengguna baru, mengubah akun pengguna, dan menghapus akun pengguna.</p>
          <a href="{{route('admin_user_list')}}" class="btn btn-primary">Buka Manajemen Pengguna</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection