@extends('layouts.app')

@section('title', 'Form Siswa')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/dropzone/dist/dropzone.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ isset($siswa) ? 'Edit' : 'Tambah' }} Siswa</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Master</a></div>
                    <div class="breadcrumb-item">{{ isset($siswa) ? 'Edit' : 'Tambah' }} Siswa</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form action="{{ isset($siswa) ? route('siswa.update', $siswa->id) : route('siswa.store') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @if (isset($siswa))
                                    @method('PUT')
                                @endif
                                <div class="card-body">
                                    <h6 class="mb-3">Data Pribadi</h6>
                                    <div class="form-group row">
                                        <label for="nama_anak" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('nama_anak') is-invalid @enderror"
                                                id="nama_anak" name="nama_anak" placeholder="Nama Lengkap"
                                                value="{{ isset($siswa) ? $siswa->nama_anak : old('nama_anak') }}">
                                            @error('nama_anak')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nama_panggilan" class="col-sm-3 col-form-label">Nama Panggilan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('nama_panggilan') is-invalid @enderror"
                                                id="nama_panggilan" name="nama_panggilan" placeholder="Nama Panggilan"
                                                value="{{ isset($siswa) ? $siswa->nama_panggilan : old('nama_panggilan') }}">
                                            @error('nama_panggilan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                                id="nik" name="nik" placeholder="Nomor Induk Kependudukan"
                                                value="{{ isset($siswa) ? $siswa->nik : old('nik') }}">
                                            @error('nik')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nisn" class="col-sm-3 col-form-label">NISN</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('nisn') is-invalid @enderror"
                                                id="nisn" name="nisn" placeholder="Nomor Induk Siswa Nasional"
                                                value="{{ isset($siswa) ? $siswa->nisn : old('nisn') }}">
                                            @error('nisn')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-9">
                                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                id="jenis_kelamin" name="jenis_kelamin">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki" {{ (isset($siswa) && $siswa->jenis_kelamin == 'Laki-laki') || old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="Perempuan" {{ (isset($siswa) && $siswa->jenis_kelamin == 'Perempuan') || old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir"
                                                value="{{ isset($siswa) ? $siswa->tempat_lahir : old('tempat_lahir') }}">
                                            @error('tempat_lahir')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                id="tanggal_lahir" name="tanggal_lahir"
                                                value="{{ isset($siswa) ? $siswa->tanggal_lahir : old('tanggal_lahir') }}">
                                            @error('tanggal_lahir')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('agama') is-invalid @enderror"
                                                id="agama" name="agama" placeholder="Agama"
                                                value="{{ isset($siswa) ? $siswa->agama : old('agama') }}">
                                            @error('agama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control @error('alamat') is-invalid @enderror"
                                                id="alamat" name="alamat" placeholder="Alamat"
                                                rows="3">{{ isset($siswa) ? $siswa->alamat : old('alamat') }}</textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="no_hp" class="col-sm-3 col-form-label">No. HP</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                                id="no_hp" name="no_hp" placeholder="Nomor HP"
                                                value="{{ isset($siswa) ? $siswa->no_hp : old('no_hp') }}">
                                            @error('no_hp')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="anak_ke" class="col-sm-3 col-form-label">Anak Ke</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('anak_ke') is-invalid @enderror"
                                                id="anak_ke" name="anak_ke" placeholder="Anak Ke"
                                                value="{{ isset($siswa) ? $siswa->anak_ke : old('anak_ke') }}">
                                            @error('anak_ke')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jumlah_saudara" class="col-sm-3 col-form-label">Jumlah Saudara</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('jumlah_saudara') is-invalid @enderror"
                                                id="jumlah_saudara" name="jumlah_saudara" placeholder="Jumlah Saudara"
                                                value="{{ isset($siswa) ? $siswa->jumlah_saudara : old('jumlah_saudara') }}">
                                            @error('jumlah_saudara')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <h6 class="mb-3 mt-4">Data Orang Tua</h6>
                                    <div class="form-group row">
                                        <label for="nama_ayah" class="col-sm-3 col-form-label">Nama Ayah</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror"
                                                id="nama_ayah" name="nama_ayah" placeholder="Nama Ayah"
                                                value="{{ isset($siswa) ? $siswa->nama_ayah : old('nama_ayah') }}">
                                            @error('nama_ayah')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nama_ibu" class="col-sm-3 col-form-label">Nama Ibu</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror"
                                                id="nama_ibu" name="nama_ibu" placeholder="Nama Ibu"
                                                value="{{ isset($siswa) ? $siswa->nama_ibu : old('nama_ibu') }}">
                                            @error('nama_ibu')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="pekerjaan_ayah" class="col-sm-3 col-form-label">Pekerjaan Ayah</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                                                id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah"
                                                value="{{ isset($siswa) ? $siswa->pekerjaan_ayah : old('pekerjaan_ayah') }}">
                                            @error('pekerjaan_ayah')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="pekerjaan_ibu" class="col-sm-3 col-form-label">Pekerjaan Ibu</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                                                id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu"
                                                value="{{ isset($siswa) ? $siswa->pekerjaan_ibu : old('pekerjaan_ibu') }}">
                                            @error('pekerjaan_ibu')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <h6 class="mb-3 mt-4">Alamat Lengkap</h6>
                                    <div class="form-group row">
                                        <label for="nama_jalan_desa" class="col-sm-3 col-form-label">Nama Jalan/Desa</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('nama_jalan_desa') is-invalid @enderror"
                                                id="nama_jalan_desa" name="nama_jalan_desa" placeholder="Nama Jalan/Desa"
                                                value="{{ isset($siswa) ? $siswa->nama_jalan_desa : old('nama_jalan_desa') }}">
                                            @error('nama_jalan_desa')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('kecamatan') is-invalid @enderror"
                                                id="kecamatan" name="kecamatan" placeholder="Kecamatan"
                                                value="{{ isset($siswa) ? $siswa->kecamatan : old('kecamatan') }}">
                                            @error('kecamatan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="kabupaten_kota" class="col-sm-3 col-form-label">Kabupaten/Kota</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('kabupaten_kota') is-invalid @enderror"
                                                id="kabupaten_kota" name="kabupaten_kota" placeholder="Kabupaten/Kota"
                                                value="{{ isset($siswa) ? $siswa->kabupaten_kota : old('kabupaten_kota') }}">
                                            @error('kabupaten_kota')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('provinsi') is-invalid @enderror"
                                                id="provinsi" name="provinsi" placeholder="Provinsi"
                                                value="{{ isset($siswa) ? $siswa->provinsi : old('provinsi') }}">
                                            @error('provinsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="kode_pos" class="col-sm-3 col-form-label">Kode Pos</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('kode_pos') is-invalid @enderror"
                                                id="kode_pos" name="kode_pos" placeholder="Kode Pos"
                                                value="{{ isset($siswa) ? $siswa->kode_pos : old('kode_pos') }}">
                                            @error('kode_pos')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <h6 class="mb-3 mt-4">Data Sekolah</h6>
                                    <div class="form-group row">
                                        <label for="kelas_id" class="col-sm-3 col-form-label">Kelas</label>
                                        <div class="col-sm-9">
                                            <select class="form-control @error('kelas_id') is-invalid @enderror"
                                                id="kelas_id" name="kelas_id">
                                                <option value="">Pilih Kelas</option>
                                                @foreach($kelas as $k)
                                                    <option value="{{ $k->id }}" {{ (isset($siswa) && $siswa->kelas_id == $k->id) || old('kelas_id') == $k->id ? 'selected' : '' }}>
                                                        {{ $k->nama_kelas }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('kelas_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="foto" class="col-sm-3 col-form-label">Foto</label>
                                        <div class="col-sm-9">
                                            @if(isset($siswa) && $siswa->foto)
                                                <div class="mb-2">
                                                    <img src="{{ asset('storage/' . $siswa->foto) }}" alt="Foto Siswa"
                                                        class="img-thumbnail" style="max-width: 200px;">
                                                </div>
                                            @endif
                                            <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                                id="foto" name="foto" accept="image/*">
                                            <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB</small>
                                            @error('foto')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                    <a href="{{ route('siswa.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
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
    </script>
@endpush
