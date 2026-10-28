@extends('_layout.app')

@section('title', 'Detail Siswa')

@section('konten')

    <!-- Card Detail Sesuai Tema SmartSekolah -->
    <div class="card form-container">
        <div class="card-header-flex">
            <h2 class="card-title">Rincian Siswa: {{ $siswa->nama }}</h2>
            <a href="{{ url('/siswa') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>

        <table class="table-custom">
            <tr>
                <th style="width: 180px;">NISN</th>
                <td>{{ $siswa->nisn }}</td>
            </tr>
            <tr>
                <th>Nama Siswa</th>
                <td><strong>{{ $siswa->nama }}</strong></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ strtoupper($siswa->jenis_kelamin) === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $siswa->tanggal_lahir ? date('d-m-Y', strtotime($siswa->tanggal_lahir)) : '-' }}</td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td>{{ $siswa->kelas->nama ?? '-' }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $siswa->alamat }}</td>
            </tr>
        </table>

        <div class="form-actions">
            <a href="{{ url('/siswa/' . $siswa->id . '/edit') }}" class="btn btn-warning">
                Edit Data
            </a>
            <a href="{{ url('/siswa') }}" class="btn btn-secondary">
                Kembali ke Daftar
            </a>
        </div>
    </div>

@endsection
