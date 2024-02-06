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
            <label for="judul" class="form-label">Universitas</label>
            <input type="text" class="form-control form-control-sm 
            " name="judul" id="judul"
                aria-describedby="helpId" value="{{ $data->judul }}" placeholder="Judul" />


        </div>

        <div class="mb-3">
            <label for="info1" class="form-label">Nama Fakultas</label>
            <input type="text" class="form-control form-control-sm 
            " name="info1" id="info1"
                aria-describedby="helpId" value="{{ $data->info1 }}" placeholder="Nama Fakultas" />


        </div>

        <div class="mb-3">
            <label for="info2" class="form-label">Nama Prodi</label>
            <input type="text" class="form-control form-control-sm 
            " name="info2" id="info2"
                aria-describedby="helpId" value="{{ $data->info2 }}" placeholder="Nama Prodi" />


        </div>

        <div class="mb-3">
            <label for="info3" class="form-label">IPK</label>
            <input type="text" class="form-control form-control-sm 
            " name="info3" id="info3"
                aria-describedby="helpId" value="{{ $data->info3 }}" placeholder="IPK" />


        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col-auto"> Tanggal Masuk </div>

                <div class="col-auto">
                    <input type="date" name="tgl_mulai" class="form-control form-control-sm " placeholder="dd/mm/yy"
                        value="{{ $data->tgl_mulai }}">
                </div>
                <div class="col-auto">
                    Tanggal Lulus
                </div>
                <div class="col-auto">
                    <input type="date" name="tgl_akhir" class="form-control form-control-sm" placeholder="dd/mm/yy"
                        value="{{ $data->tgl_akhir }}">
                </div>


            </div>
        </div>


        <button class="btn
                btn-primary" type="submit" name="simpan">
            Simpan
        </button>

    </form>
@endsection()
