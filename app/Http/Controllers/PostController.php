<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequestForm;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Auth\Events\Validated;

class PostController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.Create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequestForm $request)
    {
        $validatedFields = $request->validated();


        $request->user()->posts()->create($validatedFields);

        // $post = Post::create([
        //     "title" => $request->input("title"),
        //     "description" => $request->input("description")
        // ]);


        return redirect()->route("posts.create")->with("success", "Post created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view("posts.View", ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view("posts.Edit", ["post" => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequestForm $request, $id)
    {

        $request->validated();

        $post = Post::findOrFail($id);

        $validatedFields = $request->validated();

        $post->update($validatedFields);

        return redirect()->route("posts.show", ["post" => $post->id])->with("success","Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("Home")->with("success", "deleted post successfully");
    }
}
