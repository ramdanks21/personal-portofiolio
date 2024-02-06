@extends('dashboard.layout')
@section('konten')
    <p class="card-title">education</p>
    <div class="pb-3">
        <a href="{{ route('education.create') }}" class="btn btn-primary">
            + Tambah Education</a>
    </div>
    <div class="table-responsive">
        <table class="table ">
            <thead>
                <tr>
                    <th class="col-1">Nomer</th>
                    <th>Universitas</th>
                    <th>Nama Fakultas</th>
                    <th>Nama Prodi</th>
                    <th> IPK</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Lulus</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 0;
                    //
                @endphp
                @php
                    // dd($posts);
                    //
                @endphp
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $post->judul }}</td>
                        <td>{{ $post->info1 }}</td>
                        <td>{{ $post->info2 }}</td>
                        <td>{{ $post->info3 }}</td>
                        <td>{{ $post->tgl_mulai_indo }}</td>
                        <td>{{ $post->tgl_akhir_indo }}</td>
                        <td>
                            <a href="{{ route('education.edit', $post->id) }}" class="btn btn-success btn-sm">Edit</a>


                            <form action="{{ route('education.destroy', $post->id) }}" method="POST"
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
