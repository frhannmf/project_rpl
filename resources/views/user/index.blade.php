@extends('layouts.main')

@section('title', 'Dashboard - SILANI STIS')

@section('body')
<div class="container">
  <div class="my-5">
    <h2 class="text-center mb-5">Selamat Datang di web SILANI</h2>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <div class="text-center">
              <img src="/images/logo.png" alt="logo stis" class="img-fluid" width="100px">
            </div>
            <h4>Apa itu SILANI?</h4>
            <p class="mt-3">
              SILANI (Sistem Layanan Alumni) adalah sebuah web pengelolaan ijazah meliputi pengumpulan ijazah SMA, pengambilan ijazah Polstat STIS, dan pengajuan surat tidak terdaftar PDDIKTI.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection