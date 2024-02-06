@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{ route('experience.index') }}" class="btn btn-secondary">
            << Kembali </a>
    </div>
    <form action="{{ route('experience.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="mb-3">
            <label for="judul" class="form-label">Posis</label>
            <input type="text" class="form-control form-control-sm 
            " name="judul" id="judul"
                aria-describedby="helpId" value="{!! $data->judul !!}" placeholder="Judul" />


        </div>

        <div class="mb-3">
            <label for="info1" class="form-label">Nama Perusahaan</label>
            <input type="text" class="form-control form-control-sm 
            " name="info1" id="info1"
                aria-describedby="helpId" value="{{ $data->info1 }}" placeholder="Nama Perusahaan" />


        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col-auto"> Tanggal Mulai </div>

                <div class="col-auto">
                    <input type="date" name="tgl_mulai" class="form-control form-control-sm " placeholder="dd/mm/yy"
                        value="{{ $data->tgl_mulai }}">
                </div>
                <div class="col-auto">
                    Tanggal Akhir
                </div>
                <div class="col-auto">
                    <input type="date" name="tgl_akhir" class="form-control form-control-sm" placeholder="dd/mm/yy"
                        value="{{ $data->tgl_akhir }}">
                </div>


            </div>
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
