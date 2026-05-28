@extends('weblayout.index')
@section('content')
<div class="container mt-3">
    <!-- Filter & Search Row -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="filter-row bg-dark p-3 rounded d-flex flex-wrap align-items-end gap-3">
                <div class="filter-item" style="flex:1; min-width:200px;">
                    <label class="text-white mb-2 d-block"><i class="fa fa-filter me-2"></i> Filter by Artist</label>
                    <select id="artistFilter" class="form-control bg-dark text-white border-secondary" onchange="window.location.href='?artist='+this.value">
                        <option value="">All Artists</option>
                        @foreach($artists as $art)
                            <option value="{{ $art->artist_name }}" {{ request('artist') == $art->artist_name ? 'selected' : '' }}>{{ $art->artist_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="search-item" style="flex:1; min-width:250px;">
                    <label class="text-white mb-2 d-block"><i class="fa fa-search me-2"></i> Search</label>
                    <form method="GET" class="d-flex gap-2">
                        <input type="text" name="search" class="form-control bg-dark text-white border-secondary" placeholder="Song or artist..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary px-3">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Music List -->
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-white mb-3">All Music</h2>
            @foreach($musics as $music)
            <div class="music-item mb-2 p-3 bg-dark rounded">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="d-flex">
                        @if($music->image)
                            <img src="{{ asset($music->image) }}" width="60" height="60" style="object-fit: cover; border-radius: 8px; margin-right: 12px;">
                        @endif
                        <div>
                            <h5 class="text-white mb-1">{{ $music->name }}</h5>
                            <p class="text-muted small mb-0">{{ $music->artist_name }} • {{ $music->year }} • {{ $music->album ?? 'Single' }}</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-3 mt-2 mt-sm-0">
@auth
    <!-- Bookmark button -->
    <form method="POST" action="{{ route('bookmark.toggle', $music->id) }}" style="display: inline-block; margin-right: 12px;">
        @csrf
        <button type="submit" class="btn btn-link p-0 text-decoration-none" style="color: #ff6a00; font-size: 1.6rem;">
            <i class="fa {{ in_array($music->id, $bookmarkedIds) ? 'fa-bookmark' : 'fa-bookmark-o' }}"></i>
        </button>
    </form>

    <!-- Star Rating Widget -->
    @php
        $currentRating = $userRatings[$music->id] ?? 0;
    @endphp
    <form method="POST" action="{{ route('submit.rating', $music->id) }}" class="rating-form" style="display: inline-block; margin-right: 15px;">
        @csrf
        <div class="star-rating" style="display: flex; align-items: center;">
            @for($i=1; $i<=5; $i++)
                <i class="fa fa-star star-item {{ $i <= $currentRating ? 'rated' : '' }}" data-value="{{ $i }}" style="cursor: pointer; font-size: 1.4rem; color: {{ $i <= $currentRating ? '#ffc107' : '#555' }}; margin: 0 3px;"></i>
            @endfor
            <input type="hidden" name="rating" value="{{ $currentRating }}">
        </div>
    </form>

    <!-- Review button -->
    <a href="{{ route('review.music', $music->id) }}" class="btn btn-sm btn-outline-info" style="margin-right: 12px;" title="Write a review">
        <i class="fa fa-pencil"></i>
    </a>

    <!-- Audio Player -->
    <audio controls style="width: 220px; height: 38px;" controlsList="" oncontextmenu="return false;">
        <source src="{{ asset($music->music) }}" type="audio/mpeg">
    </audio>
@else
    <div class="alert alert-warning py-1 px-2 mb-0 small">
        <a href="{{ route('login') }}">Login</a> / <a href="{{ route('register') }}">Register</a>
    </div>
@endauth
                    </div>
                </div>
            </div>
            @endforeach
            <div class="d-flex justify-content-center mt-3">
                {{ $musics->links() }}
            </div>
        </div>
    </div>
</div>

<style>
    .filter-row { background: #1a1a1a; border: 1px solid #2c2c2c; border-radius: 12px; }
    .form-control, .form-control:focus { background-color: #0f0f0f; border: 1px solid #3a3a3a; color: white; border-radius: 8px; box-shadow: none; }
    .btn-primary { background-color: #ff6a00; border: none; border-radius: 8px; padding: 0.375rem 1rem; font-weight: 500; }
    .btn-primary:hover { background-color: #e05d00; }
    .music-item { background: #141414; border-left: 3px solid #ff6a00; transition: all 0.2s; }
    .music-item:hover { background: #1c1c1c; }
    .star-rating .star-item {
    transition: color 0.2s ease;
}
.star-rating .star-item:hover {
    color: #ffc107 !important;
}
.star-rating .star-item.rated {
    color: #ffc107 !important;
}
</style>

<script>
    document.querySelectorAll('.star-rating').forEach(ratingDiv => {
        const stars = ratingDiv.querySelectorAll('.star-item');
        const hiddenInput = ratingDiv.querySelector('input[name="rating"]');
        const form = ratingDiv.closest('form');

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const value = this.dataset.value;
                hiddenInput.value = value;
                form.submit();  // page refresh hoga aur rating save hogi
            });
        });
    });
</script>
@endsection