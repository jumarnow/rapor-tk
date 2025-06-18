@extends('layouts.app')

@section('title', 'Form Tahun Ajaran')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ isset($tahunAjaran) ? 'Edit' : 'Tambah' }} Tahun Ajaran</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Master</a></div>
                    <div class="breadcrumb-item">{{ isset($tahunAjaran) ? 'Edit' : 'Tambah' }} Tahun Ajaran</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form action="{{ isset($tahunAjaran) ? route('tahun-ajaran.update', $tahunAjaran->id) : route('tahun-ajaran.store') }}" method="POST">
                                @csrf
                                @if (isset($tahunAjaran))
                                    @method('PUT')
                                @endif
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="kode" class="col-sm-3 col-form-label">Kode</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('kode') is-invalid @enderror" 
                                                id="kode" name="kode" placeholder="Contoh: 2023/2024" 
                                                value="{{ isset($tahunAjaran) ? $tahunAjaran->kode : old('kode') }}">
                                            @error('kode')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                                id="nama" name="nama" placeholder="Contoh: Tahun Ajaran 2023/2024" 
                                                value="{{ isset($tahunAjaran) ? $tahunAjaran->nama : old('nama') }}">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="status" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                                <option value="">Pilih Status</option>
                                                <option value="aktif" {{ (isset($tahunAjaran) && $tahunAjaran->status == 'aktif') || old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                                <option value="tidak_aktif" {{ (isset($tahunAjaran) && $tahunAjaran->status == 'tidak_aktif') || old('status') == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                    <a href="{{ route('tahun-ajaran.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
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
    
    <!-- Page Specific JS File -->
@endpush
