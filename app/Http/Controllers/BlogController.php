<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Model\Blog;
use App\Model\Blogcomment;
use App\Model\Reply;
use App\Model\Like;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_view.add_blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('image')){
            $destinationPath = public_path( 'images/Blog/front' );
            if ( ! File::exists( $destinationPath ) ) {
                File::makeDirectory( $destinationPath, 0777, true, true );
              }
             
                $image = $request['image'];
               // $title = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension(); 
                $fileName = time().'.'.$extension; 
                $image->move($destinationPath, $fileName);
            }else{
                $fileName = Null;
            }
        
        if($request->hasfile('banner_image')){
            $destinationPath = public_path( 'images/Blog/banner' );
            if ( ! File::exists( $destinationPath ) ) {
                File::makeDirectory( $destinationPath, 0777, true, true );
              }
             
                $banner_image = $request['banner_image'];
               // $title = $image->getClientOriginalName();
                $extension = $banner_image->getClientOriginalExtension(); 
                $filebanner = time().'.'.$extension; 
                $banner_image->move($destinationPath, $filebanner);
            }else{
                $filebanner = Null;
            }
        

        
        $array = [
            'name' =>  $request->name,
            'about' => $request->about,
            'heading' => $request->heading,
            'teacher' =>  $request->teacher,
            'type' =>  $request->type,
            'image' => $fileName,
            'banner_image' => $filebanner,
            
        ]; 
            
            
        
         Blog::insert($array);
       return  view('admin_view.blog_list');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blog()
    {
        $result= Blog::get();
        return view('website_view.blogs',compact('result'));
    }
    
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blog_detailes($id)
    {
        $result=Blog::where('id','=',$id)->first();
        $blog= Blog::get();
        $comment=Blogcomment::leftJoin('users','users.id','blogcomments.user_id')
                        ->leftJoin('blogs','blogs.id','blogcomments.blog_id')
                        ->select('blogcomments.*','users.image as img','blogs.id')
                        ->where('blogs.id','=',$id)
                        ->get();
        $reply=Reply::leftJoin('users','users.id','replys.user_id')
                    ->leftJoin('blogs','blogs.id','replys.blog_id')
                    ->leftJoin('blogcomments','blogcomments.id','replys.comment_id')
                    ->select('replys.*','users.image as img','users.name as nam','blogs.id','blogcomments.id')
                    ->where('blogs.id','=',$id)
                    ->where('blogcomments.id','=',$id)
                    ->get();
        $blogc=Blogcomment::where('blog_id','=',$id)->count('id');
        $like=like::where('blog_id','=',$id)->count('like');
        $replyc=reply::where('blog_id','=',$id)->count('id');
        return view('website_view.blogs_deatails',compact('result','blog','comment','blogc','reply','like','replyc'));
    
    }
}
