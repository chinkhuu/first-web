<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('posts');
});


Route::get('/post/{post}', function ($slug) {
    // return $slug;
    $path = __DIR__ . "/../resources/posts/{$slug}.html";
    //file get contents ыг ашиглаад file дуудах боломжтой ба
    // __DIR__ нь DIRECTORY буюу байршил гэсэн үг
    // энэ нь public дотор байгаа index.php гээс эхлэх ба /../ үүнийг ашиглаад public folder оос нэг гарч байгаа юм

    if(file_exists($path))
    {
        $post = file_get_contents($path);
    }
    else
    {
        dd("File not Exits"); // dd гэдэг маань Dump & Die
        // abort(404);
        return redirect('/');
    }


    return view('post',[
        'post' => $post
    ]);
});
