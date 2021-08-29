<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function posts()
    {
        $post=Posts::all();
        return $post;
    }
    public function show($id)
    {
        $post=Posts::find($id);
        return $post;
    }
    public function update(Request $request,$id){
        $post = Posts::find($id);

        $post->title = $request->input('title');
        $post->description= $request->input('description');
        $post->save();
        return $post;
    }
    public function delete($id)
    {
        $post = Posts::find($id);
        $post->delete();
        return 'Deleted Successfully';
    }
    public function deleteall()
    {
        $post=Posts::all();
        $post->delete();
        return 'All posts Deleted Successfully';
    }
}
