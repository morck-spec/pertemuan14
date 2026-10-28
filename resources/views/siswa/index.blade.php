@extends('_layout.app')

@section('title', 'Data Siswa')

@section('konten')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Card Putih Sesuai Foto Mentor -->
    <div class="card">
        <div class="card-header-flex">
            <h2 class="card-title">Daftar Siswa</h2>
            <a href="{{ url('/siswa/create') }}" class="btn btn-primary">
                + Tambah Siswa
            </a>
        </div>

        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 45px;">No</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th class="text-center" style="width: 110px;">Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th class="text-center" style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($siswaList as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $item->nisn }}</td>
                            <td><strong>{{ $item->nama }}</strong></td>
                            <td class="text-center">
                                {{ strtoupper($item->jenis_kelamin) === 'L' ? 'Laki-laki' : 'Perempuan' }}
                            </td>
                            <td>{{ $item->tanggal_lahir ? date('d-m-Y', strtotime($item->tanggal_lahir)) : '-' }}</td>
                            <td>{{ $item->kelas->nama ?? '-' }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td class="text-center text-nowrap">
                                <div class="btn-group">
                                    <a href="{{ url('/siswa/' . $item->id . '/edit') }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ url('/siswa/' . $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center" style="padding: 2rem; color: #6c757d;">
                                Belum ada data siswa. Silakan klik tombol <strong>+ Tambah Siswa</strong>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
