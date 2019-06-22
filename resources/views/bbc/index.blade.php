<!-- <p>カテゴリー：{{ $post->category->name }}</p> -->
<p>{{ link_to("/category/{$post->category->id}", $post->category->name, array('class' => '')) }}</p>
</code></pre>

これで、カテゴリーをクリックできるようになります。
つぎにコントローラーを作成します。
編集ファイル：app/controller/PostController.php
<pre><code class="language-php">
public function showCategory($id)
{
    $category_posts = Post::where('cat_id', $id)->get();
    
    return View::make('category')
    ->with('category_posts', $category_posts);
}
</code></pre>

つぎに、ビューをつくります。
新規作成ファイル：app/views/bbc/category.blade.php
<pre><code class="language-php">
@extends('layouts.default')
@section('content')

<div class="col-xs-8 col-xs-offset-2">

@foreach($category_posts as $category_post)

<h2>タイトル：{{ $category_post->title }}
<small>投稿日：{{ date("Y年 m月 d日",strtotime($category_post->created_at)) }}</small>
</h2>

<p>{{ $category_post->content }}</p>

<p>{{ link_to("/bbc/{$category_post->id}", '続きを読む', array('class' => 'btn btn-primary')) }}</p>
<p>コメント数：{{ $category_post->comment_count }}</p>
<hr />
@endforeach

</div>

@stop
