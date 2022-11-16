@extends('layouts.main')

@section('title', 'Dashboard - SILANI STIS')

@section('body')
<div class="container">
  <div class="my-5">
    <h2 class="text-center mb-5">Selamat Datang di web SILANI</h2>
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="text-center">
              <img src="/images/logo.png" alt="logo stis" class="img-fluid" width="100px">
            </div>
            <h4>Apa itu SILANI?</h4>
            <p class="my-3">
              SILANI (Sistem Layanan Alumni) adalah sebuah web pengelolaan ijazah meliputi pengumpulan ijazah SMA, pengambilan ijazah Polstat STIS, dan pengajuan surat tidak terdaftar PDDIKTI.
            </p>
            <a href="{{route('logout')}}" class="btn btn-danger">Keluar</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <h2>Profil Akun</h2>
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
            <a href="{{route('edit_profile')}}" class="btn btn-primary">Ubah Profil</a>
          </div>
        </div>
      </div>
    </div>
    <h3 class="text-center my-5">Layanan Silani</h3>
    <div class="row">
      <div class="col-12 col-md">
        <div class="card">
          <div class="card-body">
            <p class="fw-bold text-center">Pengumpulan Ijazah SMA</p>
            <a href="{{route('submit_sma')}}" class="btn btn-primary w-100">Ajukan</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md">
        <div class="card">
          <div class="card-body">
            <p class="fw-bold text-center">Pengambilan Ijazah SMA</p>
            <a href="{{route('retrieve_sma')}}" class="btn btn-primary w-100">Ajukan</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md">
        <div class="card">
          <div class="card-body">
            <p class="fw-bold text-center">Pengambilan Ijazah STIS</p>
            <a href="{{route('retrieve_stis')}}" class="btn btn-primary w-100">Ajukan</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md">
        <div class="card">
          <div class="card-body">
            <p class="fw-bold text-center">Permintaan SK Alumni Polstat STIS</p>
            <a href="{{route('request_sk_alumni_stis')}}" class="btn btn-primary w-100">Ajukan</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md">
        <div class="card">
          <div class="card-body">
            <p class="fw-bold text-center">Permintaan Surat tidak terdaftar di PDDIKTI</p>
            <a href="{{route('request_surat_pddikti')}}" class="btn btn-primary w-100">Ajukan</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection