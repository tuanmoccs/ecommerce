<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\UploadService;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    protected $upload;

    public function __construct(UploadService $upload)
    {
        $this->upload = $upload;
    }

    public function store(Request $request)
    {
        $url = $this->upload->store($request);
        if ($url !== false) {
            return response()->json([
                'error' => false,
                'url'   => $url
            ]);
        }

        Log::info('📌 Dữ liệu request:', $request->all());
        Log::info('📌 Danh sách file:', $request->file());

        return response()->json([
            'error' => true,
            'message' => 'Debug kiểm tra dữ liệu request'
        ]);
    }
}
