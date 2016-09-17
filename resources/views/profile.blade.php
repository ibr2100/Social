<?php
use App\User;
?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="jumbotron">
            <h3>{{$posts[0]->user->name}} </h3>
</div>
        @for($i=0;$i<count($posts); $i++)
                {{csrf_field()}}
                <table class="table">
                    <tbody>
                    <tr class="success">
                        <td > by:{{ $posts[$i]->user->name}} &nbsp;&nbsp;&nbsp;&nbsp;  <?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($posts[$i]->created_at ))->diffForHumans() ?></td>
                        <td>&nbsp;
                        </td>

                    </tr>


                    <div class="form-group">

                        </br>
                        <a href="#">
                            <tr class="danger">
                                <td><h2> {{ $posts[$i]->content}}</h2>
                                    <a href="/posts/{{$posts[$i]->id}}">Link</a>

                                    @if($posts[$i]->image_url!=null)
                                        "<img src="{{ url('img')}}/{{$posts[$i]->image_url}}" alt="" height="500" width="1000">
                                    @endif
                                </td>
                                <td>&nbsp;</td>

                            </tr></a>

                        <form action="{{ $posts[$i]->id}}/{{ $posts[$i]->id}}" method="POST">
                                    {{csrf_field()}}
                                    <tr>
                                        <td >



                                <div class="form-group">
                                    <input rows="12" cols="16"style="width:100%;" type="text" name="commentcontent"
                                           placeholder="ADD COMMMENT HERE  .  .  . " class="form-control"/>
                            </td>
                            <td class="col-md-1"> <input type="submit" value="add comment" class="btn btn-primary"/>

                    </div >
                    </td>

                    </tr>
</form>

    </div>
    <tr>
        <td><h5><a href="#">comments</a> {{count($posts[$i]->comments)}} </h5></td>
    </tr>
    @foreach ($posts[$i]->comments as $comment)



        <tr  class="info">
            <td>{{ $comment->user->name}}
                <h5>{{$comment->content}}</h5>
                <a href="#">reply</a> &nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at ))->diffForHumans() ?>


            </td>
            <td>
            </td>
        </tr>


            @endforeach


            </tbody>
            </table>
            </form>

            @endfor

            </div>
@endsection
