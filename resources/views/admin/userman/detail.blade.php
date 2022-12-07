@extends('layouts.main')

@section('title', 'Detail Pengguna - SILANI STIS')

@section('body')
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="card my-5">
        <div class="card-body">
          <h2>Detail Akun</h2>
          <div class="row">
            <div class="col-12 col-md-6">
              <p class="mb-1">Nama</p>
              <p class="fw-bold">{{$user['name']}}</p>
            </div>
            <div class="col-12 col-md-6">
              <p class="mb-1">NIM</p>
              <p class="fw-bold">{{$user['nim']}}</p>
            </div>
            <div class="col-12 col-md-6">
              <p class="mb-1">Email</p>
              <p class="fw-bold">{{$user['email']}}</p>
            </div>
            <div class="col-12 col-md-6">
              <p class="mb-1">Jenis Kelamin</p>
              <p class="fw-bold">{{$user['gender']}}</p>
            </div>
            <div class="col-12 col-md-6">
              <p class="mb-1">Tempat Tanggal Lahir</p>
              <p class="fw-bold">{{$user['ttl']}}</p>
            </div>
            <div class="col-12 col-md-6">
              <p class="mb-1">Program Studi</p>
              <p class="fw-bold">{{$user['prodi']}}</p>
            </div>
            <div class="col-12 col-md-6">
              <p class="mb-1">Status Kelulusan</p>
              <p class="fw-bold">{{$user['status']}}</p>
            </div>
            <div class="col-12 col-md-6">
              <p class="mb-1">Tahun Lulus</p>
              <p class="fw-bold">{{$user['tahun_lulus']}}</p>
            </div>
          </div>
          <div class="d-flex justify-content-between align-items-center gap-2">
            <a href="{{route('admin_user_delete', ['id' => $user['id']])}}" class="btn btn-danger flex-grow-1">Hapus</a>
            <a href="{{route('admin_user_update', ['id' => $user['id']])}}" class="btn btn-primary flex-grow-1">Ubah</a>
            <a href="{{route('admin_user_list')}}" class="btn btn-dark flex-grow-1">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection