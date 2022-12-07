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
            <div class="mb-4">
              <label for="keperluan" class="form-label">Keperluan pembuatan surat</label>
              <input type="text" class="form-control" id="keperluan" name="keperluan" required>
            </div>
            <div class="mb-4">
              <label for="tanggal" class="form-label">Tanggal Pengambilan</label>
              <input type="text" class="form-control datepicker" id="tanggal" name="tanggal" required>
            </div>
            <div class="d-flex justify-content-between align-items-center gap-2">
              <button type="submit" class="btn btn-primary flex-grow-1">Buat Jadwal Pengambilan</button>
              <a href="{{route('user_dashboard')}}" class="btn btn-dark flex-grow-1">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection