@extends('layouts.app')

@section('title', 'Form Sekolah')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/dropzone/dist/dropzone.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ isset($sekolah) ? 'Edit' : 'Tambah' }} Sekolah</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Master</a></div>
                    <div class="breadcrumb-item">{{ isset($sekolah) ? 'Edit' : 'Tambah' }} Sekolah</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form action="{{ isset($sekolah) ? route('sekolah.update', $sekolah->id) : route('sekolah.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if (isset($sekolah))
                                    @method('PUT')
                                @endif
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label">Nama Sekolah</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                                id="nama" name="nama" placeholder="Masukkan nama sekolah" 
                                                value="{{ isset($sekolah) ? $sekolah->nama : old('nama') }}">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                                id="alamat" name="alamat" rows="3" 
                                                placeholder="Masukkan alamat lengkap">{{ isset($sekolah) ? $sekolah->alamat : old('alamat') }}</textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="no_telp" class="col-sm-3 col-form-label">Nomor Telepon</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" 
                                                id="no_telp" name="no_telp" placeholder="Contoh: 021-1234567" 
                                                value="{{ isset($sekolah) ? $sekolah->no_telp : old('no_telp') }}">
                                            @error('no_telp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                                id="email" name="email" placeholder="Contoh: info@sekolah.sch.id" 
                                                value="{{ isset($sekolah) ? $sekolah->email : old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="website" class="col-sm-3 col-form-label">Website</label>
                                        <div class="col-sm-9">
                                            <input type="url" class="form-control @error('website') is-invalid @enderror" 
                                                id="website" name="website" placeholder="Contoh: https://sekolah.sch.id" 
                                                value="{{ isset($sekolah) ? $sekolah->website : old('website') }}">
                                            @error('website')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="logo" class="col-sm-3 col-form-label">Logo Sekolah</label>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('logo') is-invalid @enderror" 
                                                    id="logo" name="logo" accept="image/*">
                                                <label class="custom-file-label" for="logo">Pilih file</label>
                                            </div>
                                            @error('logo')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            @if(isset($sekolah) && $sekolah->logo)
                                                <div class="mt-2">
                                                    <img src="{{ asset('storage/' . $sekolah->logo) }}" alt="Logo Sekolah" class="img-thumbnail" style="max-height: 100px">
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nama_kepala_sekolah" class="col-sm-3 col-form-label">Nama Kepala Sekolah</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('nama_kepala_sekolah') is-invalid @enderror" 
                                                id="nama_kepala_sekolah" name="nama_kepala_sekolah" placeholder="Masukkan nama kepala sekolah" 
                                                value="{{ isset($sekolah) ? $sekolah->nama_kepala_sekolah : old('nama_kepala_sekolah') }}">
                                            @error('nama_kepala_sekolah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                    <a href="{{ route('sekolah.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/bs-custom-file-input/dist/bs-custom-file-input.min.js') }}"></script>
    
    <!-- Page Specific JS File -->
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
@endpush
