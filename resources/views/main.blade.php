<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    @include('head')
</head>

<body>

@include('header')

<!-- start banner Area -->
<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <div class="active-banner-slider owl-carousel">
                    <!-- single-slide -->
                    <div class="row single-slide align-items-center d-flex">
                        <div class="col-lg-5 col-md-6">
                            <div class="banner-content">
                                <h1>Nike New <br>Collection!</h1>
{{--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et--}}
{{--                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>--}}
                                <div class="add-bag d-flex align-items-center">
                                    <a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
                                    <span class="add-text text-uppercase">Add to Bag</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="banner-img">
                                <img class="img-fluid" src="/template/img/banner/banner-img.png" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- single-slide -->
                    <div class="row single-slide">
                        <div class="col-lg-5">
                            <div class="banner-content">
                                <h1>Nike New <br>Collection!</h1>
{{--                                x--}}
                                <div class="add-bag d-flex align-items-center">
                                    <a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
                                    <span class="add-text text-uppercase">Add to Bag</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="banner-img">
                                <img class="img-fluid" src="/template/img/banner/banner-img.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- start features Area -->
<section class="features-area section_gap">
    <div class="container">
        <div class="row features-inner">
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="/template/img/features/f-icon1.png" alt="">
                    </div>
                    <h6>Miễn Phí Vận Chuyển</h6>
{{--                    <p>Free Shipping on all order</p>--}}
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="/template/img/features/f-icon2.png" alt="">
                    </div>
                    <h6>Chính Sách Đổi Trả</h6>
{{--                    <p>Free Shipping on all order</p>--}}
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="/template/img/features/f-icon3.png" alt="">
                    </div>
                    <h6>Hỗ Trợ 24/7</h6>
{{--                    <p>Free Shipping on all order</p>--}}
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="/template/img/features/f-icon4.png" alt="">
                    </div>
                    <h6>Bảo Mật Thanh Toán</h6>
{{--                    <p>Free Shipping on all order</p>--}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end features Area -->

<!-- Start category Area -->
<section class="category-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="/template/img/category/c1.jpg" alt="">
                            <a href="/danh-muc/7-san-pham-cap-doi.html" >
                                <div class="deal-details">
                                    <h6 class="deal-title">Sản phẩm cho cặp đôi</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="/template/img/category/c2.jpg" alt="">
                            <a href="/danh-muc/8-giay-the-thao.html">
                                <div class="deal-details">
                                    <h6 class="deal-title">Sản phẩm cho thể thao</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="/template/img/category/c3.jpg" alt="">
                            <a href="/danh-muc/6-giay-nu.html" >
                                <div class="deal-details">
                                    <h6 class="deal-title">Sản phẩm cho Nữ</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="/template/img/category/c4.jpg" alt="">
                            <a href="/danh-muc/5-giay-nam.html">
                                <div class="deal-details">
                                    <h6 class="deal-title">Sản phẩm cho nam</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-deal">
                    <div class="overlay"></div>
                    <img class="img-fluid w-100" src="/template/img/category/c5.jpg" alt="">
                    <a href="/products">
                        <div class="deal-details">
                            <h6 class="deal-title">Tất cả sản phẩm</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End category Area -->

<!-- start product Area -->
<section class="owl-carousel active-product-area section_gap">
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Sản phẩm mới</h1>
                        <p>Mặc dù công việc đôi khi vất vả và tốn nhiều thời gian,
                            nhưng với sự kiên trì và nỗ lực, chúng ta sẽ đạt được thành quả xứng đáng.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single product -->
                @foreach($activeproducts as $key => $product)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            @php
                                $thumbs = explode(',', $product->thumb); // Lấy danh sách ảnh
                                $firstImage = $thumbs[0] ?? 'default.jpg'; // Lấy ảnh đầu tiên, nếu không có thì đặt ảnh mặc định
                            @endphp
                            <img class="img-fluid" src="{{asset($firstImage)}}" alt="">
                            <div class="product-details">
                                <a style="font-size: 16px;color:#222222;font-weight: 500;text-transform: uppercase;"
                                   href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html"
                                >{{$product->name}}</a>

                                <div class="price">
                                    <h6>{{number_format($product->price_sale)}}</h6>
                                    <h6 class="l-through">{{number_format($product->price)}}</h6>
                                </div>
                                <div class="prd-bottom">

{{--                                    <a href="" class="social-info">--}}
{{--                                        <span class="ti-bag"></span>--}}
{{--                                        <p class="hover-text">add to bag</p>--}}
{{--                                    </a>--}}
                                    <a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Sắp ra mắt</h1>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single product -->

                @foreach($inactiveproducts as $key => $product)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            @php
                                $thumbs = explode(',', $product->thumb); // Lấy danh sách ảnh
                                $firstImage = $thumbs[0] ?? 'default.jpg'; // Lấy ảnh đầu tiên, nếu không có thì đặt ảnh mặc định
                            @endphp
                            <img class="img-fluid" src="{{asset($firstImage)}}" alt="">
                            <div class="product-details">
                                <a style="font-size: 16px;color:#222222;font-weight: 500;text-transform: uppercase;"
                                   href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html"
                                   >{{$product->name}}</a>

                                <div class="prd-bottom">

{{--                                    <a href="" class="social-info">--}}
{{--                                        <span class="ti-bag"></span>--}}
{{--                                        <p class="hover-text">add to bag</p>--}}
{{--                                    </a>--}}
                                    <a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
<!-- end product Area -->

<!-- Start exclusive deal Area -->


<!-- Start brand Area -->
<section class="brand-area section_gap">
    <div class="container">
        <div class="row">
            <a class="col single-img" href="#">
                <img class="img-fluid d-block mx-auto" src="img/brand/1.png" alt="">
            </a>
            <a class="col single-img" href="#">
                <img class="img-fluid d-block mx-auto" src="img/brand/2.png" alt="">
            </a>
            <a class="col single-img" href="#">
                <img class="img-fluid d-block mx-auto" src="img/brand/3.png" alt="">
            </a>
            <a class="col single-img" href="#">
                <img class="img-fluid d-block mx-auto" src="img/brand/4.png" alt="">
            </a>
            <a class="col single-img" href="#">
                <img class="img-fluid d-block mx-auto" src="img/brand/5.png" alt="">
            </a>
        </div>
    </div>
</section>
<!-- End brand Area -->

<!-- Start related-product Area -->
<section class="related-product-area section_gap_bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>Ưu đãi trong tuần</h1>
                    <p>Những sản phẩm có giá tốt trong tuần </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    @foreach($activeproducts as $key => $product)
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                        <div class="single-related-product d-flex">
                            @php
                                $thumbs = explode(',', $product->thumb); // Lấy danh sách ảnh
                                $firstImage = $thumbs[0] ?? 'default.jpg'; // Lấy ảnh đầu tiên, nếu không có thì đặt ảnh mặc định
                            @endphp
                            <a  href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html">
                                <img width="100px" height="100px" src="{{asset($firstImage)}}" alt=""></a>
                            <div class="desc">
                                <a  href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html" class="title">{{$product->name}}</a>
                                <div class="price">
                                    <h6>{{number_format($product->price_sale)}}</h6>
                                    <h6 class="l-through">{{number_format($product->price)}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ctg-right">
                    <a href="#" target="_blank">
                        <img class="img-fluid d-block mx-auto" src="/template/img/category/c5.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End related-product Area -->
    @include('footer')
</body>

</html>
