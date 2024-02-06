@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{ route('halaman.index') }}" class="btn btn-secondary">
            << Kembali </a>
    </div>
    <form action="{{ route('halaman.store') }}" method="POST">
        @csrf


        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text"
                class="form-control form-control-sm @error('judul')
                is-invalid
            @enderror"
                name="judul" id="judul" aria-describedby="helpId" value="{{ old('judul') }}" placeholder="Judul" />


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
