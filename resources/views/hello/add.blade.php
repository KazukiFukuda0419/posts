@extends('layouts.helloapp')
   <style>
.comment{width:300px;height:100px;}
   </style>
@section('title','Add')

@section('menubar')
   @parent
   新規作成ページ
@endsection

@section('board')
   <table>
   <tr><th>ハンドルネーム</th><th>コメント</th></tr>
   @if(isset($items))
       @foreach($items as $item)
          <tr>
            <td>{{$item->id}}
            <td>{{$item->name}}</td>
            <td>{{$item->comment}}</td>
          </tr>
       @endforeach
   @endif
  </table>
@endsection

@section('content')
   <table>
   <form action="/hello/add" method="post">
    {{ csrf_field() }}
   <tr><th>ハンドルネーム: </th><td><input type="text" name="name">
       </td></tr>
   <tr><th>コメント: </th><td><textarea rows="5" type="text" name="comment" class=comment></textarea>
   </td></tr>
   <tr><th></th><td><input type="submit" value="send">
   </td></tr>
 </form>
 </table>
@endsection

@section('footer')
 copyright 2019 fukuda.
@endsection


