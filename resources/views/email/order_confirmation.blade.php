<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    @include('head')
</head>
<body>
<section class="order_details section_gap">
    <div class="container">
        <h3 class="title_confirmation">Cảm ơn bạn đã ủng hộ.</h3>
        <div class="row order_d_inner">
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>Thông tin đơn hàng</h4>
                    <ul class="list">
                        <li><a href="#"><span>Mã Đơn Hàng</span> : {{$order->id}}</a></li>
                        <li><a href="#"><span>Ngày Đặt Hàng</span> : {{$order->created_at}}</a></li>
                        <li><a href="#"><span>Tổng Tiền</span> : {{number_format($order->total)}}</a></li>
                        <li><a href="#"><span>Phương Thức Thanh Toán</span> : Thanh Toán Khi Nhận Hàng</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>Thông tin khách hàng</h4>
                    <ul class="list">
                        <li><a href="#"><span>Tên Khách Hàng</span> : {{$order->name}}</a></li>
                        <li><a href="#"><span>Địa Chỉ</span> : {{$order->address}}</a></li>
                        <li><a href="#"><span>Số Điện Thoại</span> : {{$order->phone}}</a></li>
                        <li><a href="#"><span>Email </span> : {{$order->email}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="order_details_table">
            <h2>Order Details</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->OrderDetail as $detail)
                        @php
                            $priceend = $detail->product->price_sale * $detail->quantity
                        @endphp
                        <tr>
                            <td>
                                <p>{{$detail->product->name}}</p>
                            </td>
                            <td>
                                <h5>{{$detail->quantity}}</h5>
                            </td>
                            <td>
                                <p>{{number_format($priceend)}}</p>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>
                            <h4>Tổng Tiền</h4>
                        </td>
                        <td>
                            <h5></h5>
                        </td>
                        <td>
                            <p>{{number_format($order->total)}}</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
</body>

</html>
