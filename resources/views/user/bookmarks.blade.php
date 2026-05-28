@extends('weblayout.index')
@section('content')
<div class="container mt-5 pt-5">
    <h1 class="text-white mb-4">My Bookmarked Songs</h1>
    @if($musics->count() > 0)
        @foreach($musics as $music)
        <div class="single_player_container mb-3 p-3 bg-dark rounded">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h4 class="text-white">{{ $music->name }}</h4>
                    <p class="text-muted">{{ $music->artist_name }} • {{ $music->year }} • {{ $music->album ?? 'Single' }}</p>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <form method="POST" action="{{ route('bookmark.toggle', $music->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-link" style="color: #dc3545; text-decoration: none;">
                            <i class="fa fa-trash"></i> Remove
                        </button>
                    </form>
                    <audio controls src="{{ asset($music->music) }}"></audio>
                </div>
            </div>
        </div>
        @endforeach
        {{ $musics->links() }}
    @else
        <div class="alert alert-info">
            No bookmarked songs. <a href="{{ route('music.all') }}" class="alert-link">Browse music</a> and click heart icon.
        </div>
    @endif
</div>
@endsection