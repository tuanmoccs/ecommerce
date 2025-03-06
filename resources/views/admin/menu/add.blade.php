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
            <h4 class="card-title">Thông tin danh mục</h4>
        </div>

        <div class="card-body">
            <form  class="row" action=" " method="post">
                <div class="col-lg-6 col-md-12">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Tên danh mục</label>
                        <input class="form-control" type="text" id="formFile" name = "namemenu">
                    </div>
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Mô tả chi tiết</label>
                        <textarea class="form-control" name = "description" id="exampleFormControlTextarea1" row = "5" multiple></textarea>
                    </div>

                </div>
                <div class="col-lg-6 col-md-12">

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Tên danh mục</label>
                        <select class="form-control" type="text" id="formFile" name = "parent_id">
                            <option value="0">Danh mục cha</option>
                            @foreach ($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="formFile" class="form-label">Nội dung</label>
                        <input class="form-control form-control-lg" id="formFileLg" type="text" name = "content">
                    </div>
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
