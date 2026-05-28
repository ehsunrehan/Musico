<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\musics;   
use App\Models\Videos;
use App\Models\Bookmark;
use App\Models\Contact;
use App\Models\Review;
use App\Models\Rating;

class WebController extends Controller
{
    public function about()
    {
        return view('user.about');
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function index()
    {
        $latestMusics = musics::orderBy('id', 'desc')->limit(6)->get();
        $latestVideos = Videos::orderBy('id', 'desc')->limit(3)->get();
        $featuredArtists = musics::select('artist_name')->distinct()->limit(8)->get();
        return view('user.index', compact('latestMusics', 'latestVideos', 'featuredArtists'));
    }

    public function allMusic(Request $request)
    {
        $query = musics::query();
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('artist_name', 'like', '%' . $request->search . '%');
        }
        if ($request->artist) {
            $query->where('artist_name', $request->artist);
        }
        $musics = $query->orderBy('id', 'desc')->paginate(10);
        $artists = musics::select('artist_name')->distinct()->get();

        $bookmarkedIds = [];
        if (Auth::check()) {
            $bookmarkedIds = Auth::user()->bookmarkedMusics()->pluck('music_id')->toArray();
        }

        $userRatings = [];
        if (Auth::check()) {
        $userRatings = Rating::where('user_id', Auth::id())->pluck('rating', 'music_id')->toArray();
        }

        return view('user.all_musics', compact('musics', 'artists', 'bookmarkedIds', 'userRatings'));
    }

    public function allVideos(Request $request)
    {
        $query = Videos::query();
        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('artist', 'like', '%' . $request->search . '%');
        }
        $videos = $query->orderBy('id', 'desc')->paginate(9);
        return view('user.all_videos', compact('videos'));
    }

    public function artist($slug)
    {
        $artistName = str_replace('-', ' ', $slug);
        $musics = musics::where('artist_name', $artistName)->get();
        $videos = Videos::where('artist', $artistName)->get();
        if ($musics->isEmpty() && $videos->isEmpty()) abort(404);
        return view('user.artist', compact('artistName', 'musics', 'videos'));
    }
public function submitContact(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'nullable|string|max:255',
        'message' => 'required|string'
    ]);


    Contact::create([
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
    ]);

    return redirect()->route('contact')->with('success', 'Thank you! We will get back to you soon.');
}

public function toggleBookmark($musicId)
{
    $user = Auth::user();
    $bookmark = Bookmark::where('user_id', $user->id)->where('music_id', $musicId)->first();

    if ($bookmark) {
        $bookmark->delete();
    } else {
        Bookmark::create(['user_id' => $user->id, 'music_id' => $musicId]);
    }

    return redirect()->back();   
}

    public function bookmarks()
    {
        $musics = Auth::user()->bookmarkedMusics()->paginate(10);
        return view('user.bookmarks', compact('musics'));
    }



// Submit rating
public function submitRating(Request $request, $id)
{
    $request->validate(['rating' => 'required|integer|min:1|max:5']);
    
    Rating::updateOrCreate(
        ['user_id' => Auth::id(), 'music_id' => $id],
        ['rating' => $request->rating]
    );
    
    return redirect()->route('music.all')->with('success', 'Thank you for rating!');
}

// Show review form
public function reviewMusic($id)
{
    $music = musics::findOrFail($id);
    $userReview = Review::where('user_id', Auth::id())->where('music_id', $id)->first();
    return view('user.review_music', compact('music', 'userReview'));
}

// Submit review
public function submitReview(Request $request, $id)
{
    $request->validate(['review' => 'required|string|min:3']);
    
    Review::updateOrCreate(
        ['user_id' => Auth::id(), 'music_id' => $id],
        ['review' => $request->review]
    );
    
    return redirect()->route('music.all')->with('success', 'Review posted!');
}

// Show all reviews (public page)
public function allReviews()
{
    $reviews = Review::with(['user', 'music'])->orderBy('id', 'desc')->paginate(10);
    return view('user.all_reviews', compact('reviews'));
}




    
}