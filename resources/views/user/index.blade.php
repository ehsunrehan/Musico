@extends('weblayout.index')
@section('content')

<!-- Hero Section -->
<section class="hero spad set-bg" data-setbg="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=1920&h=800&fit=crop">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero__text">
                    <span>Welcome to Musico</span>
                    <h1>Feel the heart beats</h1>
                    <p>Thousands of songs & videos from your favorite artists.<br>Stream now!</p>
                    <a href="{{ route('music.all') }}" class="primary-btn">Explore Music</a>
                </div>
            </div>
        </div>
    </div>
    <div class="linear__icon">
        <i class="fa fa-angle-double-down"></i>
    </div>
</section>

<!-- About Section (static) -->
<section class="about spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about__pic">
                    <img src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=500&h=400&fit=crop" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about__text">
                    <div class="section-title">
                        <h2>Ahsun Rehan</h2>
                        <h1>About me</h1>
                    </div>
                    <p>Knows how to move your mind, body and soul by delivering tracks that stand out
                        from the norm. As if this impressive succession of high impact, floor-filling bombs wasn’t
                        enough to sustain.</p>
                    <a href="{{url('./contact')}}" class="primary-btn">CONTACT ME</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== LATEST TRACKS (compact layout + right side image) ========== -->
<section class="track spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="section-title">
                    <h2>Latest tracks</h2>
                    <h1>Music podcast</h1>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="track__all">
                    <a href="{{ route('music.all') }}" class="primary-btn border-btn">View all tracks</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 p-0">
                <div class="track__content nice-scroll">
                    @foreach($latestMusics as $music)
                    <div class="single_player_container mb-2 p-2 bg-dark rounded" style="border-left: 3px solid #ff6a00;">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-3">
                                @if($music->image)
                                    <img src="{{ asset($music->image) }}" width="45" height="45"  class="me-2" style="object-fit: cover; border-radius: 6px;">
                                @endif
                                <div>
                                    <h5 class="text-white" style="font-size: 1rem; margin-bottom: 10px;">{{ $music->name }}</h5>
                                    <p class="text-muted small mb-0">{{ $music->artist_name }} • {{ $music->year }} • {{ $music->album ?? 'Single' }}</p>
                                </div>
                            </div>
                            <div>
                                @auth
                                    <audio controls style="width: 180px; height: 32px;" controlsList="" oncontextmenu="return false;">
                                        <source src="{{ asset($music->music) }}" type="audio/mpeg">
                                    </audio>
                                @else
                                    <div class="alert alert-warning py-0 px-2 mb-0 small text-center">
                                        🔒 <a href="{{ route('login') }}">Login</a> to play
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 p-0">
                <div class="track__pic">
                    <img src="https://images.unsplash.com/photo-1470225620780-dba8ba36b745?w=400&h=500&fit=crop" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== TOP CHARTS (no numbering, latest 4 only, clean, better spacing) ========== -->
<div class="container my-4">
    <div class="section-title text-center">
        <h2>Trending Now</h2>
        <h1>Top Charts</h1>
    </div>
    <div class="row g-3">
        @php
            $topCharts = \App\Models\musics::orderBy('id', 'desc')->take(4)->get();
        @endphp
        @foreach($topCharts as $music)
        <div class="col-md-6">
            <div class="music-item p-2 bg-dark rounded d-flex justify-content-between align-items-center gap-3" style="border-left: 3px solid #ff6a00;">
                <div class="d-flex align-items-center gap-3">
                    @if($music->image)
                        <img src="{{ asset($music->image) }}" width="50" height="50" class="me-2" style="object-fit: cover; border-radius: 8px;">
                    @endif
                    <div>
                        <h5 class="text-white" style="margin-bottom: 8px;">{{ $music->name }}</h5>
                        <small class="text-muted">{{ $music->artist_name }}</small>
                    </div>
                </div>
                <div>
                    @auth
                        <audio controls style="width: 140px; height: 32px;" controlsList="nodownload noplaybackrate" oncontextmenu="return false;">
                            <source src="{{ asset($music->music) }}" type="audio/mpeg">
                        </audio>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-light">Play</a>
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- ========== MUSIC GENRES (icons fixed, color orange) ========== -->
<div class="container my-5">
    <div class="section-title text-center">
        <h2>Explore</h2>
        <h1>Music Genres</h1>
    </div>
    <div class="row g-3 justify-content-center">
    <div class="col-6 col-md-2"><div class="genre-card text-center p-3 bg-dark rounded-3"><i class="fa fa-headphones fa-2x" style="color:#ff6a00;"></i><h6 class="mt-2">Pop</h6></div></div>
    <div class="col-6 col-md-2"><div class="genre-card text-center p-3 bg-dark rounded-3"><i class="fa fa-music fa-2x" style="color:#ff6a00;"></i><h6 class="mt-2">Hip Hop</h6></div></div>
    <div class="col-6 col-md-2"><div class="genre-card text-center p-3 bg-dark rounded-3"><i class="fa fa-microphone fa-2x" style="color:#ff6a00;"></i><h6 class="mt-2">Jazz</h6></div></div>
    <div class="col-6 col-md-2"><div class="genre-card text-center p-3 bg-dark rounded-3"><i class="fa fa-bolt fa-2x" style="color:#ff6a00;"></i><h6 class="mt-2">Electronic</h6></div></div>
    <div class="col-6 col-md-2"><div class="genre-card text-center p-3 bg-dark rounded-3"><i class="fa fa-heart fa-2x" style="color:#ff6a00;"></i><h6 class="mt-2">Indie</h6></div></div>
</div>
</div>

<!-- Latest Videos Section (compact + images) -->
<section class="youtube spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Latest Videos</h2>
                    <h1>Latest videos</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($latestVideos as $video)
            <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                <div class="video-card bg-dark rounded-3 overflow-hidden h-100">
                    <div style="position: relative;">
                        @auth
                            <video width="100%" height="200" controls>
                                <source src="{{ asset($video->video) }}" type="video/mp4">
                            </video>
                            <!-- <video width="100%" height="200" controls style="object-fit:cover;">
                                <source src="{{ asset($video->video) }}" type="video/mp4">
                            </video> -->
                        @else
                            <div class="bg-dark text-center p-4" style="height: 200px; display: flex; align-items: center; justify-content: center; flex-direction: column;">
                                <i class="fa fa-lock fa-2x mb-2"></i>
                                <p class="small">Login to watch</p>
                                <a href="{{ route('login') }}" class="btn btn-sm btn-primary">Login</a>
                            </div>
                        @endauth
                    </div>
                    <div class="p-3">
                        <div class="d-flex gap-2">
                            @if($video->image)
                                <img src="{{ asset($video->image) }}" width="45" height="45" class="me-2" style="object-fit: cover; border-radius: 6px;">
                            @endif
                            <div>
                                <h5 class="text-white fw-semibold">{{ $video->title }}</h5>
                                <p class="text-muted small ">{{ $video->artist }} • {{ $video->year }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('video.all') }}" class="primary-btn">View All Videos</a>
        </div>
    </div>
</section>

<!-- Testimonials -->
<div class="container my-5">
    <div class="section-title text-center">
        <h2>Listeners Love Us</h2>
        <h1>Testimonials</h1>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3"><div class="bg-dark p-3 rounded-3 text-center"><i class="fa fa-quote-left fa-2x" style="color:#ff6a00;"></i><p class="mt-2">Best platform to discover indie artists!</p><h6>— Sarah K.</h6></div></div>
        <div class="col-md-4 mb-3"><div class="bg-dark p-3 rounded-3 text-center"><i class="fa fa-quote-left fa-2x" style="color:#ff6a00;"></i><p class="mt-2">Uploading tracks was super easy. Gained many new fans.</p><h6>— Mike T.</h6></div></div>
        <div class="col-md-4 mb-3"><div class="bg-dark p-3 rounded-3 text-center"><i class="fa fa-quote-left fa-2x" style="color:#ff6a00;"></i><p class="mt-2">No annoying ads, clean UI, great audio quality.</p><h6>— Jessica L.</h6></div></div>
    </div>
</div>

<!-- Blog Section -->
<div class="container my-5">
    <div class="section-title text-center">
        <h2>From Our Blog</h2>
        <h1>Latest News</h1>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3"><div class="bg-dark rounded-3 overflow-hidden"><div style="height:160px; background:url('https://images.unsplash.com/photo-1511379938547-c1f69419868d?w=400&h=200&fit=crop') center/cover;"></div><div style="color:white;" class="p-3"><h5 style="color:white;">5 Tips for New Artists</h5><a href="#" class="btn btn-sm btn-outline-light">Read More</a></div></div></div>
        <div class="col-md-4 mb-3"><div class="bg-dark rounded-3 overflow-hidden"><div style="height:160px; background:url('https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?w=400&h=200&fit=crop') center/cover;"></div><div class="p-3" style="color:white;"><h5 style="color:white;">Summer Playlist 2026</h5 style="color:white;"><a href="#" class="btn btn-sm btn-outline-light">Read More</a></div></div></div>
        <div class="col-md-4 mb-3"><div class="bg-dark rounded-3 overflow-hidden"><div style="height:160px; background:url('https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?w=400&h=200&fit=crop') center/cover;"></div><div class="p-3" style="color:white;"><h5 style="color:white;">Interview: DJ Rainflow</h5><a href="#" class="btn btn-sm btn-outline-light">Read More</a></div></div></div>
    </div>
</div>

<style>

    .music-item, .single_player_container {
        background: #141414;
        transition: all 0.2s;
    }
    .music-item:hover, .single_player_container:hover {
        background: #1c1c1c;
        transform: translateX(2px);
    }
    .genre-card, .video-card {
        transition: transform 0.2s, border-color 0.2s;
        cursor: pointer;
    }
    .genre-card:hover, .video-card:hover {
        transform: translateY(-3px);
        border-color: #ff6a00;
    }
    .video-card {
        border: 1px solid #2a2a2a;
    }
    .track__content {
        max-height: 500px;
        overflow-y: auto;
        padding-right: 10px;
    }
    .nice-scroll::-webkit-scrollbar {
        width: 5px;
    }
    .nice-scroll::-webkit-scrollbar-track {
        background: #2a2a2a;
    }
    .nice-scroll::-webkit-scrollbar-thumb {
        background: #ff6a00;
    }
</style>

<div class="mb-5"></div>
@endsection