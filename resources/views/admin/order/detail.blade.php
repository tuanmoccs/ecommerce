@extends('admin.main')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Thông tin đơn hàng</h4>
            </div>

            <div class="card-body">
                <form  class="row" action=" " method="post">
                    <div class="col-lg-6 col-md-12">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Tên khách hàng </label>
                            <p class="form-control" type="text" id="formFile" name = "nameproduct" >{{$orders->name}}</p>
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Số điện thoại</label>
                            <p class="form-control" name = "description" id="exampleFormControlTextarea1"
                                       >{{$orders->phone}}</p>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Địa Chỉ</label>
                            <p class="form-control" type="text" id="formFile" name = "Oldprice">{{$orders->address}}</p>
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Ghi Chú</label>
                            <p class="form-control" name = "Saleprice" id="exampleFormControlTextarea1" >{{$orders->note}}</p>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-12">

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Email</label>
                            <p class="form-control" name = "Saleprice" id="exampleFormControlTextarea1" >{{$orders->email}}</p>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-12">

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Tổng tiền</label>
                            <p class="form-control" name = "Saleprice" id="exampleFormControlTextarea1" >{{number_format($orders->total)}}</p>
                        </div>

                    </div>
                    <div>
                        <h3>Sản phẩm</h3>
                        @foreach($orders->OrderDetail as $detail)
                        <div class="single-product" style="display: flex;flex-wrap: wrap; margin-top: 10px">
                            @php
                                $thumbs = explode(',', $detail->product->thumb); // Lấy danh sách ảnh
                               $firstImage = $thumbs[0] ?? 'default.jpg';
                            @endphp
                            <img class="img-fluid" height="100px" width="100px" src="{{asset($firstImage)}}" alt="">
                            <div class="product-details" style="margin-left: 10px">
                                <h6>{{$detail->product->name}}</h6>
                                <div class="price">
                                    <h6>{{number_format($detail->product->price_sale)}}</h6>
                                </div>
                                <h6>Số lượng: {{$detail->quantity}}</h6>
                            </div>
                            @endforeach

                    </div>

                    @csrf
                    {{-- Laravel làm mọi thứ tự động, bạn chỉ cần nhớ sử dụng @csrf trong các form POST, PUT, PATCH, DELETE. --}}
                </form>
            </div>
        </div>
    </div>

@endsection
