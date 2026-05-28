@extends('weblayout.index')
@section('content')

<div class="container mt-5 pt-5">
    <!-- Hero About -->
    <div class="row">
        <div class="col-lg-12 text-center mb-5">
            <h1 class="text-white display-4 fw-bold">About Musico</h1>
            <p class="text-muted lead">Your ultimate destination for music and videos</p>
        </div>
    </div>

    <!-- Mission & Vision Row -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="bg-dark p-4 rounded-4 h-100 shadow">
                <div class="text-center mb-3">
                    <i class="fa fa-bullseye fa-3x" style="color: #ff6a00;"></i>
                </div>
                <h3 class="text-white text-center">Our Mission</h3>
                <p class="text-muted text-center">To provide a platform where artists can share their talent and music lovers discover new sounds. Music connects souls, and we make it accessible to everyone.</p>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="bg-dark p-4 rounded-4 h-100 shadow">
                <div class="text-center mb-3">
                    <i class="fa fa-eye fa-3x" style="color: #ff6a00;"></i>
                </div>
                <h3 class="text-white text-center">Our Vision</h3>
                <p class="text-muted text-center">To become the largest community of music creators and listeners, where every beat finds its audience. Break boundaries, discover new genres.</p>
            </div>
        </div>
    </div>

    <!-- What We Offer - 3 boxes -->
    <div class="row mt-3">
        <div class="col-md-4 mb-4">
            <div class="bg-dark p-4 rounded-4 h-100 text-center">
                <i class="fa fa-headphones fa-2x mb-3" style="color: #ff6a00;"></i>
                <h5 class="text-white">High Quality Audio</h5>
                <p class="text-muted">Stream songs in crisp quality. Upload your own tracks.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="bg-dark p-4 rounded-4 h-100 text-center">
                <i class="fa fa-video-camera fa-2x mb-3" style="color: #ff6a00;"></i>
                <h5 class="text-white">Music Videos</h5>
                <p class="text-muted">Watch exclusive music videos from emerging artists.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="bg-dark p-4 rounded-4 h-100 text-center">
                <i class="fa fa-users fa-2x mb-3" style="color: #ff6a00;"></i>
                <h5 class="text-white">Artist Community</h5>
                <p class="text-muted">Connect with artists, share feedback, grow together.</p>
            </div>
        </div>
    </div>

    <!-- Stats / Fun Facts - Dynamic -->
    @php
        use App\Models\Musics;
        use App\Models\Videos;
        $totalSongs = Musics::count();
        $totalArtists = Musics::distinct('artist_name')->count('artist_name');
        $totalVideos = Videos::count();
        // Assuming 'listeners' is not a field; we can show total plays if exists, else total users or just a placeholder
        // For now, show total users (registered) or a dynamic number
        $totalListeners = \App\Models\User::count(); // if User model exists
    @endphp
    <div class="row mt-3 bg-dark rounded-4 p-4 text-center">
        <div class="col-md-3 col-6 mb-3">
            <h2 class="text-white fw-bold">+{{ $totalSongs }}</h2>
            <p class="text-muted">Songs</p>
        </div>
        <div class="col-md-3 col-6 mb-3">
            <h2 class="text-white fw-bold">+{{ $totalArtists }}</h2>
            <p class="text-muted">Artists</p>
        </div>
        <div class="col-md-3 col-6 mb-3">
            <h2 class="text-white fw-bold">+{{ $totalVideos }}</h2>
            <p class="text-muted">Videos</p>
        </div>
        <div class="col-md-3 col-6 mb-3">
            <h2 class="text-white fw-bold">+{{ $totalListeners }}</h2>
            <p class="text-muted">Listeners</p>
        </div>
    </div>

    <!-- Gap before footer -->
    <div class="mb-5"></div>
</div>

@endsection