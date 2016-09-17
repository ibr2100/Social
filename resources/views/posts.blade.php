<?php
use App\User;
?>
@extends('layouts.app')
@section('content')
    <div class="container">

            <form action=""}} method="POST">
                {{csrf_field()}}
                <table class="table" style="width: 100%">
                    <tbody>
                    <tr class="success">
                        <td style="width: 100%;" > by:{{ $post->user->name}} </td>

                        <td style="width: 100%">  {{($post)->created_at }}</td>
                    </tr>


                    <div class="form-group">

                        </br>
                        <a href="#">
                            <tr class="danger">
                                <td ><h2> {{ $post->contain}}</h2>

                                    @if($post->image_url!=null)
                                        <img src="{{ url('img')}}/{{$post->image_url}}" alt="" height="500" width="1000">
                                    @endif
                                </td>
                                <td>
                                    &nbsp;
                                </td>
                            </tr></a>
                        <tr>
                            <td >
                                <div class="form-group">
                                    <input rows="4" cols="50" type="text" name="contain"
                                           placeholder="ADD COMMMENT HERE  .  .  . " class="form-control"/>
                            </td>
                            <td class="col-md-1"><input type="submit" value="add comment" class="btn btn-primary"/>
                            </td>
                    </div>


                    </tr>


    </div>
    <tr>
        <td><h5><a href="#">comments</a> {{count($post->comments)}} </h5></td>
    </tr>
    @foreach ($post->comments as $comment)



        <tr class="info">
            <td>{{ $comment->user->name}}
                <h5>{{$comment->contain}}</h5>
                <a href="#">reply</a>
            </td>
            <td> {{$comment->created_at}}
            </td>
        </tr>

        @endforeach


            </tbody>
            </table>
            </form>


            </div>
@endsection
