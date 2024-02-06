@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{ route('education.index') }}" class="btn btn-secondary">
            << Kembali </a>
    </div>
    <form action="{{ route('education.store') }}" method="POST">
        @csrf


        <div class="mb-3">
            <label for="judul" class="form-label">Universitas</label>
            <input type="text"
                class="form-control form-control-sm @error('judul')
                is-invalid
            @enderror"
                name="judul" id="judul" aria-describedby="helpId" value="{{ old('judul') }}" placeholder="Judul" />
        </div>
        <div class="mb-3">
            <label for="info1" class="form-label">Nama Fakultas</label>
            <input type="text"
                class="form-control form-control-sm @error('info1')
                is-invalid
            @enderror"
                name="info1" id="info1" aria-describedby="helpId" value="{{ old('info1') }}"
                placeholder="Nama Fakultas" />

        </div>

        <div class="mb-3">
            <label for="info2" class="form-label">Nama Prodi</label>
            <input type="text"
                class="form-control form-control-sm @error('info2')
                is-invalid
            @enderror"
                name="info2" id="info2" aria-describedby="helpId" value="{{ old('info2') }}"
                placeholder="Nama Prodi" />

        </div>

        <div class="mb-3">
            <label for="info3" class="form-label">IPK</label>
            <input type="text" class="form-control form-control-sm 
            " name="info3" id="info3"
                aria-describedby="helpId" value="{{ old('info3') }}" placeholder="IPK" />


        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col-auto"> Tanggal Masuk </div>

                <div class="col-auto">
                    <input type="date" name="tgl_mulai" class="form-control form-control-sm " placeholder="dd/mm/yy"
                        value="{{ old('tgl_mulai') }}">
                </div>
                <div class="col-auto">
                    Tanggal Lulus
                </div>
                <div class="col-auto">
                    <input type="date" name="tgl_akhir" class="form-control form-control-sm" placeholder="dd/mm/yy"
                        value="{{ old('tgl_akhir') }}">
                </div>


            </div>
        </div>


        <button class="btn btn-primary" type="submit" name="simpan">
            Simpan
        </button>

    </form>
@endsection()
