@extends('layouts.app')

@section('title', 'Form Setting Nilai')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ isset($setingNilai) ? 'Edit' : 'Tambah' }} Setting Nilai</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Master</a></div>
                    <div class="breadcrumb-item">{{ isset($setingNilai) ? 'Edit' : 'Tambah' }} Setting Nilai</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form action="{{ isset($setingNilai) ? route('seting-nilai.update', $setingNilai->id) : route('seting-nilai.store') }}" method="POST">
                                @csrf
                                @if (isset($setingNilai))
                                    @method('PUT')
                                @endif
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label">Nama Setting</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                                id="nama" name="nama" placeholder="Masukkan nama setting nilai" 
                                                value="{{ isset($setingNilai) ? $setingNilai->nama : old('nama') }}">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tahun_ajaran_id" class="col-sm-3 col-form-label">Tahun Ajaran</label>
                                        <div class="col-sm-9">
                                            <select class="form-control select2 @error('tahun_ajaran_id') is-invalid @enderror" 
                                                id="tahun_ajaran_id" name="tahun_ajaran_id">
                                                <option value="">Pilih Tahun Ajaran</option>
                                                @foreach ($tahunAjarans as $ta)
                                                    <option value="{{ $ta->id }}" 
                                                        {{ (isset($setingNilai) && $setingNilai->tahun_ajaran_id == $ta->id) || old('tahun_ajaran_id') == $ta->id ? 'selected' : '' }}>
                                                        {{ $ta->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('tahun_ajaran_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                    <a href="{{ route('seting-nilai.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
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
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    
    <!-- Page Specific JS File -->
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush 