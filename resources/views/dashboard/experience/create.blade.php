@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{ route('experience.index') }}" class="btn btn-secondary">
            << Kembali </a>
    </div>
    <form action="{{ route('experience.store') }}" method="POST">
        @csrf


        <div class="mb-3">
            <label for="judul" class="form-label">Posisi</label>
            <input type="text"
                class="form-control form-control-sm @error('judul')
                is-invalid
            @enderror"
                name="judul" id="judul" aria-describedby="helpId" value="{{ old('judul') }}" placeholder="Judul" />
        </div>
        <div class="mb-3">
            <label for="info1" class="form-label">Nama Perusahaan</label>
            <input type="text"
                class="form-control form-control-sm @error('judul')
                is-invalid
            @enderror"
                name="info1" id="info1" aria-describedby="helpId" value="{{ old('judul') }}"
                placeholder="Nama Perusahan" />

        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col-auto"> Tanggal Mulai </div>

                <div class="col-auto">
                    <input type="date" name="tgl_mulai" class="form-control form-control-sm " placeholder="dd/mm/yy">
                </div>
                <div class="col-auto">
                    Tanggal Akhir
                </div>
                <div class="col-auto">
                    <input type="date" name="tgl_akhir" class="form-control form-control-sm" placeholder="dd/mm/yy">
                </div>


            </div>
        </div>

        <div class="mb-3">
            <label for="judul" class="form-label">Isi</label>
            <textarea name="isi" id="is" cols="30" rows="10"
                class="form-control summernote  @error('isi')
                is-invalid
            @enderror"
                aria-valuemax="{{ old('isi') }}">
            </textarea>

        </div>
        <button class="btn btn-primary" type="submit" name="simpan">
            Simpan
        </button>

    </form>
@endsection()
