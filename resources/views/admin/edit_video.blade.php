@extends('weblayout.adminlayout')
@section('content1')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h1 class="mb-4 text-center">Edit Video</h1>
                <form method="post" action="{{ url('/update_video', $video->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $video->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Artist</label>
                        <input type="text" name="artist" class="form-control" value="{{ $video->artist }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Year</label>
                        <input type="text" name="year" class="form-control" value="{{ $video->year }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" name="category" class="form-control" value="{{ $video->category }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Video File (MP4)</label>
                        <input type="file" name="video" class="form-control" accept="video/*">
                        <small class="text-muted">Current: {{ basename($video->video) }}</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cover Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        @if($video->image)
                            <div class="mt-2">
                            <small class="text-muted">Current:</small>
                            <img src="{{ asset($video->image) }}" width="60" height="60" style="object-fit: cover;">
                            </div>
                        @endif
                    </div>
                    <button class="btn btn-primary">Update Video</button>
                    <a href="{{ url('/all_videos') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection