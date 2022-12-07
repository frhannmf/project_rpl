@extends('layouts.main')

@section('title', 'Tambah Pengguna - SILANI STIS')

@section('body')
<div class="container">
  <div class="row my-5">
    <div class="col-md-6 offset-md-3">
      <div class="card">
        <div class="card-body">
          <h3 class="mb-3">Tambah Akun Pengguna</h3>
          <form method="POST" action="{{route('handle_admin_user_create')}}">
            @csrf
            <div class="mb-4">
              <label for="nim" class="form-label">NIM</label>
              <input type="text" class="form-control" id="nim" name="nim">
            </div>
            <div class="mb-4">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <a data-bs-toggle="collapse" href="#userdetail" role="button" aria-expanded="false" aria-controls="userdetail" class="mb-3" style="display: block;">Tambahkan Detail</a>
            <div class="collapse" id="userdetail">
              <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password">
              </div>
              <div class="mb-4">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="mb-4">
                <p class="form-label">Jenis Kelamin</p>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="gendermale" value="Laki-Laki">
                  <label class="form-check-label" for="gendermale">Laki-Laki</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="genderfemale" value="Perempuan">
                  <label class="form-check-label" for="genderfemale">Perempuan</label>
                </div>
              </div>
              <div class="mb-4">
                <label for="ttl" class="form-label">Tempat Tanggal Lahir</label>
                <input type="text" class="form-control" id="ttl" name="ttl">
              </div>
              <div class="mb-4">
                <label for="prodi" class="form-label">Program Studi</label>
                <select id="prodi" name="prodi" class="form-select" aria-label="prodi">
                  <option selected>Pilih Prodi</option>
                  <option value="DIV Statistika">DIV Statistika</option>
                  <option value="DIV Komputasi Statistik">DIV Komputasi Statistik</option>
                  <option value="DIII Statistika">DIII Statistika</option>
                </select>
              </div>
              <div class="mb-4">
                <p class="form-label">Status Kelulusan</p>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="status" id="status1" value="ALUMNI">
                  <label class="form-check-label" for="status1">ALUMNI</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="status" id="status2" value="MAHASISWA">
                  <label class="form-check-label" for="status2">MAHASISWA</label>
                </div>
              </div>
              <div class="mb-4">
                <label for="tahunlulus" class="form-label">Tahun Lulus</label>
                <input type="text" class="form-control" id="tahunlulus" name="tahun_lulus">
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-center gap-2">
              <button type="submit" class="btn btn-primary flex-grow-1">Tambahkan Akun</button>
              <a href="{{route('admin_user_list')}}" class="btn btn-danger flex-grow-1">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection