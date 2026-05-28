@extends('weblayout.index')
@section('content')
<div class="container mt-3">
    <!-- Horizontal Search Row (same style as music page) -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="filter-row bg-dark p-3 rounded d-flex flex-wrap align-items-end gap-3">
                <!-- Search -->
                <div class="search-item" style="flex: 1; min-width: 250px;">
                    <label class="text-white mb-2 d-block" style="font-size: 1rem; font-weight: 500;">
                        <i class="fa fa-search me-2"></i> Search Videos
                    </label>
                    <form method="GET" class="d-flex gap-2">
                        <input type="text" name="search" class="form-control bg-dark text-white border-secondary" placeholder="Search by title or artist..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary px-3">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Videos Grid -->
    <div class="row">
        @foreach($videos as $video)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="video-card bg-dark rounded-3 overflow-hidden shadow-sm h-100 d-flex flex-column">
                @auth
                    <video width="100%" height="200" controls controlsList="" oncontextmenu="return false;" style="object-fit: cover;">
                        <source src="{{ asset($video->video) }}" type="video/mp4">
                    </video>
                @else
                    <div class="bg-dark text-center p-4" style="height: 200px; display: flex; align-items: center; justify-content: center; flex-direction: column;">
                        <i class="fa fa-lock fa-2x mb-2"></i>
                        <p class="small">Login to watch</p>
                        <a href="{{ route('login') }}" class="btn btn-sm btn-primary">Login</a>
                    </div>
                @endauth
                <div class="p-3 flex-grow-1">
                    <div class="d-flex">
                        @if($video->image)
                        <img src="{{ asset($video->image) }}" width="60" height="60" style="object-fit: cover; border-radius: 8px; margin-right: 12px;">
                        @endif
                        <div>
                            <h5 class="text-white fw-semibold">{{ $video->title }}</h5>
                            <p class="text-muted small mb-0">{{ $video->artist }} • {{ $video->year }}</p>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $videos->links() }}
    </div>
</div>

<style>
    .filter-row {
        background: #1a1a1a;
        border: 1px solid #2c2c2c;
        border-radius: 12px;
    }
    .form-control, .form-control:focus {
        background-color: #0f0f0f;
        border: 1px solid #3a3a3a;
        color: white;
        border-radius: 8px;
        box-shadow: none;
    }
    .btn-primary {
        background-color: #ff6a00;
        border: none;
        border-radius: 8px;
        padding: 0.375rem 1rem;
        font-weight: 500;
        transition: all 0.2s;
    }
    .btn-primary:hover {
        background-color: #e05d00;
        transform: translateY(-1px);
    }
    .video-card {
        background: #141414;
        transition: all 0.2s ease;
        border: 1px solid #2a2a2a;
    }
    .video-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.4);
        border-color: #ff6a00;
    }
</style>
@endsection