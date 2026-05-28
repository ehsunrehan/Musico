
@extends('weblayout.adminlayout')
@section('content1')
   <div class="container-fluid pt-4 px-4">
          <div class="row g-4">
  
  
  <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h1 class="mb-4 text-center">Add video</h1>
                            <form method="post" action="/Add_video_data" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Artist</label>
                                    <input type="text" name="artist" class="form-control" id="">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Year</label>
                                    <input type="text" name="year" class="form-control" id="">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Video</label>
                                    <input type="file" name="video" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Category</label>
                                    <input type="text" name="category" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Cover Image (JPG, PNG)</label>
                                    <input type="file" name="image" class="form-control" accept="image/*">
                                </div>
                               
                                <button  class="btn btn-primary">Add_Video</button>
                            </form>
                        </div>
                    </div>


     @endsection