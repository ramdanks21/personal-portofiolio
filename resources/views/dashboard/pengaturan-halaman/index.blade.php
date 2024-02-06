@extends('dashboard.layout')
@section('konten')
    <form action="{{ route('pengaturanhalaman.update') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="about" class="col-sm-2">About</label>
            <div class="col-sm-6">
                <select name="_about" id="" class="form-control-sm">
                    <option value="">-Pilih-</option>
                    @foreach ($datahalaman as $item)
                        <option value="{{ $item->id }}" {{ get_meta_value('_about') == $item->id ? 'selected' : '' }}>
                            {{ $item->judul }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="intereset" class="col-sm-2">Interest</label>
            <div class="col-sm-6">
                <select name="_intereset" id="" class="form-control-sm">
                    <option value="">-Pilih-</option>
                    @foreach ($datahalaman as $item)
                        <option value="{{ $item->id }}"
                            {{ get_meta_value('_intereset') == $item->id ? 'selected' : '' }}>
                            {{ $item->judul }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="award" class="col-sm-2">Award</label>
            <div class="col-sm-6">
                <select name="_award" id="" class="form-control-sm">
                    <option value="">-Pilih-</option>
                    @foreach ($datahalaman as $item)
                        <option value="{{ $item->id }}" {{ get_meta_value('_award') == $item->id ? 'selected' : '' }}>
                            {{ $item->judul }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>



        <button class="btn btn-primary" type="submit" name="simpan">
            Simpan
        </button>

    </form>
@endsection()
