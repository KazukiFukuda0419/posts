<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store()
    {
        $rules = [
        'commenter' => 'required',
        'comment'=>'required',
        ];
        
        $messages = array(
                          'commenter.required' => 'タイトルを正しく入力してください。',
                          'comment.required' => '本文を正しく入力してください。',
                          );
        
        $validator = Validator::make(Input::all(), $rules, $messages);
        
        if ($validator->passes()) {
            $comment = new Comment;
            $comment->commenter = Input::get('commenter');
            $comment->comment = Input::get('comment');
            $comment->post_id = Input::get('post_id');
            $comment->save();
            return Redirect::back()
            ->with('message', '投稿が完了しました。');
        }else{
            return Redirect::back()
            ->withErrors($validator)
            ->withInput();
        }
    }
}
