<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Photo;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main');
    }
    public function test2()
    {
        return view('test2');
    }
    public function feed($i){

        $photos= Image::orderBy('created_at','desc')->skip($i*10)->take(50)->get();
        $images = $photos->take(10);
        return view('feed')->with(['images'=>$images,
                                    'i'=>$i,
                                    'photos'=>$photos]);
    }


}
