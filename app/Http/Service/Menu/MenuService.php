<?php
namespace App\Http\Service\Menu;
use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class MenuService{

    public function getParent(){
        return Menu::where('parent_id',0)->get();
    }
    public function show(){
        return Menu::select('name','id')->orderbyDesc('id')->get();
    }
    public function getAll(){
        return Menu::orderbyDesc('id')->paginate(20);
    }

    public function create($request){
       try{
        Menu::create([
            'name' => (string) $request -> input('namemenu'),
            'description' => (string) $request -> input('description'),
            'parent_id' => (int) $request -> input('parent_id'),
            'content' => (string) $request -> input('content'),
            'active' => (string) $request -> input('active')
        ]);

        Session::flash ('success','Tao Thanh cong');
       }catch(\Exception $err){
            Session::flash ('error',$err ->getMessage());
            return false;
       }
       return true;
    }
    public function update($request, $menu){
        if($request->input('parent_id') != $menu['id']){
            $menu-> parent_id = (int) $request -> input('parent_id');
        }

        $menu-> name = (string) $request -> input('namemenu');
        $menu->description = (string) $request -> input('description');
        $menu-> content = (string) $request -> input('content');
        $menu-> active = (string) $request -> input('active');
        $menu->save();

        Session::flash('success','Cập nhật thành công');
        return true;
    }
    public function destroy($request){
        $id = (int) $request ->input('id');
        $menu = Menu::where('id', $id)->first();
        if($menu){
            return Menu::where('id',$id) -> orWhere('parent_id',$id)->delete();
        }
        return false;
    }
    public function getId($id){
        return Menu::where('id', $id) ->where('active',1)-> firstOrFail();
    }
    public function getProduct($menu,$request)
    {
        $query =  $menu->products()->select('id','name','price','price_sale','thumb')
            ->where('active',1);

        if($request->input('price_sale')){
            $query->orderBy('price_sale',$request->input('price_sale'));
        }
        return $query->orderByDesc('id')
            ->paginate(12)->withQueryString();

    }
}
