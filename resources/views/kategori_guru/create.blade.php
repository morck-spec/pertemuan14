@extends('_layout.app')

@section('title', 'Tambah Kategori Guru')

@section('konten')

    <div class="card form-container">
        <div class="card-header-flex">
            <h2 class="card-title">Tambah Kategori Guru Baru</h2>
            <a href="{{ url('/kategori-guru') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>

        <form action="{{ url('/kategori-guru') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_kategori" class="form-label">Nama Kategori Guru <span class="required">*</span></label>
                <input
                    type="text"
                    id="nama_kategori"
                    name="nama_kategori"
                    class="form-control"
                    placeholder="Contoh: Guru Produktif / Guru Normatif & Adaptif"
                    value="{{ old('nama_kategori') }}"
                >
                @error('nama_kategori')
                    <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea
                    id="keterangan"
                    name="keterangan"
                    class="form-control"
                    rows="3"
                    placeholder="Masukkan deskripsi singkat kategori guru (opsional)"
                >{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
                <a href="{{ url('/kategori-guru') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>

@endsection

