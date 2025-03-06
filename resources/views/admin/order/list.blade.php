@extends('admin.main')
@section('content')
    <table class="table table-striped" id="table1">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên Khách hàng </th>
            <th>Địa chỉ</th>
            <th>SĐT</th>
            <th>Ngày Đặt Hàng</th>
            <th>Option</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $key => $order)
            <tr>
                <td>{{$order -> id}}</td>
                <td>{{$order -> name}}</td>
                <td>{{$order -> address}}</td>
                <td>{{$order -> phone}}</td>
                <td>{{$order -> created_at}}</td>
                <td>
                    <a class="btn btn-primary" href="/admin/orders/detail/{{$order -> id}}">
                        Xem
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $orders->links('pagination::bootstrap-4') }}
@endsection

