@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{ route('halaman.index') }}" class="btn btn-secondary">
            << Kembali </a>
    </div>
    <form action="{{ route('halaman.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control form-control-sm 
            " name="judul" id="judul"
                aria-describedby="helpId" value="{!! $data->judul !!}" placeholder="Judul" />


        </div>

        <div class="mb-3">
            <label for="judul" class="form-label">Isi</label>
            <textarea name="isi" id="is" cols="30" rows="10" class="form-control summernote">
                {{ $data->isi }} </textarea>

        </div>
        <button class="btn
                btn-primary" type="submit" name="simpan">
            Simpan
        </button>

    </form>
@endsection()
