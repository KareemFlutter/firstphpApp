<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $postsFromDB = POST::all();  //! => Select All From Database --------- Collection object

        return view("posts.index", ['posts' => $postsFromDB]);
    }

    public function  show(POST $post)
    {
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


        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        $uesrs = User::all();
        return view('posts.create', ['users' => $uesrs]);
    }

    public function store()
    {
        // $request =  request() ; 
        // dd($request);
        $data =  request()->all();
        $title  = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        //! Code to Vaildte Data
        request()->validate(
            [
                'title' => ['required', 'min:3'],
                'description' => ['required', 'min:5'],
                'post_creator' => ['required', 'exists:users,id']

            ]
        );


        //! Way One 
        // $post = new Post;
        // $post->title = $title;
        // $post->description = $description;
        // $post->save();
        //! Way Two 
        Post::create(
            [
                'title' => $title,
                'description' => $description,
                'user_id' => $postCreator,
            ]
        );





        return to_route('posts.index');
    }

    public function edit(Post $post)
    {
        $uesrs  = User::all();
        return view('posts.edit', ['users' => $uesrs, 'post' => $post]);
    }

    public function update($postId)
    {

        $data =  request()->all();
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;


        request()->validate(
            [
                'title' => ['required', 'min:3'],
                'description' => ['required', 'min:5'],
                'post_creator' => ['required']
            ]
        );
        $singlePosrFromDB = Post::find($postId);
        $singlePosrFromDB->update(
            [
                'title'  => $title,
                'description' =>  $description,
                'user_id' => $postCreator,
            ]
        );

        return to_route('posts.show', parameters: $postId);
    }

    public function destroy($postId)
    {
        $post = Post::find($postId);
        $post->delete();
        return to_route('posts.index');
    }
}
