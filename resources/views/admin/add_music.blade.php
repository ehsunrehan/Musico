
@extends('weblayout.adminlayout')
@section('content1')
   <div class="container-fluid pt-4 px-4">
          <div class="row g-4">
  
  
  <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h1 class="mb-4 text-center">Add Music</h1>
                            @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                            <form method="post" action="/Add_music_data" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Artist Name</label>
                                    <input type="text" name="artist_name" class="form-control" id="">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Year</label>
                                    <input type="text" name="year" class="form-control" id="">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Music</label>
                                    <input type="file" name="music" class="form-control" id="exampleInputPassword1">
                                </div>
                                 <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Language</label>
                                    <input type="text" name="language" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Album</label>
                                    <input type="text" name="album" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Cover Image (JPG, PNG)</label>
                                    <input type="file" name="image" class="form-control" accept="image/*">
                                </div>
                               
                                <button  class="btn btn-primary">Add_Music</button>
                            </form>
                        </div>
                    </div>


     @endsection