@extends('layouts.main')

@section('title', 'Lupa NIM - SILANI STIS')

@section('body')
<div class="container">
  <div class="row my-5">
    <div class="col-md-6 offset-md-3">
      <div class="card">
        <div class="card-body">
          <h3 class="mb-3 text-center">Lupa NIM</h3>
          <form method="POST" action="{{route('handle_lupa_nim')}}">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
              <p class="form-label">Jenis Kelamin</p>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gendermale" value="Laki-Laki" required>
                <label class="form-check-label" for="gendermale">Laki-Laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="genderfemale" value="Perempuan">
                <label class="form-check-label" for="genderfemale">Perempuan</label>
              </div>
            </div>
            <div class="mb-3">
              <label for="prodi" class="form-label">Program Studi</label>
              <select id="prodi" name="prodi" class="form-select" aria-label="prodi" required>
                <option>Pilih Prodi</option>
                <option value="DIV Statistika">DIV Statistika</option>
                <option value="DIV Komputasi Statistik">DIV Komputasi Statistik</option>
                <option value="DIII Statistika">DIII Statistika</option>
              </select>
            </div>
            <div class="mb-3">
              <p class="form-label">Status Kelulusan</p>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="status1" value="ALUMNI" required>
                <label class="form-check-label" for="status1">ALUMNI</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="status2" value="MAHASISWA">
                <label class="form-check-label" for="status2">MAHASISWA</label>
              </div>
            </div>
            <div class="mb-3">
              <label for="tahunlulus" class="form-label">Tahun Lulus</label>
              <input type="text" class="form-control" id="tahunlulus" name="tahun_lulus" required>
            </div>
            <div class="mb-3">
              <label for="wa" class="form-label">Nomor Whatsapp yang bisa dihubungi</label>
              <input type="text" class="form-control" id="wa" name="wa" required>
              <p class="mt-1 text-primary" style="font-size: 0.9rem">Admin akan menghubungi melalui nomor ini</p>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
            <a href="{{route('login')}}" class="btn btn-dark">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection