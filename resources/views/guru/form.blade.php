@extends('layouts.app')

@section('title', 'Form Guru')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/dropzone/dist/dropzone.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ isset($guru) ? 'Edit' : 'Tambah' }} Guru</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Master</a></div>
                    <div class="breadcrumb-item">{{ isset($guru) ? 'Edit' : 'Tambah' }} Guru</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form action="{{ isset($guru) ? route('guru.update', $guru->id) : route('guru.store') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @if (isset($guru))
                                    @method('PUT')
                                @endif
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" placeholder="Nama Guru"
                                                value="{{ isset($guru) ? $guru->nama : old('nama') }}">
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
                                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat"
                                                rows="3">{{ isset($guru) ? $guru->alamat : old('alamat') }}</textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="no_hp" class="col-sm-3 col-form-label">No. HP</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                                id="no_hp" name="no_hp" placeholder="Nomor HP"
                                                value="{{ isset($guru) ? $guru->no_hp : old('no_hp') }}">
                                            @error('no_hp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="foto" class="col-sm-3 col-form-label">Foto</label>
                                        <div class="col-sm-9">
                                            @if (isset($guru) && $guru->foto)
                                                <div class="mb-2">
                                                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto Guru"
                                                        class="img-thumbnail" style="max-width: 200px;">
                                                </div>
                                            @endif
                                            <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                                id="foto" name="foto" accept="image/*">
                                            <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB</small>
                                            @error('foto')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="scan_ttd" class="col-sm-3 col-form-label">Scan Tanda Tangan</label>
                                        <div class="col-sm-9">
                                            @if (isset($guru) && $guru->scan_ttd)
                                                <div class="mb-2">
                                                    <img src="{{ asset('storage/' . $guru->scan_ttd) }}" alt="Scan TTD"
                                                        class="img-thumbnail" style="max-width: 200px;">
                                                </div>
                                            @endif
                                            <input type="file"
                                                class="form-control @error('scan_ttd') is-invalid @enderror" id="scan_ttd"
                                                name="scan_ttd" accept="image/*">
                                            <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB</small>
                                            @error('scan_ttd')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                                        Simpan</button>
                                    <a href="{{ route('guru.index') }}" class="btn btn-secondary"><i
                                            class="fas fa-arrow-left"></i> Kembali</a>
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
    <script src="{{ asset('library/dropzone/dist/dropzone.js') }}"></script>

    <!-- Page Specific JS File -->
    <script>
        // Preview image before upload
        function previewImage(input, previewElement) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(previewElement).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Preview foto
        $("#foto").change(function() {
            previewImage(this, '#foto-preview');
        });

        // Preview scan_ttd
        $("#scan_ttd").change(function() {
            previewImage(this, '#scan_ttd-preview');
        });
    </script>
@endpush
