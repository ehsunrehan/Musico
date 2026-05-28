@extends('weblayout.adminlayout')
@section('content1')

<div class="container mt-5">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h1 class="mb-4 text-center">All Videos</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Artist</th>
                            <th>Year</th>
                            <th>Video</th>
                            <th>Album</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($videos as $v)
                        <tr>
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->title }}</td>
                            <td>{{ $v->artist }}</td>
                            <td>{{ $v->year }}</td>
                            <td>
                                <video width="200" controls>
                                    <source src="{{ asset($v->video) }}" type="video/mp4">
                                </video>
                            </td>
                            <td>{{ $v->category }}</td>
                            <td>
                                @if($v->image)
                                    <img src="{{ asset($v->image) }}" width="50" height="50" style="object-fit: cover; border-radius: 5px;">
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-danger"><a href="{{ url('/delete_video', $v->id) }}" class="text-dark">Delete</a></button>
                                <button class="btn btn-warning"><a href="{{ url('/edit_video', $v->id) }}" class="text-dark">Edit</a></button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection