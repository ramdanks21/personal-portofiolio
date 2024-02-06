@extends('dashboard.layout')
@section('konten')
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-between">
            <div class="col-5">
                <h3>Profiile</h3>
                @if (get_meta_value('_foto'))
                    <img src="{{ asset('foto') . '/' . get_meta_value('_foto') }}" alt=""
                        style="max-width: 100px; max-height: 100px">
                @endif
                <div class="mb-3">
                    <label for="_foto" class="form-label">Foto</label>
                    <input type="file"
                        class="form-control form-control-sm skill @error('_foto')
                        is_invalid
                    @enderror"
                        name="_foto" id="_foto" aria-describedby="helpId" />
                </div>
                <div class="mb-3">
                    <label for="judul" class="form-label">Kota</label>
                    <input type="text" class="form-control form-control-sm skill" name="_kota" id="_kota"
                        aria-describedby="helpId" value="{{ get_meta_value('_kota') }}" />
                </div>
                <div class="mb-3">
                    <label for="judul" class="form-label">Provinsi</label>
                    <input type="text" class="form-control form-control-sm skill" name="_provinsi" id="_provinsi"
                        aria-describedby="helpId" value="{{ get_meta_value('_provinsi') }}" />
                </div>
                <div class="mb-3">
                    <label for="judul" class="form-label">No Hp</label>
                    <input type="text" class="form-control form-control-sm skill" name="_nohp" id="_nohp"
                        aria-describedby="helpId" value="{{ get_meta_value('_nohp') }}" />
                </div>

                <div class="mb-3">
                    <label for="_email" class="form-label">Email</label>
                    <input value="{{ get_meta_value('_email') }}" type="email"
                        class="form-control form-control-sm  @error('_email')
                        is_invalid
                    @enderror skill"
                        name="_email" id="_email" aria-describedby="helpId" />
                </div>

            </div>
            <div class="col-5">
                <h3>Akun Media Sosial</h3>
                <div class="mb-3">
                    <label for="_facebook" class="form-label">Facebook</label>
                    <input type="text" class="form-control form-control-sm skill" name="_facebook" id="_facebook"
                        aria-describedby="helpId" value="{{ get_meta_value('_facebook') }}" />
                </div>
                <div class="mb-3">
                    <label for="_twitter" class="form-label">Twitter</label>
                    <input type="text" class="form-control form-control-sm skill" name="_twitter" id="_twitter"
                        aria-describedby="helpId" value="{{ get_meta_value('_twitter') }}" />
                </div>
                <div class="mb-3">
                    <label for="_linkedin" class="form-label">Linkedin</label>
                    <input type="text" class="form-control form-control-sm skill" name="_linkedin" id="_linkedin"
                        aria-describedby="helpId" value="{{ get_meta_value('_linkedin') }}" />
                </div>
            </div>
        </div>



        <button class="btn btn-primary" type="submit" name="simpan">
            Simpan
        </button>

    </form>
@endsection()
