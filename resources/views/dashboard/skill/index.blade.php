@extends('dashboard.layout')
@section('konten')
    <form action="{{ route('skill.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label">Programing Language & TOOLS</label>
            <input type="text" class="form-control form-control-sm skill" name="_language" id="_language"
                aria-describedby="helpId" value="{{ get_meta_value('_language') }}" placeholder="Judul" />


        </div>

        <div class="mb-3">
            <label for="judul" class="form-label">WORKFLOW</label>
            <textarea name="__workflow" id="is" cols="30" rows="10" class="form-control summernote  ">
                {{ get_meta_value('__workflow') }}
            </textarea>

        </div>
        <button class="btn btn-primary" type="submit" name="simpan">
            Simpan
        </button>

    </form>
@endsection()
@push('child-script')
    <script>
        $(document).ready(function() {
            $('.skill').tokenfield({
                autocomplete: {
                    source: [{!! $skill !!}],
                    delay: 100
                },
                showAutocompleteOnFocus: true
            });
        });
    </script>
@endpush
