<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Image;
use App\PhotoTag;
use App\Tag;
use App\User;
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
        $phototags = PhotoTag::where('image_id','>',0)->get();
        $images= Image::orderBy('updated_at','desc')->paginate(10);
        if(Auth::check()){
            $votes = Auth::user()->votes()->get();
            return view('feed')->with(['images'=>$images,'tags'=>$tags,'votes'=>$votes,'phototags'=>$phototags]);
        }
        return view('feed')->with(['images'=>$images,'tags'=>$tags,'phototags'=>$phototags]);
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

//    public function search(){
//        return view('search');
//    }

    public function searchImage(Request $request){
        $images = Image::where('title','like',"%".$request->input('title')."%");
        $tags = Tag::where('id','>',0)->get();
        $phototags = PhotoTag::where('image_id','>',0)->get();
        $requestSave['title']=$request->input('title');
        $requestSave['typeCheck']=$request->input('typeCheck');
        $requestSave['type']=$request->input('type');
        $requestSave['ownerCheck']=$request->input('ownerCheck');
        $requestSave['owner']=$request->input('owner');
        $requestSave['ownerCheck']=$request->input('sizeCheck');
        $requestSave['owner']=$request->input('size');
        if($request->input('typeCheck') != null){
            $types = $_GET['type'];
            foreach($types as $type) {
                $ptags = PhotoTag::where('tag_id','like',"%".$type."%")->get();
                $arr = array();
                foreach($ptags as $ptag ) {
                    array_push($arr,$ptag->image_id);
                }

                $images = $images->whereIn('id',$arr);
            }
        };
        if($request->input('ownerCheck') != null){
            $users = User::where('username','like',"%".$request->input('owner')."%")->get();
            $arra = array();
            foreach($users as $user){
                array_push($arra,$user->id);
            }
            $images = $images->whereIn('user_id',$arra);
        };
        if($request->input('sizeCheck') != null){
            if($request->input('size')==1){
                $images->where('size','<',1000000);
            }elseif($request->input('size')==2){
                $images->where('size','>=',1000000)->where('size','<=',2000000);
            }elseif($request->input('size')==3){
                $images->where('size','>',3000000);
            };
        };
        $images=$images->paginate(10);
        $images->setPath('/searchimage');
        if(Auth::check()){
            $votes = Auth::user()->votes()->get();
            return view('search')->with(['images'=>$images,'tags'=>$tags,'votes'=>$votes,'phototags'=>$phototags,'requestSave'=>$requestSave]);
        }else {
            return view('search')->with(['images' => $images, 'tags' => $tags, 'phototags' => $phototags,'requestSave'=>$requestSave]);
        }
    }

}
