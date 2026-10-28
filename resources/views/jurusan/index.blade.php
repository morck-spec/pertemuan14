@extends('_layout.app')

@section('title', 'Daftar Jurusan')

@section('konten')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header-flex">
            <h2 class="card-title">Daftar Jurusan</h2>
            <a href="{{ url('/jurusan/create') }}" class="btn btn-primary">
                + Tambah Jurusan
            </a>
        </div>

        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 60px;">No</th>
                        <th>Nama Jurusan</th>
                        <th class="text-center" style="width: 160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jurusan as $index => $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td><strong>{{ $item->nama_jurusan }}</strong></td>
                            <td class="text-center text-nowrap">
                                <div class="btn-group">
                                    <a href="{{ url('/jurusan/' . $item->id . '/edit') }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ url('/jurusan/' . $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jurusan ini?');">
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
                            <td colspan="3" class="text-center" style="padding: 2rem; color: #6c757d;">
                                Belum ada data jurusan. Silakan klik tombol <strong>+ Tambah Jurusan</strong>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection

