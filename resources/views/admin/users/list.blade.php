@extends('admin.main')
@section('content')
    <table class="table table-striped" id="table1">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên Người dùng </th>
            <th>Email</th>
            <th>Ngày tham gia</th>

        </tr>
        </thead>
        <tbody>
        @foreach($users as $key => $user)
            <tr>
                <td>{{$user -> id}}</td>
                <td>{{$user -> name}}</td>
                <td>{{$user -> email}}</td>
                <td>{{$user -> created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $users->links('pagination::bootstrap-4') }}
@endsection
