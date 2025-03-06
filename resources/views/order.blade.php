<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    @include('head')
</head>

<body>

@include('header')

<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Giỏ hàng</h1>
                <nav class="d-flex align-items-center">
                    <a href="/">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="/order">Đơn hàng</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<div class="whole-wrap pb-100" style="margin-top: 15px;margin-bottom: 15px">
    <div class="container">
        <div class="section-top-border">
            <h3 class="mb-30">ORDER</h3>
            <div class="progress-table-wrap">
                <div class="progress-table">
                    <div class="table-head">
                        <div class="serial" style="margin-right: 70px">Tên khách hàng</div>
                        <div class="country">Số điện thoại</div>
                        <div class="visit">Địa chỉ</div>
                        <div class="percentage">Ngày đặt hàng</div>
                        <div></div>
                    </div>
                    @foreach($orders as $key => $order)
                    <div class="table-row">
                        <div class="serial" style="margin-right: 90px">{{$order->name}}</div>
                        <div class="country"> {{$order->phone}}</div>
                        <div class="visit">{{$order->address}}</div>
                        <div class="percentage">
{{--                            <div class="progress">--}}
{{--                                <div class="progress-bar color-1" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0"--}}
{{--                                     aria-valuemax="100"></div>--}}
{{--                            </div>--}}
                            {{$order->created_at}}
                        </div>
                        <div ><a href="/order/{{$order->id}}" class="genric-btn info circle">Xem</a></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')
</body>

</html>

