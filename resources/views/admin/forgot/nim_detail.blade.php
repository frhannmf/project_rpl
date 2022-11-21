@extends('layouts.main')

@section('title', 'Daftar Pengguna Lupa Identitas - SILANI STIS')

@section('body')
<div class="container">
  <h2 class="mt-5 mb-3">Daftar Pengguna Lupa Identitas</h2>
  <a href="{{route('forgot_list')}}" class="btn btn-dark">Kembali</a>
  <div class="card mt-3">
    <div class="card-body">
      <h2>Identitas Akun</h2>
      <div class="row">
        <div class="col-12 col-md-6">
          <p class="mb-1">Nama</p>
          <p class="fw-bold">{{$reset['name']}}</p>
        </div>
        <div class="col-12 col-md-6">
          <p class="mb-1">Jenis Kelamin</p>
          <p class="fw-bold">{{$reset['gender']}}</p>
        </div>
        <div class="col-12 col-md-6">
          <p class="mb-1">Program Studi</p>
          <p class="fw-bold">{{$reset['prodi']}}</p>
        </div>
        <div class="col-12 col-md-6">
          <p class="mb-1">Status Kelulusan</p>
          <p class="fw-bold">{{$reset['status']}}</p>
        </div>
        <div class="col-12 col-md-6">
          <p class="mb-1">Tahun Lulus</p>
          <p class="fw-bold">{{$reset['tahun_lulus']}}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="mt-5">
    <h4 class="mb-2">Daftar akun dengan identitas yang hampir sama</h4>
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
            <form method="POST" action="{{route('handle_admin_reset_user', ['id' => $reset['id']])}}">
              @csrf
              <input type="hidden" name="nim" value="{{$user['nim']}}">
              <button type="submit" class="btn btn-primary btn-sm">Reset</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection