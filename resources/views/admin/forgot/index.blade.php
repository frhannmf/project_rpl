@extends('layouts.main')

@section('title', 'Daftar Pengguna Lupa Identitas - SILANI STIS')

@section('body')
<div class="container">
  <h2 class="mt-5 mb-3">Daftar Pengguna Lupa Identitas</h2>
  <a href="{{route('admin_dashboard')}}" class="btn btn-dark">Kembali</a>
  <div class="mt-3">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>NIM</th>
          <th>Email</th>
          <th>Tipe Identitas</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($resets as $reset)
        <tr>
          <td>{{$reset['nim']?$reset['nim']:'-'}}</td>
          <td>{{$reset['email']}}</td>
          <td>
            <div class="badge {{$reset['type']=='nim'?'text-bg-success':'text-bg-primary'}}">
              {{$reset['type']=='nim'?'NIM':'Password'}}
            </div>
          </td>
          <td>
            <div class="badge {{$reset['selesai']?'text-bg-success':'text-bg-warning'}}">
              {{$reset['selesai']?'Selesai':'Perlu Diproses'}}
            </div>
          </td>
          <td>
            @if ($reset['type']=='nim')
              <a href="{{route('forgot_nim_detail', ['id' => $reset['id']])}}" class="btn btn-primary btn-sm">Detail</a>
            @else
              <form method="POST" action="{{route('handle_admin_reset_user', ['id' => $reset['id']])}}">
                @csrf
                <input type="hidden" name="nim" value="{{$reset['nim']}}">
                <button type="submit" class="btn btn-primary btn-sm">Reset</button>
              </form>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection