<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $image_list = [];
    $images = scandir(public_path().'/uploads');
    for($i = 0; $i < count($images); $i++) {
        $extention = pathinfo($images[$i])["extension"];
        if($extention == 'jpg') {
            array_push($image_list, '/uploads/'.$images[$i]);
        }
    }
    return view('welcome', ['images' => $image_list]);
});

Route::post('/', function() {
    // return var_dump(Request::file('image'));
    $image = Image::make(Request::file('image'))->save(public_path().'/uploads/'.date('Y-m-d-H-i-s').'.jpg');
    return redirect('/')->with('status', 'アップロードが完了しました！');
});
