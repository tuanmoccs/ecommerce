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
                <h1>Product Details Page</h1>
                <nav class="d-flex align-items-center">
                    <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="/products">Shop<span class="lnr lnr-arrow-right"></span></a>
                    <a href="/danh-muc/{{$product->menu->id}}-{{\Str::slug($product->menu->name)}}">
                        {{$product->menu->name}}
                    </a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_Product_carousel">
                    @php
                        $thumbs = explode(',', $product->thumb);
                    @endphp

                    @foreach($thumbs as $thumb)
                        <div class="single-prd-item">
                            <img class="img-fluid" src="{{ $thumb }}" alt="">
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{$product->name}}</h3>
                    <h2>{{number_format($product->price_sale)}}</h2>
                    <ul class="list">
                        <li><a class="active" href="#"><span>Phân loại</span> : {{$product->menu->name}}</a></li>
                        <li><a href="#">
                                <span>Tình trạng</span> :
                                @if($product->active == 1)
                                    <span class="text-success">Có sẵn</span>
                                @else
                                    <span class="text-danger">Hết hàng</span>
                                @endif
                            </a></li>
                    </ul>
                    <p>{{$product->content}}</p>
                    <form action="/add-cart" method="post">
                        @if($product->active != 0)
                            <div class="product_count">
                                <label for="qty">Số lượng:</label>
                                <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                        class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                        class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                            </div>
                            <div class="card_area d-flex align-items-center">
                                <button style = "border:none" type = "submit" class="primary-btn" href="#">Add to Cart</button>
                            </div>
                            <input type = "hidden" name="product_id" value="{{$product->id}}">
                            @csrf
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                   aria-selected="false">Comments</a>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>{{$product->description}}</p>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="comment_list">
                            @if($reviews -> isEmpty())
                                <p>Chưa có bình luận nào</p>
                            @else
                            @foreach($reviews as $review)
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/review-1.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>{{$review->user->name}} </h4>
                                        <h5>{{$review->created_at}}</h5>
                                    </div>
                                </div>
                                <p>{{$review->comment}}</p>
                            </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="review_box">
                            <h4>Bình luận</h4>
                            <form class="row contact_form" action="{{ route('review.store', ['product' => $product->id]) }}" method="post" id="contactForm" novalidate="novalidate">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="comment" id="message" rows="1" placeholder="Nhập bình luận"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="submit" value="submit" class="btn primary-btn">Gửi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--================End Product Description Area =================-->
<!-- Start related-product Area -->
<section class="related-product-area section_gap_bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>Sản phẩm liên quan</h1>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    @foreach($productMore as $products)
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                @php
                                    $thumbs = explode(',', $products->thumb); // Lấy danh sách ảnh
                                   $firstImage = $thumbs[0] ?? 'default.jpg';
                                @endphp
                                <a href="#"><img width="100px" height="100px" src="{{asset($firstImage)}}" alt=""></a>
                                <div class="desc">
                                    <a  href= "/san-pham/{{ $products->id }}-{{ Str::slug($products->name, '-') }}.html" class="title">{{$products -> name}}</a>
                                    <div class="price">
                                        <h6>{{number_format($products->price_sale)}}</h6>
                                        <h6 class="l-through">{{number_format($products->price)}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
<!-- End related-product Area -->

@include('footer')
</body>

</html>

