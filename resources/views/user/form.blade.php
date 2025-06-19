@extends('layouts.app')

@section('title', 'Form User')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ isset($user) ? 'Edit' : 'Tambah' }} User</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Master</a></div>
                    <div class="breadcrumb-item">{{ isset($user) ? 'Edit' : 'Tambah' }} User</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
                                @csrf
                                @if (isset($user))
                                    @method('PUT')
                                @endif
                            <div class="card-body">
                                <div class="form-group row">
                                        <label for="role" class="col-sm-3 col-form-label">Role <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                            <select class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                                                <option value="">Pilih Role</option>
                                                <option value="admin" {{ (isset($user) && $user->role == 'admin') || old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="guru" {{ (isset($user) && $user->role == 'guru') || old('role') == 'guru' ? 'selected' : '' }}>Guru</option>
                                                <option value="siswa" {{ (isset($user) && $user->role == 'siswa') || old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                            </select>
                                            @error('role')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row" id="guru-field" style="display: none;">
                                        <label for="guru_id" class="col-sm-3 col-form-label">Guru <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control select2 @error('guru_id') is-invalid @enderror" 
                                                id="guru_id" name="guru_id">
                                                <option value="">Pilih Guru</option>
                                                @foreach ($gurus as $guru)
                                                    <option value="{{ $guru->id }}" 
                                                        data-nama="{{ $guru->nama }}"
                                                        {{ (isset($user) && $user->guru_id == $guru->id) || old('guru_id') == $guru->id ? 'selected' : '' }}>
                                                        {{ $guru->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('guru_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Nama <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                                id="name" name="name" placeholder="Masukkan nama lengkap" 
                                                value="{{ isset($user) ? $user->name : old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="username" class="col-sm-3 col-form-label">Username <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" 
                                                id="username" name="username" placeholder="Masukkan username" 
                                                value="{{ isset($user) ? $user->username : old('username') }}">
                                            @error('username')
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
                                                id="email" name="email" placeholder="Masukkan email (opsional)" 
                                                value="{{ isset($user) ? $user->email : old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                <div class="form-group row">
                                        <label for="password" class="col-sm-3 col-form-label">Password <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                                id="password" name="password" placeholder="{{ isset($user) ? 'Kosongkan jika tidak ingin mengubah password' : 'Masukkan password' }}">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                <div class="form-group row">
                                        <label for="password_confirmation" class="col-sm-3 col-form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                            <input type="password" class="form-control" 
                                                id="password_confirmation" name="password_confirmation" 
                                                placeholder="Konfirmasi password">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
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
            
            // Show/hide guru field based on role selection
            function toggleGuruField() {
                var role = $('#role').val();
                if (role === 'guru') {
                    $('#guru-field').show();
                } else {
                    $('#guru-field').hide();
                    $('#guru_id').val('').trigger('change');
                    // Reset username if it was auto-generated
                    if ($('#username').val() && $('#username').data('auto-generated')) {
                        $('#username').val('').removeData('auto-generated');
                    }
                    // Reset nama if it was auto-generated
                    if ($('#name').val() && $('#name').data('auto-generated')) {
                        $('#name').val('').removeData('auto-generated');
                    }
                }
            }
            
            // Generate username from guru name
            function generateUsername() {
                var selectedOption = $('#guru_id option:selected');
                if (selectedOption.val() && selectedOption.val() !== '') {
                    var namaGuru = selectedOption.data('nama');
                    if (namaGuru) {
                        var username = namaGuru.toLowerCase().replace(/\s+/g, '_');
                        $('#username').val(username).data('auto-generated', true);
                        $('#name').val(namaGuru).data('auto-generated', true);
                    }
                }
            }
            
            // Initial check
            toggleGuruField();
            
            // Check on role change
            $('#role').change(function() {
                toggleGuruField();
            });
            
            // Generate username when guru is selected
            $('#guru_id').change(function() {
                if ($('#role').val() === 'guru') {
                    generateUsername();
                }
            });
        });
    </script>
@endpush
