@extends('layouts.app')

@section('title', 'Data Tahun Ajaran')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Tahun Ajaran</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Master</a></div>
                    <div class="breadcrumb-item">Tahun Ajaran</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('tahun-ajaran.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Tambah Tahun Ajaran
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                                <th class="text-center">No</th>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($tahunAjarans as $tahunAjaran)
                                            <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $tahunAjaran->kode }}</td>
                                                    <td>{{ $tahunAjaran->nama }}</td>
                                                    <td>
                                                        @if($tahunAjaran->status == 'aktif')
                                                            <span class="badge badge-success">Aktif</span>
                                                        @else
                                                            <span class="badge badge-danger">Tidak Aktif</span>
                                                        @endif
                                                    </td>
                                                <td>
                                                        <a href="{{ route('tahun-ajaran.edit', $tahunAjaran->id) }}" class="btn btn-warning btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('tahun-ajaran.destroy', $tahunAjaran->id) }}" method="POST" class="d-inline">
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
