@extends('layouts.main')

@section('title', 'Detail Pengguna - SILANI STIS')

@section('body')
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="card my-5">
        <div class="card-body">
          <h2>Hapus Akun {{$user['nim']}}</h2>
          <div class="mb-4">
            <p class="mb-1">Nama</p>
            <p class="fw-bold">{{$user['name'] != null ? $user['name'] : '-'}}</p>
          </div>
          <div class="mb-4">
            <p class="mb-1">NIM</p>
            <p class="fw-bold">{{$user['nim']}}</p>
          </div>
          <div class="mb-4">
            <p class="mb-1">Email</p>
            <p class="fw-bold">{{$user['email']}}</p>
          </div>
          <form action="{{route('handle_admin_user_delete', ['id' => $user['id']])}}" method="post" class="mt-4">
            @csrf
            <div class="d-flex justify-content-between align-items-center gap-2">
              <button type="submit" class="btn btn-danger flex-grow-1">Hapus Akun</button>
              <a href="{{route('admin_user_list')}}" class="btn btn-dark flex-grow-1">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection