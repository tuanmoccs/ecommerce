<?php


namespace App\Http\Service;
use Illuminate\Http\Request;

class UploadService
{
    public function store(Request $request)
    {
        if (!$request->hasFile('file')) {
            return response()->json([
                'error' => true,
                'message' => 'Không có file nào được tải lên'
            ]);
        }
        try {
            $files = $request->file('file');
            if (!is_array($files)) {
                $files = [$files];
            }
            $imagePaths = [];
            foreach ($files as $file) {
                if (!$file->isValid()) {
                    return response()->json([
                        'error' => true,
                        'message' => 'File tải lên không hợp lệ'
                    ]);
                }
                $name = time() . '_' . $file->getClientOriginalName();
                $pathFull = 'uploads/' . date("Y/m/d");

                // Bỏ 'public/' ở đây vì root đã trỏ vào public
                $file->storeAs($pathFull, $name);

                // URL vẫn giữ nguyên format
                $imagePaths[] = '/storage/' . $pathFull . '/' . $name;
            }
            return response()->json([
                'error' => false,
                'urls' => $imagePaths
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'error' => true,
                'message' => 'Lỗi trong quá trình upload: ' . $error->getMessage()
            ]);
        }
    }
}
