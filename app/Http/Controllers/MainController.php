<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Image;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\Photo;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function index()
    {
        return view('main');
    }

    public function feed(){
        $tags = Tag::where('id','>',0)->get();
        $images= Image::orderBy('created_at','desc')->paginate(10);
        if(Auth::check()){
            $votes = Auth::user()->votes()->get();
            return view('feed')->with(['images'=>$images,'tags'=>$tags,'votes'=>$votes]);
        }
        return view('feed')->with(['images'=>$images,'tags'=>$tags]);
    }

    public function showImage($i){
        $tags = Tag::where('id','>',0)->get();
        $image=Image::where('id','=',$i)->first();
        $comments = $image->comments()->orderBy('id', 'DESC')->paginate(10);
        return view('image')->with(['image'=>$image,'tags'=>$tags,'comments'=>$comments]);
    }
    public  function commentImage(Request $request){
        $rules = array(
            'guestName' => 'required|max:255',
            'comment' => 'required|max:2000'
        );
        $validator = Validator::make($request->all(), $rules);
        if($validator->passes()){
            $comment=new Comment();
            $comment->image_id=$request->input('imageId');
            $comment->comment=$request->input('comment');
            $comment->guestName=$request->input('guestName');
            $comment->save();
            return redirect("/image/".$request->input('imageId'));
        }else{
            return Redirect::to('feed')->withInput()->withErrors($validator);

        }

    }

}
