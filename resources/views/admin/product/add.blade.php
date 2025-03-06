@extends('admin.main')

@section('content')
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
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Thông tin sản phẩm</h4>
        </div>

        <div class="card-body">
            <form  class="row" action=" " method="post">
                <div class="col-lg-6 col-md-12">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Tên sản phẩm</label>
                        <input class="form-control" type="text" id="formFile" name = "nameproduct" value=" {{ old('nameproduct') }}">
                    </div>
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Mô tả chi tiết</label>
                        <textarea class="form-control" name = "description" id="exampleFormControlTextarea1"
                                  value=" {{ old('description') }}" ></textarea>
                    </div>

                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Giá gốc</label>
                        <input class="form-control" type="text" id="formFile" value=" {{ old('Oldprice') }}" name = "Oldprice">
                    </div>
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Giá bán</label>
                        <input class="form-control" name = "Saleprice" value=" {{ old('Saleprice') }}" id="exampleFormControlTextarea1" ></input>
                    </div>

                </div>
                <div class="col-lg-6 col-md-12">

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Tên danh mục</label>
                        <select class="form-control" type="text" id="formFile" name = "menu_id">
                            <option value="0"></option>
                            @if(isset($menus) && count($menus) > 0)
                                    @foreach($menus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                    @endforeach
                            @else
                                <p>Không có danh mục nào.</p>
                            @endif
                        </select>
                    </div>
                    <div>
                        <label for="formFile" class="form-label">Nội dung</label>
                        <textarea class="form-control" id="formFile" type="text" value=" {{ old('content') }}" name = "content"     ></textarea>
                    </div>
                </div>
                <div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Hình ảnh sản phẩm</label>
                        <input class="form-control" type="file"  name = file[] id="upload" multiple accept = "image/*" >
                    </div>
                    <div id = "image_show">

                    </div>
                    <input type="hidden" id = "thumb" name = "thumb">
                </div>
                <div>
                    <label for="formFile" class="form-label">Kích hoạt</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active"
                               id="active" value="1" checked = "">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Kích hoạt
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active"
                               id="noactive" value="0">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Không
                        </label>
                    </div>
                </div>
                <button class = "submitbtn" style = "background:#25396f; height: 50px; width: 200px; padding: auto;
                margin-top:20px;font-size: 20px; border: none; border-radius:30px;color: white;">Thêm mới</button>
                @csrf
                {{-- Laravel làm mọi thứ tự động, bạn chỉ cần nhớ sử dụng @csrf trong các form POST, PUT, PATCH, DELETE. --}}
            </form>
        </div>
    </div>
</div>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
