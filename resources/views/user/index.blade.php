@extends('layouts.main')

@section('title', 'Dashboard - SILANI STIS')

@section('body')
<div class="container">
  <div class="my-5">
    <h2 class="text-center mb-5">Selamat Datang di SILANI</h2>
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="card card-body h-100">
          <div class="h-100 d-flex flex-column justify-content-between">
            <div class="text-center">
              <img src="/images/logo.png" alt="logo stis" class="img-fluid" width="100px">
            </div>
            <div>
              <h4>Apa itu SILANI?</h4>
              <p class="my-3">
                SILANI (Sistem Layanan Alumni) adalah sebuah web pengelolaan ijazah meliputi pengumpulan ijazah SMA, pengambilan ijazah SMA dan Polstat STIS, permintaan surat keterangan lulusan Polstat STIS, serta permintaan surat tidak terdaftar di PDDIKTI.
              </p>
            </div>
            <a href="{{route('logout')}}" class="btn btn-danger">Keluar</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="card card-body h-100">
          <div class="h-100 d-flex flex-column justify-content-between">
            <div class="d-flex align-items-center gap-2 mb-3">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-black" style="width: 2rem; height: 2rem;">
                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
              </svg>              
              <h2 class="m-0">Profil Akun</h2>
            </div>
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
            <div class="d-flex gap-3">
              <a href="{{route('edit_profile')}}" class="btn btn-primary flex-grow-1">Ubah Profil</a>
              <a href="{{route('change_password')}}" class="btn btn-warning flex-grow-1">Ubah Password</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <h3 class="text-center mt-5 mb-4">Layanan Silani</h3>
    @if (!$isProfileEmpty)
    <div class="row">
      <div class="col-12 col-md">
        <div class="card card-body h-100">
          <div class="d-flex flex-column justify-content-between align-items-center h-100 gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-primary" style="width: 3rem; height: 3rem;">
              <path fill-rule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z" clip-rule="evenodd" />
              <path d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
            </svg>
            <p class="fw-bold text-center">Pengumpulan Ijazah SMA</p>
            <a href="{{route('submit_sma')}}" class="btn btn-primary w-100">Ajukan</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md">
        <div class="card card-body h-100">
          <div class="d-flex flex-column justify-content-between align-items-center h-100 gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-primary" style="width: 3rem; height: 3rem;">
              <path fill-rule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z" clip-rule="evenodd" />
              <path d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
            </svg>
            <p class="fw-bold text-center">Pengambilan Ijazah SMA</p>
            <a href="{{route('retrieve_sma')}}" class="btn btn-primary w-100">Ajukan</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md">
        <div class="card card-body h-100">
          <div class="d-flex flex-column justify-content-between align-items-center h-100 gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-primary" style="width: 3rem; height: 3rem;">
              <path fill-rule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z" clip-rule="evenodd" />
              <path d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
            </svg>
            <p class="fw-bold text-center">Pengambilan Ijazah Polstat STIS</p>
            <a href="{{route('retrieve_stis')}}" class="btn btn-primary w-100">Ajukan</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md">
        <div class="card card-body h-100">
          <div class="d-flex flex-column justify-content-between align-items-center h-100 gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-primary" style="width: 3rem; height: 3rem;">
              <path fill-rule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z" clip-rule="evenodd" />
              <path d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
            </svg>
            <p class="fw-bold text-center">Permintaan SK Lulusan Polstat STIS</p>
            <a href="{{route('request_sk_alumni_stis')}}" class="btn btn-primary w-100">Ajukan</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md">
        <div class="card card-body h-100">
          <div class="d-flex flex-column justify-content-between align-items-center h-100 gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-primary" style="width: 3rem; height: 3rem;">
              <path fill-rule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z" clip-rule="evenodd" />
              <path d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
            </svg>
            <p class="fw-bold text-center">Permintaan Surat tidak terdaftar di PDDIKTI</p>
            <a href="{{route('request_surat_pddikti')}}" class="btn btn-primary w-100">Ajukan</a>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-4 d-flex justify-content-center">
      <a href="{{route('list_form')}}" class="btn btn-success btn-lg">Lihat Daftar Pengajuan</a>
    </div>
    @else
      <p class="text-center text-danger fw-bold fs-5">Lengkapi Profil untuk akses layanan</p>
    @endif
  </div>
</div>
@endsection