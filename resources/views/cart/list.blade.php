<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    @include('head')
</head>

<body>

@include('header')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Giỏ hàng</h1>
                <nav class="d-flex align-items-center">
                    <a href="/">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="/carts">Giỏ hàng</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Cart Area =================-->
<!-- FORM UPDATE GIỎ HÀNG -->
<section class="cart_area">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif
<form class="container" method="post" action="/update-cart">
    @csrf
    <div class="cart_inner">
        <div class="table-responsive">
            @if(count($products) != 0)
                @php $total = 0 @endphp
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    @foreach($products as $key => $product)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        @php
                                            $thumbs = explode(',', $product->thumb);
                                            $firstImage = $thumbs[0] ?? 'default.jpg';
                                        @endphp
                                        <img width="100px" height="100px" src="{{asset($firstImage)}}" alt="">
                                    </div>
                                    <div class="media-body">
                                        <p>{{$product->name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>{{number_format($product->price_sale)}}</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <input type="text" name="num_product[{{$product->id}}]" id="sst{{$product->id}}" maxlength="12" value="{{$product->quantity}}" class="input-text qty">
                                    <button onclick="var result = document.getElementById('sst{{$product->id}}'); var sst = result.value; if(!isNaN(sst)) result.value++; return false;"
                                            class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                    <button onclick="var result = document.getElementById('sst{{$product->id}}'); var sst = result.value; if(!isNaN(sst) && sst > 0) result.value--; return false;"
                                            class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                </div>
                            </td>
                            <td>
                                @php $priceend = $product->quantity * $product->price_sale;
                                $total += $priceend;
                                @endphp
                                <h5>{{ number_format($priceend) }}</h5>
                            </td>
                            <td>
                                <a href="/carts/delete/{{$product->id}}" style="padding: 10px 10px; border: none; border-radius: 3px; color: black; background: #e8f0f2">Xoá</a>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="bottom_button">
                        <td>
                            <input style="cursor: pointer" class="gray_btn" type="submit" value="Update Cart">
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="cupon_text d-flex align-items-center">
                                <input type="text" placeholder="Coupon Code">
                                <a class="primary-btn" href="#">Apply</a>
                                <a class="gray_btn" href="#">Close Coupon</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><h5>Tổng cộng</h5></td>
                        <td><h5>{{number_format($total)}}</h5></td>
                    </tr>
                </table>
            @else
                <div class="text-center">Không có sản phẩm nào trong giỏ hàng</div>
            @endif
        </div>
    </div>
</form> <!-- Kết thúc form cập nhật giỏ hàng -->
<!-- FORM ĐẶT HÀNG -->
</section>

@if(count($products) != 0)
    <!-- FORM ĐẶT HÀNG -->
    <form class="container mt-4" method="post" action="/checkout">
        @csrf
        <div class="cart_inner">
            <table class="table">
                <tr class="shipping_area">
                    <td colspan="2"><h5>Thông tin khách hàng</h5></td>
                    <td>
                        <div class="shipping_box">
                            <input type="text" placeholder="Tên khách hàng" name="name" required>
                            <input type="text" placeholder="Số điện thoại" name="numberphone" required>
                            <input type="text" placeholder="Địa chỉ" name="address" required>
                            <input type="text" placeholder="Email liên hệ" name="email" required>
                            <input type="text" placeholder="Ghi chú" name="note">
                        </div>
                    </td>
                </tr>
                <tr class="out_button_area">
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>
                        <div class="checkout_btn_inner d-flex align-items-center">
                            <a class="gray_btn" href="/">Tiếp tục mua sắm</a>
                            <button style="border: none" class="primary-btn" type="submit">Đặt hàng</button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </form>
@endif

<!--================End Cart Area =================-->

@include('footer')
</body>

</html>

