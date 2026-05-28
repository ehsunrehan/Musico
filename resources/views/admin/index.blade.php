@extends('weblayout.adminlayout')
@section('content1')

<!-- Stats Cards Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-music fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Musics</p>
                    <h6 class="mb-0">{{ \App\Models\Musics::count() }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-microphone fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Artists</p>
                    <h6 class="mb-0">{{ \App\Models\Musics::distinct('artist_name')->count('artist_name') }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-album fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Albums</p>
                    <h6 class="mb-0">{{ \App\Models\Musics::whereNotNull('album')->distinct('album')->count('album') }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-calendar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Years</p>
                    <h6 class="mb-0">{{ \App\Models\Musics::distinct('year')->count('year') }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Stats Cards End -->

<!-- Recently Added Musics Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Recently Added Musics</h6>
            <a href="{{ url('/all_musics') }}">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Artist</th>
                        <th>Year</th>
                        <th>Album</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $recentMusics = \App\Models\Musics::orderBy('id', 'desc')->limit(5)->get();
                    @endphp
                    @foreach($recentMusics as $music)
                    <tr>
                        <td>{{ $music->id }}</td>
                        <td>{{ $music->name }}</td>
                        <td>{{ $music->artist_name }}</td>
                        <td>{{ $music->year }}</td>
                        <td>{{ $music->album ?? '-' }}</td>
                        <td><a class="btn btn-sm btn-primary" href="{{ url('/all_musics') }}">View</a></td>
                    </tr>
                    @endforeach
                    @if($recentMusics->count() == 0)
                    <tr><td colspan="6" class="text-center">No music added yet.</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Recently Added Musics End -->

<!-- Recently Added Videos Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Recently Added Videos</h6>
            <a href="{{ url('/all_videos') }}">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Artist</th>
                        <th>Year</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $recentVideos = \App\Models\Videos::orderBy('id', 'desc')->limit(5)->get();
                    @endphp
                    @foreach($recentVideos as $video)
                    <tr>
                        <td>{{ $video->id }}</td>
                        <td>{{ $video->title }}</td>
                        <td>{{ $video->artist ?? '-' }}</td>
                        <td>{{ $video->year ?? '-' }}</td>
                        <td>{{ $video->category ?? '-' }}</td>
                        <td><a class="btn btn-sm btn-primary" href="{{ url('/all_videos') }}">View</a></td>
                    </tr>
                    @endforeach
                    @if($recentVideos->count() == 0)
                    <tr><td colspan="6" class="text-center">No videos added yet.</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Recently Added Videos End -->

@endsection