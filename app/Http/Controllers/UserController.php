<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    //Truy van thong tin Profile cua nguoi dung dang dang nhap
    public function getProfile(Request $request)
    {
        if (Auth::check()) {
            return response()->json([
                'status'  => 200,
                'message' => 'User is authenticated.',
                'user'    => Auth::user()
            ], 200);
        }

        return response()->json([
            'status'  => 401,
            'message' => 'User is not authenticated.'
        ], 401);
    }
    

    //Nguoi dung chinh sua thong tin Profile
    public function updateProfile(Request $request)
{
    // Validate dữ liệu đầu vào
    $validator = Validator::make($request->all(), [
        'name'        => 'nullable|string|max:255',
        'avatar'      => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048', // Validate file ảnh
        'phoneNumber' => 'nullable|string|max:20',
    ]);
    
    if ($validator->fails()) {
        return response()->json([
            'status'  => 422,
            'message' => $validator->messages()
        ], 422);
    }
    
    // Lấy thông tin user đang đăng nhập
    $user = Auth::user();
    
    if (!$user) {
        return response()->json([
            'status'  => 401,
            'message' => 'User not authenticated.'
        ], 401);
    }
    
    // Cap nhat thong tin moi neu nguoi dung nhap thong tin moi
    if($request->has('name')&&trim($request->name)!== '') 
        $user->name = $request->name;
    if($request->has('phoneNumber')&&trim($request->phoneNumber)!='') 
        $user->phoneNumber = $request->phoneNumber;

    // Nếu có file avatar được upload, xử lý upload lên Cloudinary
    // if ($request->hasFile('avatar')) {
    //     $file = $request->file('avatar');
    //     try {
    //         // Upload file lên Cloudinary, có thể thêm các tùy chọn (ví dụ: folder)
    //         $result = Uploader::upload($file->getRealPath(), [
    //             'folder' => 'user_avatars'
    //         ]);
    //         // Lấy URL an toàn của hình ảnh từ kết quả trả về
    //         $user->avatar = $result['secure_url'] ?? null;
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status'  => 500,
    //             'message' => 'Failed to upload avatar: ' . $e->getMessage()
    //         ], 500);
    //     }
    // }
    if($request->has('avatar') &&trim($request->avatar)!='')
        $user->avatar = $request->avatar;
    
    // Luu thong tin vao csdl
    $user->save();
    
    return response()->json([
        'status'  => 200,
        'message' => 'Successfully updated user profile.',
        'user'    => $user,
    ], 200);
}

//Nguoi dung xoa tai khoan cua ban than
public function deleteUser(Request $request)
{
    $user = Auth::user();
    if (!$user) {
        return response()->json([
            'status'=> 404,
            'message'=> 'User not authenticated.'
            ],404);
        }
    $user->delete();
    return response()->json([
        'status'=> 200,
        'message'=> 'Succesfully deleted user']);
        

}

}