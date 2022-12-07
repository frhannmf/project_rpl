@extends('layouts.main')

@section('title', 'Lupa Password - SILANI STIS')

@section('body')
<div class="container">
  <div class="row my-5">
    <div class="col-md-6 offset-md-3">
      <div class="card">
        <div class="card-body">
          <h3 class="mb-3 text-center">Lupa Password</h3>
          <form method="POST" action="{{route('handle_lupa_password')}}">
            @csrf
            <div class="mb-4">
              <label for="nim" class="form-label">NIM</label>
              <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="mb-4">
              <label for="email" class="form-label">Email yang bisa dihubungi</label>
              <input type="text" class="form-control" id="email" name="email" required>
              <p class="mt-2 text-danger fw-bold text-center" style="font-size: 0.9rem">Admin akan menghubungi melalui Email</p>
            </div>
            <div class="d-flex justify-content-between align-items-center gap-2">
              <button type="submit" class="btn btn-primary flex-grow-1">Kirim</button>
              <a href="{{route('login')}}" class="btn btn-dark flex-grow-1">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection