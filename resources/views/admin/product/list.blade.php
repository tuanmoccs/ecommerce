@extends('admin.main')
@section('content')
    <table class="table table-striped" id="table1">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên Sản phẩm </th>
            <th>Danh mục</th>
            <th>Giá gốc</th>
            <th>Giá bán</th>
            <th>Mô tả</th>
{{--            <th>Thông số</th>--}}
            <th>Active</th>
            <th>Option</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $key => $product)
            <tr>
                <td>{{$product -> id}}</td>
                <td>{{$product -> name}}</td>
                <td>{{$product -> menu -> name}}</td>
                <td>{{$product -> price}}</td>
                <td>{{$product -> price_sale}}</td>
                <td style = " max-height: 60px;overflow: hidden;display: -webkit-box;
                -webkit-line-clamp: 5;-webkit-box-orient: vertical;">{{$product -> description}}</td>
{{--                <td style = "max-height: 60px;overflow: hidden;display: -webkit-box;--}}
{{--                -webkit-line-clamp: 5;-webkit-box-orient: vertical;">{{}}</td>--}}
                <td>{!!\App\Helper\Helper::active($product -> active)!!}</td>
                <td>
                    <a class="btn btn-primary" href="/admin/product/edit/{{$product -> id}}">
                        <i class="fa-solid fa-wrench"></i>
                    </a>
                    <a class="btn btn-danger" href="#"
                       onclick="removeRow({{$product -> id}}, '/admin/product/destroy')">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $products->links('pagination::bootstrap-4') }}
@endsection
