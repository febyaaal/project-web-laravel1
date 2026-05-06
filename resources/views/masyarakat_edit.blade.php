@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Data Masyarakat</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('masyarakat.update', $masyarakat->id) }}" method="POST">
                @csrf
                @method('PUT') 

                <div class="form-group mb-3">
                    <label>Nomor KK</label>
                    <input type="text" name="nomor_kk" class="form-control" value="{{ $masyarakat->nomor_kk }}" maxlength="16" required>
                </div>

                <div class="form-group mb-3">
                    <label>Nomor KTP</label>
                    <input type="text" name="nomor_ktp" class="form-control" value="{{ $masyarakat->nomor_ktp }}" maxlength="16" required>
                </div>

                <div class="form-group mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="{{ $masyarakat->nama }}" required>
                </div>

                <div class="form-group mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required>{{ $masyarakat->alamat }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        @foreach($genders as $gender)
                            <option value="{{ $gender }}" {{ $masyarakat->jenis_kelamin == $gender ? 'selected' : '' }}>
                                {{ $gender }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Data</button>
                <a href="{{ route('masyarakat.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection