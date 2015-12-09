<?php

namespace App\Http\Controllers;

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
    public function feed(){
        $photos = Photo::orderBy('created_at','desc')->get();
        return view('feed')->with(['photos'=>$photos]);
    }
    public  function image(){
        return view('test');
    }
}
