<?php
namespace App\Http\Service\Product;
use App\Http\Service\UploadService;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
class ProductAdminService{
    protected $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }
    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }
//    protected function isValidPrice($request)
//    {
//        if ($request->input('Oldprice') != 0 && $request->input('Saleprice') != 0
//            && $request->input('Oldprice') != $request->input('Saleprice')
//        ) {
//            Session::flash('error', 'Giá bán phải khác giá gốc');
//            return false;
//        }
//        return  true;
//    }
    public function insert($request)
    {
//        $isValidRequest = $this->isValidPrice($request);
//        if($isValidRequest === false){
//            return false;
//        }
        try {
            $request->except('_token');

            // Gọi UploadService để lưu ảnh
            $thumb = $request->input('thumb'); // Lấy danh sách ảnh từ input ẩn
            // Debug xem dữ liệu thumb nhận vào có đúng không
//            \Log::info('📌 Dữ liệu thumb nhận được:', [$thumb]);
//            dd($thumb);

            Product::create([
                'name' => (string) $request->input('nameproduct'),
                'description' => (string) $request->input('description'),
                'menu_id' => (int) $request->input('menu_id'),
                'content' => (string) $request->input('content'),
                'active' => (string) $request->input('active'),
                'price' => (int) $request->input('Oldprice'),
                'price_sale' => (int) $request->input('Saleprice'),
                'thumb' => (string) $thumb, // Lưu danh sách đường dẫn cách nhau dấu phẩy
            ]);

            Session::flash('success','Thêm sản phẩm thành công');
        }catch (\Exception $exception){
            Session::flash('error','Thêm sản phẩm thành lỗi');
            \Log::info($exception->getMessage());
            return false;
        }
        return true;
    }
    public function get(){
        return Product::with('menu')
            ->orderByDesc('id')->paginate(10);
    }
    public function update($request,$product){
        try {
            $product-> fill($request->input());
            $product->save();
            Session::flash('success','Cập nhật sản phẩm thành công');
        }catch (\Exception $exception){
            Session::flash('error','Cập nhật sản phẩm thất bại');
            \Log::info($exception->getMessage());
            return false;
        }
        return true;

    }
    public function delete($request){
        $product = Product::where('id', $request -> input('id'))->first();
        if($product){
            $product->delete();
            return true;
        }
        return false;
    }
}

