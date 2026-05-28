@extends('weblayout.adminlayout')
@section('content1')

<div class="container mt-5">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h1 class="mb-4 text-center">All Users</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>   
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Registered On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $u)
                        <tr>
                            <td>{{ $loop->iteration }}</td>   <!-- 1,2,3... -->
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>
                                @if($u->user_role == 0) Normal User
                                @elseif($u->user_role == 1) Author
                                @else Admin @endif
                            </td>
                            <td>{{ $u->created_at->format('d M Y') }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $u->id }})">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(id) {
    if(confirm('Delete user permanently? All their data will be removed.')) {
        window.location.href = '/delete_user/' + id;
    }
}
</script>

@endsection