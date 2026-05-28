<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\musics;
use App\Models\videos;
use App\Models\Rating;
use App\Models\Review;

use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
                //musics
    function Add_music(){
        return view('admin.add_music'); 
    }

function Add_music_data(Request $res){
    // Validation
    $res->validate([
        'name' => 'required',
        'artist_name' => 'required',
        'year' => 'nullable|digits:4',
        'music' => 'required|file|mimes:mp3,wav,ogg|max:20480',
        'language' => 'nullable',
        'album' => 'nullable'
    ], [
        'music.required' => 'Please select a music file',
        'music.mimes' => 'Only MP3, WAV, OGG files allowed',
        'music.max' => 'File size must be less than 20MB'
    ]);

    // File upload
    $file = $res->file('music');
    $filename = time() . '_' . $file->getClientOriginalName();
    $destination = public_path('upload_music/');

    // Create folder if not exists
    if (!file_exists($destination)) {
        mkdir($destination, 0777, true);
    }

    // Move file
    $file->move($destination, $filename);

    // Save to database
    $music = new musics();
    $music->name = $res->name;
    $music->artist_name = $res->artist_name;
    $music->year = $res->year;
    $music->music = 'upload_music/' . $filename;
    $music->language = $res->language;
    $music->album = $res->album;


    if ($res->hasFile('image')) {
    $img = $res->file('image');
    $imgName = time() . '_img.' . $img->getClientOriginalExtension();
    $img->move(public_path('upload_music_images/'), $imgName);
    $music->image = 'upload_music_images/' . $imgName;
    }

    
    if($music->save()){
        return redirect('/Add_music')->with('success', 'Music added successfully!');
    } else {
        return redirect()->back()->with('error', 'Database error!');
    }
}    

    function all_musics(){
        $user = musics::all();
        return view('admin.all_musics' , compact('user'));
    }








                    //videos 

    function Add_video(){
        return view('admin.add_video');
    }

    function Add_video_data(Request $req){
        $req->validate(['video' => 'required|mimes:mp4,mov,avi,ogg|max:20480']);

        $video = new videos();

        $file = $req->file('video');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('upload_videos/'), $filename);
        $video->video = 'upload_videos/' . $filename;

        $video->title = $req->title;
        $video->artist = $req->artist;
        $video->year = $req->year;
        $video->category = $req->category;

        if ($req->hasFile('image')) {
            $img = $req->file('image');
            $imgName = time() . '_img.' . $img->getClientOriginalExtension();
            $img->move(public_path('upload_video_images/'), $imgName);
            $video->image = 'upload_video_images/' . $imgName;
        }

        $video->save();

        return redirect('/Add_video');
    }

    function all_videos(){
        $videos = videos::all();  
        return view('admin.all_videos', compact('videos'));
    }




                    // all users

public function all_users()
{
    $users = User::where('user_role', 0)->get();
    return view('admin.all_users', compact('users'));
}

public function delete_user($id)
{
    $user = User::find($id);
    if($user) {
        $user->delete();
    }
    return redirect()->back()->with('success', 'User deleted');
}













        // Delete music
    public function delete_music($id)
    {
        $music = musics::find($id);
        if ($music) {
            if (file_exists(public_path($music->music))) {
                unlink(public_path($music->music));
            }
            $music->delete();
        }
        return redirect()->back()->with('success', 'Music deleted successfully');
    }

        // Show edit music 
    public function edit_music($id)
    {
        $music = musics::find($id);
        return view('admin.edit_music', compact('music'));
    }

        // Update music 
   public function update_music($id, Request $req)
{
    $music = musics::find($id);

    // Update music file
    if ($req->hasFile('music')) {
        if (file_exists(public_path($music->music))) {
            unlink(public_path($music->music));
        }
        $file = $req->file('music');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('upload_music/'), $filename);
        $music->music = 'upload_music/' . $filename;
    }

    if ($req->hasFile('image')) {
        if ($music->image && file_exists(public_path($music->image))) {
            unlink(public_path($music->image));
        }
        $img = $req->file('image');
        $imgName = time() . '_img.' . $img->getClientOriginalExtension();
        $img->move(public_path('upload_music_images/'), $imgName);
        $music->image = 'upload_music_images/' . $imgName;
    }

    $music->name = $req->name;
    $music->artist_name = $req->artist_name;
    $music->year = $req->year;
    $music->album = $req->album;
    $music->language = $req->language;
    $music->save();

    return redirect('/all_musics')->with('success', 'Music updated successfully');
}







        // Delete video
public function delete_video($id)
{
    $video = videos::find($id);
    if ($video) {
        if (file_exists(public_path($video->video))) {
            unlink(public_path($video->video));
        }
        $video->delete();
    }
    return redirect()->back()->with('success', 'Video deleted successfully');
}

// Show edit video 
public function edit_video($id)
{
    $video = videos::find($id);
    return view('admin.edit_video', compact('video'));
}

public function update_video($id, Request $req)
{
    $video = videos::find($id);

    if ($req->hasFile('video')) {
        if (file_exists(public_path($video->video))) {
            unlink(public_path($video->video));
        }
        $file = $req->file('video');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('upload_videos/'), $filename);
        $video->video = 'upload_videos/' . $filename;
    }

   
    if ($req->hasFile('image')) {
        if ($video->image && file_exists(public_path($video->image))) {
            unlink(public_path($video->image));
        }
        $img = $req->file('image');
        $imgName = time() . '_img.' . $img->getClientOriginalExtension();
        $img->move(public_path('upload_video_images/'), $imgName);
        $video->image = 'upload_video_images/' . $imgName;
    }

    $video->title = $req->title;
    $video->artist = $req->artist;
    $video->year = $req->year;
    $video->category = $req->category;
    $video->save();

    return redirect('/all_videos')->with('success', 'Video updated successfully');
}





// For All Ratings
public function all_ratings()
{
    $ratings = Rating::with(['user', 'music'])->paginate(20);
    return view('admin.all_ratings', compact('ratings')); 
}

// For All Reviews
public function all_reviews_admin()
{
    $reviews = Review::with(['user', 'music'])->paginate(20);
    return view('admin.all_reviews_admin', compact('reviews'));  
}




}




    
