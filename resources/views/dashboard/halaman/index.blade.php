@extends('dashboard.layout')
@section('konten')
    <p class="card-title">Halaman</p>
    <div class="pb-3">
        <a href="{{ route('halaman.create') }}" class="btn btn-primary">
            + Tambah Data</a>
    </div>
    <div class="table-responsive">
        <table class="table ">
            <thead>
                <tr>
                    <th class="col-1">Nomer</th>
                    <th>Judul</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 0;
                @endphp
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $post->judul }}</td>
                        <td>
                            <a href="{{ route('halaman.edit', $post->id) }}" class="btn btn-success btn-sm">Edit</a>


                            <form action="{{ route('halaman.destroy', $post->id) }}" method="POST"
                                onsubmit="return confirm('yakin akan menghapus')">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-danger d-inline btn-sm" name="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
