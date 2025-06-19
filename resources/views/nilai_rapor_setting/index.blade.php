@extends('layouts.app')

@section('title', 'Data Setting Nilai Rapor')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Setting Nilai Rapor</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Master</a></div>
                    <div class="breadcrumb-item">Setting Nilai Rapor</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('nilai-rapor-setting.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Tambah Setting Nilai Rapor
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama</th>
                                                <th>Tahun Ajaran</th>
                                                <th>Kelas</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($nilaiRaporSettings as $setting)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $setting->nama }}</td>
                                                    <td>{{ $setting->tahunAjaran->nama ?? '-' }}</td>
                                                    <td>
                                                        @foreach ($setting->nilaiRaporSettingKelas as $nk)
                                                            <span class="badge badge-info">{{ $nk->kelas_str }}</span>@if(!$loop->last), @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('nilai-rapor-setting.edit', $setting->id) }}" class="btn btn-warning btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('nilai-rapor-setting.destroy', $setting->id) }}" method="POST" class="d-inline">
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