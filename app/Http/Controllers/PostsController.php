<?php

/*
|--------------------------------------------------------------------------
| PostsController.php gets called by routes > web.php
|--------------------------------------------------------------------------
|
*/

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Validator;
use Response;
use App\Models\Post;
use View;
class PostsController extends Controller
{
    protected $rules = [
        'title' => 'required|min:2|max:64|regex:/^[a-z ,.\'-]+$/i',
        // 'content' => 'required|min:2|max:512|regex:/^[a-z \%\?,.\'-]+$/i',
        'content' => 'required|min:2|max:512|',
    ];

    public function console_log($output, $with_script_tags = true)
    {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }

    public function index()
    {
        $posts = Post::all();
        self::console_log('variable $ posts = ' . $posts);
        return view('posts_index', ['posts' => $posts]);
        // return view('welcome', ['posts' => $posts]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make(Request::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray(),
            ]);
        } else {
            $post = new Post();
            if ($request::has('title')) {
                $post->title = $request::input('title', 'default');
            }
            $post->content = $request::input('content', 'default');
            $post->save();
            return Response::json($post);
        }
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', ['post' => $post]);
    }
    public function update(Request $request, $id)
    {
        // $validator = Validator::make(Input::all(), $this->rules);
        $validator = Validator::make(Request::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray(),
            ]);
        } else {
            $post = Post::findOrFail($id);
            $post->title = $request::input('title', 'default');
            $post->content = $request::input('content', 'default');
            $post->save();
            return Response::json($post);
        }
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return Response::json($post);
    }
    public function changeStatus()
    {
        // $id = Input::get('id');
        $id = Request::input('id');
        $post = Post::findOrFail($id);
        $post->is_published = !$post->is_published;
        $post->save();
        return Response::json($post);
    }
}
