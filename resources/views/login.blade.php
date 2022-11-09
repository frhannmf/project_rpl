@extends('layouts.main')

@section('body')
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="card my-5">
        <form class="card-body p-lg-5">
          <div class="text-center mb-5">
            <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid mb-2"
              width="200px" alt="logo silani">
              <h1>SILANI</h1>
          </div>
          <div class="mb-3">
            <h4>Masuk ke SILANI</h4>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" id="nim" placeholder="NIM">
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" id="password" placeholder="password">
          </div>
          <button type="submit" class="btn btn-primary px-5 mb-5 w-100">Masuk</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection