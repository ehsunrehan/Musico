@extends('weblayout.adminlayout')
@section('content1')
<div class="container mt-5">
    <div class="bg-secondary rounded p-4">
        <h1 class="text-center">All Ratings</h1>
        <table class="table">
            <thead><tr><th>ID</th><th>User</th><th>Music</th><th>Rating</th><th>Date</th></tr></thead>
            <tbody>
                @foreach($ratings as $r)
                <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->user->name }}</td>
                    <td>{{ $r->music->name }}</td>
                    <td>{{ $r->rating }} ★</td>
                    <td>{{ $r->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $ratings->links() }}
    </div>
</div>
@endsection