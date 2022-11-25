@extends('layouts.main')

@section('title', 'Daftar Pengajuan Layanan Pengguna - SILANI STIS')

@section('body')
<div class="container">
  <h2 class="mt-5 mb-3">Daftar Pengajuan Layanan Pengguna</h2>
  <div class="d-flex gap-2">
    @if (!request()->has('today'))
    <a href="{{route('admin_form_list', ['today' => '1'])}}" class="btn btn-success">Pengajuan Hari Ini</a>
    @endif
    <a href="{{request()->has('today')?route('admin_form_list'):route('admin_dashboard')}}" class="btn btn-dark">Kembali</a>
  </div>
  <div class="mt-3">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Jenis Layanan</th>
          <th>Tanggal Pengambilan</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($forms as $form)
        <tr>
          <td>{{$form['user']['name']}}</td>
          <td>{{$form['type']=='submitsma'?'Pengumpulan Ijazah SMA':($form['type']=='retrievesma'?'Pengambilan Ijazah SMA':($form['type']=='retrievestis'?'Pengambilan Ijazah STIS':($form['type']=='requestskalumnistis'?'Permintaan Surat Keterangan Alumni Polstat STIS':'Permintaan Surat Tidak Terdaftar di PDDIKTI')))}}</td>
          <td>{{date('d F Y', strtotime($form['tanggal']))}}</td>
          <td>
            <div class="badge {{$form['approve'] == 'Diterima'?'text-bg-primary':($form['approve']=='Ditolak'?'text-bg-danger':($form['approve'] == 'Diserahkan'?'text-bg-success':'text-bg-warning'))}}">
              {{$form['approve']!=null?$form['approve']:'Perlu Diproses'}}
            </div>
          </td>
          <td>
            <a href="{{request()->has('today')?route('admin_form_detail', ['id' => $form['id'], 'today' => '1']):route('admin_form_detail', ['id' => $form['id']])}}" class="btn btn-success btn-sm">Detail</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection