@extends('_layout.app')

@section('title', 'Daftar Kategori Guru')

@section('konten')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header-flex">
            <h2 class="card-title">Daftar Kategori Guru</h2>
            <a href="{{ url('/kategori-guru/create') }}" class="btn btn-primary">
                + Tambah Kategori Guru
            </a>
        </div>

        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 60px;">No</th>
                        <th>Nama Kategori Guru</th>
                        <th>Keterangan</th>
                        <th class="text-center" style="width: 160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategoriGuru as $index => $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td><strong>{{ $item->nama_kategori }}</strong></td>
                            <td>{{ $item->keterangan ?? '-' }}</td>
                            <td class="text-center text-nowrap">
                                <div class="btn-group">
                                    <a href="{{ url('/kategori-guru/' . $item->id . '/edit') }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ url('/kategori-guru/' . $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori guru ini?');">
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
                            <td colspan="4" class="text-center" style="padding: 2rem; color: #6c757d;">
                                Belum ada data kategori guru. Silakan klik tombol <strong>+ Tambah Kategori Guru</strong>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection

