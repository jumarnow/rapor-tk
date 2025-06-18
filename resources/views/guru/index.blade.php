@extends('layouts.app')

@section('title', 'Data Guru')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Guru</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Master</a></div>
                    <div class="breadcrumb-item">Data Guru</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('guru.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Tambah Guru
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>No. HP</th>
                                                <th>Foto</th>
                                                <th>Scan TTD</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($gurus as $guru)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $guru->nama }}</td>
                                                    <td>{{ $guru->alamat }}</td>
                                                    <td>{{ $guru->no_hp }}</td>
                                                    <td>
                                                        @if($guru->foto)
                                                            <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto Guru" class="img-thumbnail" style="max-width: 100px;">
                                                        @else
                                                            <span class="text-muted">Tidak ada foto</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($guru->scan_ttd)
                                                            <img src="{{ asset('storage/' . $guru->scan_ttd) }}" alt="Scan TTD" class="img-thumbnail" style="max-width: 100px;">
                                                        @else
                                                            <span class="text-muted">Tidak ada tanda tangan</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-warning btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    
    <!-- Page Specific JS File -->
    <script>
        $("#table-1").dataTable();
    </script>
@endpush
