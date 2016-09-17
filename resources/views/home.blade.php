@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="home" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">

                <textarea rows="4" cols="50" name="contain" class="form-control">
      </textarea>
                <input type="file" name="photo">
            </div>

            </br>
            <input rows="4" cols="50" type="submit" value="add new" class="btn btn-primary"/>

        </form>
        @for($i=0;$i<count($posts); $i++)
            <form action="home/{{ $posts[$i]->id}}" method="POST">
                {{csrf_field()}}
                <table class="table">
                    <tbody>
                    <tr class="success">
                        <td> by:<a href="/profile/{{$posts[$i]->user->id}}">{{$posts[$i]->user->name}}</a></td>

                        <td class="col-lg-12">  {{($posts[$i])->created_at }}</td>
                    </tr>
                    <div class="interaction"><a href="#" class="edit">Edit</a></div>


                    <div class="form-group">

                        </br>
                        <a href="#">
                            <tr class="danger">
                                <td class="col-lg-12"><h2> {{ $posts[$i]->contain}}</h2>
                                    <a href="posts/{{$posts[$i]->id}}"><h5>POST-PAGE</h5></a>

                                    @if($posts[$i]->image_url!=null)
                                        "<img src="{{ url('img')}}/{{$posts[$i]->image_url}}" alt="" height="500"
                                              width="1000">
                                    @endif
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                        </a>
                        <tr>
                            <div id="div1" class="form-group">
                                </br>
                                <td>

                                    <input rows="4" cols="50" type="text" name="contain"
                                           placeholder="ADD COMMMENT HERE  . . . " class="form-control"/>
                                </td>
                                <td>
                                    <input class="sub" id="sub" type="submit" value="add comment"
                                           class="btn btn-primary"/>

                            </div>
                            </td>

                        </tr>
            </form>



                    <tr>

                        <td><h5><a id="comments" href="#">comments</a> {{count($posts[$i]->comments)}} </h5></td>
                        </div>
                    </tr>
                    <div class="comm">

                        @foreach ($posts[$i]->comments as $comment)



                            <tr class="info">
                                <td>{{ $comment->user->name}}
                                    <h5>{{$comment->contain}}</h5>
                                    <a href="#">reply</a>
                                </td>
                                <td> {{$comment->created_at}}
                                </td>
                            </tr>

                    @endforeach




    </div>
    @endfor

    </tbody>
    </table>
@endsection
