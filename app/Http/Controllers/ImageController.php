<?php

namespace App\Http\Controllers;

use App\Image;
use App\PhotoTag;
use App\Tag;
use App\Vote;
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

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function multipleUpload(Request $request) {
        // getting all of the post data
        $files = $request->file('images');
        $title = $request->input('title');
        $caption = $request->input('caption');
        if(sizeof($request->input('type'))>0) {
            $types = $_POST['type'];
        }
        // Making counting of uploaded images
        $file_count = count($files);
        // start count how many uploaded
        $uploadcount = 0;
        foreach($files as $file) {
            $rules = array('file' => 'required|mimes:png,gif,jpeg,jpg',
                            'title' => 'required|max:255',
                            'caption' => 'max:1000',
            );
            $validator = Validator::make(array('file'=> $file,
                                                'title' => $title,
                                                'caption' => $caption,
            ), $rules);
            if($validator->passes()){
                $size = $file->getSize();
                $destinationPath = './images/Amazing Lock Screen/'; //upload path
                $extension = $file->getClientOriginalExtension();// get image extension
                $filename = time().$file->getClientOriginalName().'.'.$extension; //filename
                $file->move($destinationPath, $filename); // move
                $uploadcount ++;
                $image = new Image();
                $image->title= $title;
                $image->caption= $caption;
                $image->url_path = $filename;
                $image->vote_count = 0;
                $image->user_id = Auth::user()->id;
                $image->size = $size;
                $image->save();
                if(sizeof($request->input('type'))>0){
                foreach($types as $type){
                $photoTag = new PhotoTag();
                $photoTag->image_id = $image->id;
                $photoTag->tag_id= $type;
                $photoTag->save();
                }}
            }
        }
        if($uploadcount == $file_count){
            Session::flash('success', 'Upload successfully');
            return Redirect::to('myphotos');
        }
        else {
            return Redirect::to('myphotos')->withInput()->withErrors($validator);
        }
    }
    public function userPhotos()
    {
        $tags = Tag::where('id','>',0)->get();
        $phototags = PhotoTag::where('image_id','>',0)->get();
        $images= Image::where('user_id','=',Auth::user()->id)->orderBy('created_at','desc')->paginate(10);
        return view('user.photos')->with(['images'=>$images,'tags'=>$tags,'phototags'=>$phototags]);
    }

    public function vote(Request $request){

        $imageId= $request->input('voteImageId');
        $image = Image::where('id','=',$imageId)->first();
        $votes = Auth::user()->votes()->get();
        $voted = 0;
        foreach($votes as $vote){
            if($vote->image_id==$imageId){
                $image->vote_count = $image->vote_count - 1;
                $image->save();
                $vote->delete();
                $voted=1;
            }
        }
        if($voted == 1){
            return Redirect::to('feed');
        }else{
            $newVote = new Vote();
            $newVote->user_id = Auth::user()->id;
            $newVote->image_id=$imageId;
            $newVote->save();
            $image->vote_count = $image->vote_count + 1;
            $image->save();
            return Redirect::to('feed');

        }
    }
    public function editImage($i){
        $image = Image::find($i);
        return view('user.edit')->with(['image'=>$image]);
    }

    public function updateImage(Request $request){
        $i = Image::find($request->input('imageId'));
        $rules = array(
            'title' => 'required|max:255',
            'caption' => 'max:1000',
            'type' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if(Auth::user()->id == $i->user_id or Auth::user()->rank == 1) {
            if ($validator->passes()) {
                $image = [
                    'id' => $request->input('imageId'),
                    'title' => $request->input('title'),
                    'caption' => $request->input('caption'),
                    'tag_id' => $request->input('type'),
                ];
                Image::where('id', '=', $request->input('imageId'))->update($image);
                return redirect("/image/" . $request->input('imageId'))->withInput();
            } else {
                return redirect("/editimage/" . $request->input('imageId'))->withInput()->withErrors($validator);

            }
        }else{
            return redirect("/editimage/" . $request->input('imageId'))->withInput();

        }
    }

    public function deleteImage(Request $request){
        $image = Image::find((int)$request->input('imageId'));
        if(Auth::user()->id == $image->user_id or Auth::user()->rank == 1) {
            $image->delete();
            Session::flash('success', 'Delete successfully');
            return redirect('/myphotos');
        }else{
            return Redirect::to('main');
        }
    }
}
