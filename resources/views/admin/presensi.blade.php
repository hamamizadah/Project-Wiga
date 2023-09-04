@extends('admin.master')
@section('judul_halaman', 'Pertemuan')
@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
@endsection
@section('konten')
    <div class="section-header">
        <h1>Presensi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dbadmin') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Data Absensi</div>
            <div class="breadcrumb-item">Pertemuan</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-check-double"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Presensi</h4>
                        </div>
                        <div class="card-body">
                            Masukkan Mapel,Tanggal dan Kelas
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('presensi.add') }}">
            @csrf
            <div class="form-group">

                <label for="tanggal">Tanggal:</label>
                <input type="date" name="tanggal" id="tanggal">
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $key => $s)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $s->nama }}</td>
                            <td>{{ $s->kelas->kodekelas}}</td>
                            <td><input type="text" name="keterangan[]"></td>
                            <input type="hidden" name="siswa_id[]" value="{{ $s->id }}">
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit">Simpan</button>
        </form>

    </div>
@endsection
