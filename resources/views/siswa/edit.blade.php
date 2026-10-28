@extends('_layout.app')

@section('title', 'Edit Siswa')

@section('konten')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul style="margin-left: 20px; margin-top: 5px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Card Form Edit Sesuai Tema SmartSekolah -->
    <div class="card form-container">
        <div class="card-header-flex">
            <h2 class="card-title">Edit Data Siswa</h2>
            <a href="{{ url('/siswa') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>

        <form action="{{ url('/siswa/' . $siswa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- NISN -->
            <div class="form-group">
                <label for="nisn" class="form-label">NISN <span class="required">*</span></label>
                <input 
                    type="text" 
                    id="nisn" 
                    name="nisn" 
                    class="form-control" 
                    value="{{ old('nisn', $siswa->nisn) }}" 
                    required 
                    maxlength="20"
                >
            </div>

            <!-- Nama Siswa -->
            <div class="form-group">
                <label for="nama" class="form-label">Nama Siswa <span class="required">*</span></label>
                <input 
                    type="text" 
                    id="nama" 
                    name="nama" 
                    class="form-control" 
                    value="{{ old('nama', $siswa->nama) }}" 
                    required 
                    maxlength="100"
                >
            </div>

            <!-- Jenis Kelamin -->
            <div class="form-group">
                <label class="form-label">Jenis Kelamin <span class="required">*</span></label>
                <div class="radio-group">
                    <label class="radio-item">
                        <input type="radio" name="jenis_kelamin" value="L" {{ old('jenis_kelamin', $siswa->jenis_kelamin) === 'L' ? 'checked' : '' }} required>
                        <span>Laki-laki</span>
                    </label>
                    <label class="radio-item">
                        <input type="radio" name="jenis_kelamin" value="P" {{ old('jenis_kelamin', $siswa->jenis_kelamin) === 'P' ? 'checked' : '' }} required>
                        <span>Perempuan</span>
                    </label>
                </div>
            </div>

            <!-- Tanggal Lahir -->
            <div class="form-group">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="required">*</span></label>
                <input 
                    type="date" 
                    id="tanggal_lahir" 
                    name="tanggal_lahir" 
                    class="form-control" 
                    value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}" 
                    required
                >
            </div>

            <!-- Kelas -->
            <div class="form-group">
                <label for="kelas_id" class="form-label">Kelas <span class="required">*</span></label>
                <select id="kelas_id" name="kelas_id" class="form-select" required>
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($kelasList as $kelas)
                        <option value="{{ $kelas->id }}" {{ old('kelas_id', $siswa->kelas_id) == $kelas->id ? 'selected' : '' }}>
                            {{ $kelas->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Alamat -->
            <div class="form-group">
                <label for="alamat" class="form-label">Alamat <span class="required">*</span></label>
                <textarea 
                    id="alamat" 
                    name="alamat" 
                    class="form-control" 
                    rows="3" 
                    required
                >{{ old('alamat', $siswa->alamat) }}</textarea>
            </div>

            <!-- Tombol Aksi -->
            <div class="form-actions">
                <button type="submit" class="btn btn-warning">
                    Simpan Perubahan
                </button>
                <a href="{{ url('/siswa') }}" class="btn btn-secondary">
                    Batal
                </a>
            </div>
        </form>
    </div>

@endsection
