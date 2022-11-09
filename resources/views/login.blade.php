@extends('layouts.main')

@section('body')
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="card my-5">
        <form method="POST" action="{{ route('handle_login') }}" class="card-body p-lg-5">
          @csrf
          <div class="text-center mb-5">
            <img src="/images/logo.png" class="img-fluid mb-2"
              width="150px" alt="logo silani">
              <h1>SILANI STIS</h1>
          </div>
          <div class="mb-3">
            <h4>Masuk ke SILANI</h4>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM" required>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="true" id="remember_me" name="remember_me">
            <label class="form-check-label" for="remember_me">
              Ingat saya?
            </label>
          </div>
          @if ($errors->first('not_match'))
            <div class="alert alert-danger text-sm" role="alert">
              {{$errors->first('not_match')}}
            </div>
          @endif
          <button type="submit" class="btn btn-primary px-5 mb-5 w-100">Masuk</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection