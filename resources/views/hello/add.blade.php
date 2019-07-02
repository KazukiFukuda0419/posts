@extends('layouts.helloapp')
   @section('head')
   @parent

   @endsection
@section('title','Add')

@section('menubar')
   @parent
   新規作成ページ
@endsection

@section('content')
   <table>
   <form action="/hello/add" method="post">
   {{ csrf_field() }}
   <tr><th>ハンドルネーム: </th><td><input type="text" name="name">
       </td></tr>
   <tr><th>コメント: </th><td><input type="text" name="comment" width=200px height=150px>
   </td></tr>
   <tr><th></th><td><input type="submit" value="send">
   </td></tr>
 </form>
 </table>
@endsection

@section('footer')
 copyright 2019 fukuda.
@endsection


