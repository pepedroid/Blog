<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Use Resources to convert into json
use App\Http\Resources\PostResource as PostResource;
// imports models
use App\Post;


class Postcontroller extends Controller
{


    public function index()
    {
        return PostResource::collection(Post::with('user')->paginate(25));
        /*  $posts = Post::with('user:id,name')
          /*  ->withCount('reviews')
            ->latest()*/
        /*  ->paginate(20);
        return response()->json(['posts' => $posts]); */
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*   $request->validate([
            'title' => 'required|string|max:100',
            'subTitle' => 'required|string|max:100',
            'description' => 'required|numeric|min:0'
        ]);
        $post = new Post();

        $post->title=  $request->title;
        $post->subTitle = $request->subTitle;
        $post->description =$request->description;
        $post->user_id = 1;

        $post->save();        
        return response()->json($post,201); */

        $post = Post::create([
            'title' => $request->title,
            'subTitle' => $request->subTitle,
            'description' => $request->description,
            'user_id' => 2,
        ]);

        return new PostResource($post);
    } /// store

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // check if currently authenticated user is the owner of the post
        /*if ($request->user()->id !== $post->user_id) {
            return response()->json(['error' => 'You can only edit your own posts.'], 403);
        }*/

        /*$request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);*/
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->subTitle = $request->subTitle;
        $post->description = $request->description;
        $post->save();
        return new PostResource($post);
    }


    /**
     * delete the specified resource in storage.
     *
     * @param  \Illuminate\Http\Post  $post
     * @param  Post Object
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        /*if (auth()->user()->id !== $product->user_id) {
            return response()->json(['message' => 'Action Forbidden']);
        }*/
        $post->delete();
        return response()->json(null, 204);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* public function index(Request $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->subTitle = $request->input('subTitle');
        $post->description = $request->input('description');
        $post->img = $request->input('img');
        $post->user_id = 1; // Cambiar despues por la sesión del usuario
        $post->save();
        
        return new PostResource($post);
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*  public function create()
    {
        //
    } */



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*  public function show($id)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* public function edit($id)
    {
        //
    } */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* public function destroy($id)
    {
        //
    } */

}
