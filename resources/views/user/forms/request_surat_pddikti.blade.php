@extends('layouts.main')

@section('title', 'Form Permintaan Surat Tidak Terdaftar di PDDIKTI - SILANI STIS')

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
          <h3 class="mb-3 text-center">Form Permintaan Surat Tidak Terdaftar di PDDIKTI</h3>
          <form method="POST" action="{{route('handle_request_surat_pddikti')}}">
            @csrf
            <input type="hidden" name="user_id" value="{{$user_id}}">
            <div class="mb-3">
              <label for="ttl" class="form-label">Tempat, Tanggal Lahir</label>
              <input type="text" class="form-control" id="ttl" name="ttl">
            </div>
            <div class="mb-3">
              <label for="tanggal" class="form-label">Tanggal Pengambilan</label>
              <input type="text" class="form-control datepicker" id="tanggal" name="tanggal">
            </div>
            <button type="submit" class="btn btn-primary">Buat Jadwal Pengambilan</button>
            <a href="{{route('user_dashboard')}}" class="btn btn-dark">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection