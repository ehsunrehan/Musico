@extends('weblayout.adminlayout')
@section('content1')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h1 class="mb-4 text-center">Edit Music</h1>
                <form method="post" action="{{ url('/update_music', $music->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $music->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Artist Name</label>
                        <input type="text" name="artist_name" class="form-control" value="{{ $music->artist_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Year</label>
                        <input type="text" name="year" class="form-control" value="{{ $music->year }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Language</label>
                        <input type="text" name="language" class="form-control" value="{{ $music->language }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Album</label>
                        <input type="text" name="album" class="form-control" value="{{ $music->album }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Music File (MP3)</label>
                        <input type="file" name="music" class="form-control" accept="audio/*">
                        <small class="text-muted">Current: {{ basename($music->music) }}</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cover Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        @if($music->image)
                            <div class="mt-2">
                                <small class="text-muted">Current:</small>
                                <img src="{{ asset($music->image) }}" width="60" height="60" style="object-fit: cover;">
                            </div>
                        @endif
                    </div>

                    <button class="btn btn-primary">Update Music</button>
                    <a href="{{ url('/all_musics') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection