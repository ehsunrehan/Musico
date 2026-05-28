@extends('weblayout.adminlayout')
@section('content1')
<div class="container mt-5">
    <div class="bg-secondary rounded p-4">
        <h1 class="text-center">All Reviews</h1>
        <table class="table">
            <thead>
                <tr><th>ID</th><th>User</th><th>Music</th><th>Review</th><th>Date</th></tr>
            </thead>
            <tbody>
                @foreach($reviews as $r)
                <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->user->name ?? 'N/A' }}</td>
                    <td>{{ $r->music->name ?? 'N/A' }}</td>
                    <td>{{ $r->review }}</td>
                    <td>{{ $r->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $reviews->links() }}
    </div>
</div>
@endsection