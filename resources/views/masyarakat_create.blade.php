@extends('layouts.app') 
@section('content') 
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Masyarakat</div>

                <div class="card-body">
                    <form action="{{ route('masyarakat.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="nomor_kk" class="form-label">Nomor KK</label>
                            <input type="text" name="nomor_kk" id="nomor_kk" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="nomor_ktp" class="form-label">Nomor KTP</label>
                            <input type="text" name="nomor_ktp" id="nomor_ktp" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="">Pilih Gender</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender }}">{{ $gender }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                            <a href="{{ route('masyarakat.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection