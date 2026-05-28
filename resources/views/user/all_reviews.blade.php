@extends('weblayout.index')
@section('content')
<div class="container mt-5 pt-5">
    <h1 class="text-white mb-4">All User Reviews</h1>
    @forelse($reviews as $review)
    <div class="bg-dark p-3 rounded-3 mb-3">
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <h5 class="text-white">{{ $review->music->name ?? 'Unknown' }}</h5>
                <p class="text-muted small">by {{ $review->music->artist_name ?? 'Unknown' }}</p>
                <p class="text-white-50">{{ $review->review }}</p>
            </div>
            <div class="text-end">
                <small class="text-muted">Reviewed by {{ $review->user->name ?? 'Anonymous' }}</small><br>
                <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
            </div>
        </div>
    </div>
    @empty
    <div class="alert alert-info">No reviews yet. Be the first to write one!</div>
    @endforelse
    {{ $reviews->links() }}
</div>
@endsection