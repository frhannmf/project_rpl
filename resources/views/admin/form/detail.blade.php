@extends('layouts.main')

@section('title', 'Detail Pengajuan Layanan - SILANI STIS')

@section('body')
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="card my-5">
        <div class="card-body">
          <h2>Detail Pengajuan Layanan</h2>
          <div class="mb-3">
            <p class="mb-1">Jenis Layanan</p>
            <p class="fw-bold">{{$form['type']=='submitsma'?'Pengumpulan Ijazah SMA':($form['type']=='retrievesma'?'Pengambilan Ijazah SMA':($form['type']=='retrievestis'?'Pengambilan Ijazah STIS':($form['type']=='requestskalumnistis'?'Permintaan Surat Keterangan Alumni Polstat STIS':'Permintaan Surat Tidak Terdaftar di PDDIKTI')))}}</p>
          </div>
          <div class="mb-3">
            <p class="mb-1">Tanggal Pengambilan</p>
            <p class="fw-bold">{{date('d F Y', strtotime($form['tanggal']))}}</p>
          </div>
          <div class="mb-3">
            <p class="mb-1">Nama</p>
            <p class="fw-bold">{{$form['type']=='submitsma' || $form['type']=='retrievesma' || $form['type']=='retrievestis'?$form['nama']:$form['user']['name']}}</p>
          </div>
          @if ($form['type']=='retrievestis')
            <div class="mb-3">
              <p class="mb-1">Status Ikatan Dinas</p>
              <p class="fw-bold">{{$form['ikatan_dinas']}}</p>
            </div>
            <div class="mb-3">
              <p class="mb-1">File Bukti Ikatan Dinas</p>
              <a href="/{{$form['bukti']}}" target="_blank">Unduh</a>
            </div>
          @endif
          @if ($form['type']=='submitsma' || $form['type']=='retrievesma' || $form['type']=='retrievestis')
            <div class="mb-3">
              <p class="mb-1">Diwakilkan</p>
              <p class="fw-bold">{{$form['diwakilkan']?'Diwakilkan':'Diri Sendiri'}}</p>
            </div>
            @if ($form['diwakilkan'])
              @if ($form['type']=='retrievestis')
                <div class="mb-3">
                  <p class="mb-1">Nama Pengambil</p>
                  <p class="fw-bold">{{$form['pengambil']}}</p>
                </div>
              @endif
              <div class="mb-3">
                <p class="mb-1">Surat Kuasa</p>
                <a href="/{{$form['surat_kuasa']}}" target="_blank">Unduh</a>
              </div>
            @endif
          @endif
          @if ($form['type'] == 'requestskalumnistis' || $form['type'] == 'requestsuratpddikti')
            <div class="mb-3">
              <p class="mb-1">NIM</p>
              <p class="fw-bold">{{$form['user']['nim']}}</p>
            </div>
            <div class="mb-3">
              <p class="mb-1">Program Studi</p>
              <p class="fw-bold">{{$form['user']['prodi']}}</p>
            </div>
            <div class="mb-3">
              <p class="mb-1">Tahun Lulus</p>
              <p class="fw-bold">{{$form['user']['tahun_lulus']}}</p>
            </div>
          @endif
          @if ($form['type'] == 'requestsuratpddikti')
            <div class="mb-3">
              <p class="mb-1">Tempat Tanggal Lahir</p>
              <p class="fw-bold">{{$form['ttl']}}</p>
            </div>
          @endif
          @if ($form['type'] == 'requestskalumnistis' || $form['type'] == 'requestsuratpddikti')
            <div class="mb-3">
              <p class="mb-1">Keperluan pembuatan surat</p>
              <p class="fw-bold">{{$form['keperluan']}}</p>
            </div>
          @endif
          <div class="mb-3">
            <p class="mb-1">Status</p>
            <div class="badge {{$form['approve'] == 'Diterima'?'text-bg-primary':($form['approve']=='Ditolak'?'text-bg-danger':($form['approve'] == 'Diserahkan'?'text-bg-success':'text-bg-warning'))}}">
              {{$form['approve']!=null?$form['approve']:'Perlu Diproses'}}
            </div>
          </div>
          @if ($form['approve'] == 'Ditolak')
            <div class="mb-3">
              <p class="mb-1">Alasan Ditolak</p>
              <p class="fw-bold">{{$form['reason']}}</p>
            </div>
          @endif
          <h3 class="mt-2">Aksi</h3>
          @if ($form['approve'] == null)
            <form action="{{route('handle_form_approve', ['id' => $form['id']])}}" method="post" class="mb-3">
              @csrf
              <input type="hidden" name="approve" value="Diterima">
              @if(request()->has('today'))
              <input type="hidden" name="today" value="1">
              @endif
              <button type="submit" class="btn btn-success">Terima</button>
            </form>
            <form action="{{route('handle_form_approve', ['id' => $form['id']])}}" method="post">
              @csrf
              <input type="hidden" name="approve" value="Ditolak">
              @if(request()->has('today'))
              <input type="hidden" name="today" value="1">
              @endif
              <div class="mb-3">
                <label for="reason" class="form-label">Alasan Ditolak</label>
                <input type="text" class="form-control" id="reason" name="reason">
              </div>
              <button type="submit" class="btn btn-danger">Tolak</button>
            </form>
          @endif
          @if ($form['approve'] == 'Diterima')
            <form action="{{route('handle_form_approve', ['id' => $form['id']])}}" method="post" class="mb-3">
              @csrf
              <input type="hidden" name="approve" value="Diserahkan">
              @if(request()->has('today'))
              <input type="hidden" name="today" value="1">
              @endif
              <button type="submit" class="btn btn-success">Telah Diserahkan</button>
            </form>
            <form action="{{route('handle_form_approve', ['id' => $form['id']])}}" method="post">
              @csrf
              <input type="hidden" name="approve" value="Ditolak">
              @if(request()->has('today'))
              <input type="hidden" name="today" value="1">
              @endif
              <div class="mb-3">
                <label for="reason" class="form-label">Alasan Ditolak</label>
                <input type="text" class="form-control" id="reason" name="reason">
              </div>
              <button type="submit" class="btn btn-danger">Tolak</button>
            </form>
          @endif
          <a href="{{request()->has('today')?route('admin_form_list', ['today' => '1']):route('admin_form_list')}}" class="btn btn-dark mt-3">Kembali</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection