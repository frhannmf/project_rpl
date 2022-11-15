@extends('layouts.main')

@section('title', 'Form Pengambilan Ijazah SMA - SILANI STIS')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="{{asset('js/datepicker.js')}}"></script>
@endsection

@section('body')
<div class="container">
  <div class="row my-5">
    <div class="col-md-6 offset-md-3">
      <div class="card">
        <div class="card-body">
          <h3 class="mb-3">Form Pengambilan Ijazah SMA</h3>          
          <form method="POST" action="{{route('handle_retrieve_sma')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{$user_id}}">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Lengkap Sesuai Ijazah</label>
              <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
              <label for="nomor" class="form-label">Nomor Ijazah</label>
              <input type="text" class="form-control" id="nomor" name="nomor">
            </div>
            <div class="mb-3">
              <label for="tanggal" class="form-label">Tanggal Pengambilan</label>
              <input type="text" class="form-control datepicker" id="tanggal" name="tanggal">
            </div>
            <div class="mb-3">
              <p class="form-label">Pengambil Ijazah</p>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="diwakilkan" id="pengumpulsendiri" value="false" checked>
                <label class="form-check-label" for="pengumpulsendiri">Diri Sendiri</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="diwakilkan" id="pengumpuldiwakilkan" value="true">
                <label class="form-check-label" for="pengumpuldiwakilkan">Diwakilkan</label>
              </div>
            </div>
            <div class="mb-3">
              <label for="surat_kuasa" class="form-label">Surat Kuasa (jika diwakilkan)</label>
              <input class="form-control" type="file" id="surat_kuasa" name="surat_kuasa">
            </div>
            <button type="submit" class="btn btn-primary">Buat Jadwal Pengambilan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection