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
            <div class="mb-3">
              <label for="nim" class="form-label">NIM</label>
              <input type="text" class="form-control" id="nim" name="nim" required>
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