<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return View::make('bbc.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
        'title' => 'required',
        'content'=>'required',
        'cat_id' => 'required',
        ];
        
        $messages = array(
                          'title.required' => 'タイトルを正しく入力してください。',
                          'content.required' => '本文を正しく入力してください。',
                          'cat_id.required' => 'カテゴリーを選択してください。',
                          );
        
        $validator = Validator::make(Input::all(), $rules, $messages);
        
        if ($validator->passes()) {
            $post = new Post;
            $post->title = Input::get('title');
            $post->content = Input::get('content');
            $post->cat_id = Input::get('cat_id');
            $post->save();
            return Redirect::back()
            ->with('message', '投稿が完了しました。');
        }else{
            return Redirect::back()
            ->withErrors($validator)
            ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return View::make('bbc.single')->with('post', $post);
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
        //
    }

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
}
