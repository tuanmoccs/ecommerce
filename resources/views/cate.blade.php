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
                <h1>{{$tiltle}}</h1>

            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<div class="container" style = "margin-bottom: 50px;">
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar-categories">
                <div class="head">Phân Loại</div>
                <ul class="main-categories">
                    @foreach($menushow as $key => $menu)
                        <li class="main-nav-list"><a href="/danh-muc/{{ $menu->id }}-{{ Str::slug($menu->name, '-') }}.html"><span
                                    class="lnr lnr-arrow-right"></span>{{$menu -> name}}<span class="number"></span></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->

            <!-- End Filter Bar -->
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">
                    <!-- single product -->
                    @foreach($products as $key => $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-product">
                                @php
                                    $thumbs = explode(',', $product->thumb); // Lấy danh sách ảnh
                                   $firstImage = $thumbs[0] ?? 'default.jpg';
                                @endphp
                                <img class="img-fluid" src="{{asset($firstImage)}}" alt="">
                                <div class="product-details">
                                    <a style="font-size: 16px;color:#222222;font-weight: 500;text-transform: uppercase;"
                                       href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html"
                                    >{{$product->name}}</a>
                                    <div class="price">
                                        <h6>{{number_format($product -> price_sale)}}</h6>
                                        <h6 class="l-through">{{number_format($product -> price)}}</h6>
                                    </div>
                                    <div class="prd-bottom">


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
            </section>
            <!-- End Best Seller -->
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center">
                <div class="sorting mr-auto">
                    <select  onchange="location = this.value;">
                        <option value="{{ request()->url() }}">Không sắp xếp</option>
                        <option value="{{ request()->fullUrlWithQuery(['price_sale' => 'asc']) }}">Thấp đến cao</option>
                        <option value="{{ request()->fullUrlWithQuery(['price_sale' => 'desc']) }}">Cao đến thấp</option>
                    </select>
                </div>
                <div class="pagination">
                    {{$products -> links()}}
                </div>
            </div>
            <!-- End Filter Bar -->
        </div>
    </div>
</div>

@include('footer')
</body>

</html>

