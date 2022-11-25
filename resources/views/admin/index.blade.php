@extends('layouts.main')

@section('title', 'Admin Dashboard - SILANI STIS')

@section('body')
<div class="container">
  <h2 class="text-center my-5">Selamat Datang di Admin SILANI</h2>
  <div class="row mt-5">
    <div class="col-12 col-md">
      <div class="card card-body h-100">
        <div class="d-flex flex-column justify-content-between align-items-center h-100 gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-primary" style="width: 4rem; height: 4rem;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
          </svg>          
          <div>
            <h4 class="mb-3 text-center">Manajemen Layanan</h4>
            <p>Form adalah fitur untuk melihat pengajuan layanan dari pengguna aplikasi. Admin dapat menyetujui atau menolak permintaan dari pengguna.</p>
          </div>
          <a href="{{route('admin_form_list')}}" class="btn btn-primary w-100">Buka Manajemen Layanan</a>
        </div>
      </div>
    </div>
    <div class="col-12 col-md">
      <div class="card card-body h-100">
        <div class="d-flex flex-column justify-content-between align-items-center h-100 gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-primary" style="width: 4rem; height: 4rem;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
          </svg>          
          <div>
            <h4 class="mb-3 text-center">Manajemen Pengguna</h4>
            <p>Manajemen Pengguna adalah fitur dimana Admin bisa membuat akun pengguna baru, mengubah akun pengguna, dan menghapus akun pengguna.</p>
          </div>
          <a href="{{route('admin_user_list')}}" class="btn btn-primary w-100">Buka Manajemen Pengguna</a>
        </div>
      </div>
    </div>
    <div class="col-12 col-md">
      <div class="card card-body h-100">
        <div class="d-flex flex-column justify-content-between align-items-center h-100 gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-primary" style="width: 4rem; height: 4rem;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
          </svg>          
          <div>
            <h4 class="mb-3 text-center">Manajemen Lupa Identitas</h4>
            <p>Fitur untuk mereset password dan NIM akun yang lupa password atau NIM nya</p>
          </div>
          <a href="{{route('forgot_list')}}" class="btn btn-primary w-100">Buka Manajemen Lupa Identitas</a>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex mt-3 justify-content-center align-items-center">
    <div class="card card-body" style="width: min-content;">
      <div class="d-flex flex-column justify-content-between align-items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-primary" style="width: 4rem; height: 4rem;">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>          
        <h4 class="mb-3 text-center">Setting Admin</h4>
        <div class="d-flex gap-2">
          <a href="{{route('logout')}}" class="btn btn-danger flex-grow-1">Keluar</a>
          <a href="{{route('change_password')}}" class="btn btn-warning flex-grow-1">Ubah Password</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection