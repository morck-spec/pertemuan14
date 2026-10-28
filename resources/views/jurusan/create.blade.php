@extends('_layout.app')

@section('title', 'Tambah Jurusan')

@section('konten')

    <div class="card form-container">
        <div class="card-header-flex">
            <h2 class="card-title">Tambah Jurusan Baru</h2>
            <a href="{{ url('/jurusan') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>

        <form action="{{ url('/jurusan') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_jurusan" class="form-label">Nama Jurusan <span class="required">*</span></label>
                <input
                    type="text"
                    id="nama_jurusan"
                    name="nama_jurusan"
                    class="form-control"
                    placeholder="Contoh: Teknik Komputer dan Jaringan"
                    value="{{ old('nama_jurusan') }}"
                >
                @error('nama_jurusan')
                    <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
                <a href="{{ url('/jurusan') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>

@endsection

