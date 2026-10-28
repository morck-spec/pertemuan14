@extends('_layout.app')

@section('title', 'Edit Jurusan')

@section('konten')

    <div class="card form-container">
        <div class="card-header-flex">
            <h2 class="card-title">Edit Data Jurusan</h2>
            <a href="{{ url('/jurusan') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>

        <form action="{{ url('/jurusan/' . $jurusan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_jurusan" class="form-label">Nama Jurusan <span class="required">*</span></label>
                <input
                    type="text"
                    id="nama_jurusan"
                    name="nama_jurusan"
                    class="form-control"
                    placeholder="Contoh: Teknik Jaringan Komputer dan Telekomunikasi"
                    value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}"
                >
                @error('nama_jurusan')
                    <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-warning">
                    Update
                </button>
                <a href="{{ url('/jurusan') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>

@endsection

