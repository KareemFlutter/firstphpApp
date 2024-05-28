<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post ; 

class PostController extends Controller
{
    public function index (){
        $postsFromDB = POST::all() ;  //! => Select All From Database --------- Collection object
     
     

       
        return view("posts.index" , ['posts' => $postsFromDB]); 
    }

    public function  show(POST $post){
    //! select * from posts where id = $posted Id ; 
    //! this is way =>   $singlePosrFromDB = POST::find($postId) ; 
    //!   $singlePosrFromDB = POST::where('id' , $postId) -> first(); //! select * from posts where id = $postId ; 
    //! لو هشتغل مع الايبهات ي هشتغل -> first , find 
    //! POST::where('title' , 'PHP') -> first() ====> select * from posts where title = PHP limit 1 ; 
    //! POST::where('title' , 'PHP') -> get() ====> select * from posts where title = PHP ; 
    //$singlePosrFromDB = POST::find($postId); //! Collection Object With one Element 
    // if(is_null($singlePosrFromDB)){
    //     return to_route('posts.index') ; 
    // }
    //$singlePosrFromDB = POST::findOrFail($postId);
 

        return view('posts.show' , ['post' => $post]) ; 
    }

    public function create(){
        return view('posts.create') ; 
    }

    public function store(){
        // $request =  request() ; 
        // dd($request);
     $data =  request() -> all(); 
     return $data ; 
        return to_route('posts.index'); 
    }

    public function edit(){
        return view('posts.edit'); 
    }

    public function update(){
        $data =  request() -> all(); 
    // return $data ; 
        return to_route('posts.show' , parameters :1); 
    }

    public function destroy(){
        return to_route('posts.index') ; 
    }
}
 