@extends('weblayout.index')
@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="bg-dark p-4 rounded-4">
                <h2 class="text-white text-center">Write a Review</h2>
                <div class="mb-4 p-3 bg-secondary rounded">
                    <h4 class="text-white">{{ $music->name }}</h4>
                    <p class="text-muted">{{ $music->artist_name }} • {{ $music->year }} • {{ $music->album ?? 'Single' }}</p>
                </div>
                <form method="POST" action="{{ route('submit.review', $music->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-white">Your Review</label>
                        <textarea name="review" rows="6" class="form-control bg-secondary text-white" required placeholder="Share your thoughts...">{{ isset($userReview) ? $userReview->review : '' }}</textarea>
                    </div>
                    <div class="text-center">
                       <button type="submit" class="btn px-5 py-2" style="background: linear-gradient(135deg, #ff6a00, #ee0979); border: none; color: white; font-weight: 600; border-radius: 8px;">Submit Review</button>
                        <a href="{{ route('music.all') }}" class="btn btn-secondary ms-2">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .btn-primary-custom {
        background: linear-gradient(135deg, #ff6a00, #ee0979) !important;
        border: none !important;
        color: white !important;
        font-weight: 600 !important;
        transition: 0.3s !important;
        border-radius: 8px !important;
    }
    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(238,9,121,0.4);
        color: white;
    }
    .btn-secondary {
        background-color: #6c757d;
        border: none;
        color: white;
        border-radius: 8px;
    }
    .btn-secondary:hover {
        background-color: #5a6268;
    }


</style>
@endpush