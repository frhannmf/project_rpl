@extends('layouts.main')

@section('title', 'List Form - SILANI STIS')

@section('body')
<div class="container">
  <div class="my-5">
    <h1>Daftar Pengajuan</h1>
    <a href="{{route('user_dashboard')}}" class="btn btn-primary mt-3 mb-5">< Kembali ke Halaman Utama</a>
    <div>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Jenis Layanan</th>
            <th>Tanggal Pengambilan</th>
            <th>Status</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($forms as $form)
            <tr>
              <td>{{$form['type']=='submitsma'?'Pengumpulan Ijazah SMA':($form['type']=='retrievesma'?'Pengambilan Ijazah SMA':($form['type']=='retrievestis'?'Pengambilan Ijazah STIS':($form['type']=='requestskalumnistis'?'Permintaan Surat Keterangan Alumni Polstat STIS':'Permintaan Surat Tidak Terdaftar di PDDIKTI')))}}</td>
              <td>{{date('d F Y', strtotime($form['tanggal']))}}</td>
              <td>
                <div class="badge {{$form['approve'] == 'Diterima'?'text-bg-primary':($form['approve']=='Ditolak'?'text-bg-danger':($form['approve'] == 'Diserahkan'?'text-bg-success':'text-bg-warning'))}}">
                  {{$form['approve']!=null?$form['approve']:'Diproses'}}
                </div>
              </td>
              <td>{{$form['approve']=='Diterima'?'Silahkan ke kampus pada tanggal yang telah ditentukan':($form['approve']=='Diserahkan'?'Dokumen telah diserahkan':$form['reason'])}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection