<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
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

        $images= Image::orderBy('created_at','desc')->paginate(10);
        return view('feed')->with(['images'=>$images]);
    }

    public function multipleUpload(Request $request) {
        // getting all of the post data
        $files = $request->file('images');
        $title = $request->input('title');
        $caption = $request->input('caption');
        // Making counting of uploaded images
        $file_count = count($files);
        // start count how many uploaded
        $uploadcount = 0;
        foreach($files as $file) {
            $rules = array('file' => 'required|mimes:png,gif,jpeg,jpg',
                            'title' => 'required|max:255',
                            'caption' => 'max:1000'
            );
            $validator = Validator::make(array('file'=> $file,
                                                'title' => $title,
                                                'caption' => $caption
            ), $rules);
            if($validator->passes()){
                $destinationPath = './images/Amazing Lock Screen/'; //upload path
                $extension = $file->getClientOriginalExtension();// get image extension
                $filename = time().$file->getClientOriginalName().'.'.$extension; //filename
                $file->move($destinationPath, $filename); // move
                $uploadcount ++;
                $image = new Image();
                $image->title= $request->input('title');
                $image->caption= $request->input('caption');
                $image->url_path = $filename;
                $image->vote_count = 0;
                $image->save();
            }
        }
        if($uploadcount == $file_count){
            Session::flash('success', 'Upload successfully');
            return Redirect::to('feed');
        }
        else {
            Session::flash('error', 'Upload file is not valid please make sure you upload .png,gif,jpeg,jpg file');

            return Redirect::to('feed')->withInput()->withErrors($validator);
        }
    }


}
