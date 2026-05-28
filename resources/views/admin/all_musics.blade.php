    @extends('weblayout.adminlayout')
    @section('content1')


    <div class="container mt-5">
        <div class="col-12">
                            <div class="bg-secondary rounded h-100 p-4">
                                <h1 class="mb-4 text-center">All_Musics</h1>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col"> Name</th>
                                            
                                                <th scope="col">Artist Name</th>
                                                <th scope="col">Year</th>
                                                <th scope="col">Music</th>
                                                <th scope="col">Language</th>
                                                <th scope="col">Album</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Action</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            @foreach($user as $u)
                                    
                                            <tr>
                                                <td>{{$u -> id}}</td>
                                                <td>{{$u-> name}}</td>
                                                <td>{{$u -> artist_name}}</td>
                                                <td>{{$u -> year}}</td>
                                                <td><audio controls><source src="{{ asset($u->music) }}" type="audio/mpeg"></audio></td>
                                                <td>{{$u -> language}}</td>
                                                <td>{{$u -> album}}</td>
                                                <td>
                                                    @if($u->image)
                                                        <img src="{{ asset($u->image) }}" width="50" height="50" style="object-fit: cover; border-radius: 5px;">
                                                    @else
                                                        <span class="text-muted">—</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger"><a href="{{ url('/delete_music', $u->id) }}" class="text-dark">Delete</a></button>
                                                    <button class="btn btn-warning"><a href="{{ url('/edit_music', $u->id) }}" class="text-dark">Edit</a></button>
                                                </td>
                                            </tr>
    
                                            @endforeach
                                        
                                        
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

    </div>

    @endsection