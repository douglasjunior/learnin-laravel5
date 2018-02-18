<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{

    public function postCoverImage(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
        return $this->show($request, 'cover_images/' . $post->cover_image);
    }

    public function show(Request $request, $imageName)
    {
        $imagePath = storage_path('app/public/' . $imageName);
        $image = File::get($imagePath);
        $mime = File::mimeType($imagePath);
        return response($image, 200)->header('Content-Type', $mime);
    }

}
