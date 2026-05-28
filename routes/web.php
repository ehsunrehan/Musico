<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\musics;
use App\Models\videos;


//normal pages Routing
Route::get('/', [WebController::class, 'index']);
Route::get('/about', [WebController::class, 'about'])->name('about');
Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::post('/contact-submit', [WebController::class, 'submitContact'])->name('contact.submit');

//normal pages Routing 
Route::get('/music', [WebController::class, 'allMusic'])->name('music.all');
Route::get('/video', [WebController::class, 'allVideos'])->name('video.all');
Route::get('/artist/{slug}', [WebController::class, 'artist'])->name('artist.show');

//Music Routing Admin
Route::get('/Add_music' , [AdminController :: class , 'Add_music']);
Route::post('/Add_music_data' ,[AdminController :: class , 'Add_music_data']);
Route::get('/all_musics' , [AdminController :: class , 'all_musics']);

//Video Routing Admin
Route::get('/Add_video', [AdminController::class, 'Add_video']);
Route::post('/Add_video_data', [AdminController::class, 'Add_video_data']);
Route::get('/all_videos', [AdminController::class, 'all_videos']);


// Music delete/edit Routing
Route::get('/delete_music/{id}', [AdminController::class, 'delete_music'])->name('delete.music');
Route::get('/edit_music/{id}', [AdminController::class, 'edit_music'])->name('edit.music');
Route::post('/update_music/{id}', [AdminController::class, 'update_music'])->name('update.music');


// Video delete/edit Routing
Route::get('/delete_video/{id}', [AdminController::class, 'delete_video'])->name('delete.video');
Route::get('/edit_video/{id}', [AdminController::class, 'edit_video'])->name('edit.video');
Route::post('/update_video/{id}', [AdminController::class, 'update_video'])->name('update.video');



// All Users Routing
Route::get('/all_users', [AdminController::class, 'all_users'])->name('all_users');
Route::get('/delete_user/{id}', [AdminController::class, 'delete_user']);


//bookmark routing 
Route::post('/bookmark/{musicId}', [WebController::class, 'toggleBookmark'])->middleware('auth')->name('bookmark.toggle');
Route::get('/bookmarks', [WebController::class, 'bookmarks'])->middleware('auth')->name('bookmarks');



// Rating & Review routes (user)
Route::post('/submit-rating/{id}', [WebController::class, 'submitRating'])->middleware('auth')->name('submit.rating');
Route::get('/review-music/{id}', [WebController::class, 'reviewMusic'])->middleware('auth')->name('review.music');
Route::post('/submit-review/{id}', [WebController::class, 'submitReview'])->middleware('auth')->name('submit.review');
Route::get('/all-reviews', [WebController::class, 'allReviews'])->name('all.reviews'); 

// All reviews show user Routing
Route::get('/reviews', [WebController::class, 'allReviews'])->name('all.reviews');


// Admin review Routing
Route::get('/admin/ratings', [AdminController::class, 'all_ratings'])->name('admin.ratings');
Route::get('/admin/reviews', [AdminController::class, 'all_reviews_admin'])->name('admin.reviews');



    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
       Route::get('/dashboard', function () {
            if(Auth::id()){
                if(Auth::User()->user_role == "0"){
                    $latestMusics = musics::orderBy('id', 'desc')->limit(6)->get();
                    $latestVideos = videos::orderBy('id', 'desc')->limit(3)->get();
                    $featuredArtists = musics::select('artist_name')->distinct()->limit(8)->get();
                    return view('user.index', compact('latestMusics', 'latestVideos', 'featuredArtists'));
                }else{
                    return view('admin.index');
                }
            }
            else{
                return redirect()->back();
            }
        })->name('dashboard');
        });
