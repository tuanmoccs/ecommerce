<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $product)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Bạn cần đăng nhập để bình luận.');
        }

        Review::create([
            'user_id' => Auth::id(),
            'product_id' => $product,
            'comment' => $request->comment,
        ]);


        return redirect()->back()->with('success', 'Bình luận thành công!');
    }

}
