@extends('layouts.main')

@section('title', 'Ubah Password - SILANI STIS')

@section('script')
<script src="{{asset('js/toggle_password.js')}}"></script>
@endsection

@section('body')
<div class="container">
  <div class="row my-5">
    <div class="col-md-6 offset-md-3">
      <div class="card">
        <div class="card-body">
          <h3 class="mb-5">Ubah Password</h3>
          <form method="POST" action="{{route('handle_change_password', ['id' => $user['id']])}}">
            @csrf
            <div class="mb-4">
              <label for="new_password" class="form-label">Password Baru</label>
              <input type="password" class="form-control password-input" id="new_password" name="new_password">
            </div>
            <div class="mb-4">
              <label for="password" class="form-label">Password Saat Ini</label>
              <input type="password" class="form-control password-input" id="password" name="password">
            </div>
            <div class="mb-5">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="toggle-password">
                <label class="form-check-label" for="toggle-password">
                  Tampilkan Password
                </label>
              </div>
            </div>
            @if ($errors->first('password'))
              <div class="alert alert-danger text-sm" role="alert">
                {{$errors->first('password')}}
              </div>
            @endif
            <div class="d-flex justify-content-between align-items-center gap-2">
              <button type="submit" class="btn btn-primary flex-grow-1">Ubah Password</button>
              <a href="{{$user['role']=='USER'?route('user_dashboard'):route('admin_dashboard')}}" class="btn btn-dark flex-grow-1">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection