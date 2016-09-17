@extends('layouts.app')
@section('content')


    <div class="container">
        <form action="home" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <textarea rows="4" cols="50" name="postcontent" class="form-control">
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
                        <td> by:<a href="/profile/{{$posts[$i]->user->id}}">{{$posts[$i]->user->name}}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo \Carbon\Carbon::createFromTimeStamp(strtotime(($posts[$i])->created_at ))->diffForHumans() ?>
                        </td>

                        <td class="col-lg-12">
                    </tr>


                    <div class="form-group">

                        </br>
                        <a href="#">
                            <tr class="danger">
                                <td class="col-lg-12"><h2> {{ $posts[$i]->content}}</h2>
                                    <a href="posts/{{$posts[$i]->id}}"><h5>POST-PAGE</h5></a>

                                    @if($posts[$i]->image_url!=null)
                                        <img class="img-circle" src="{{ url('img')}}/{{$posts[$i]->image_url}}" alt="Chania" width="800" height="600">


                                    @endif
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                        </a>
                        <tr>
                            <div id="div1" class="form-group">
                                </br>
                                <td>


                                    <input rows="4" cols="50" type="text" name="commentcontent"
                                           placeholder="ADD COMMMENT HERE  . . . " class="form-control"/>
                                </td>
                                <td>
                                    <input rows="4" cols="50" type="submit" value="comment" class="btn btn-primary"/>


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
                                    <h5>{{$comment->content}}</h5>
                                    <a href="#">reply</a>            &nbsp;&nbsp;&nbsp;&nbsp;                        <?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at ))->diffForHumans() ?>

                                </td>
                                <td>
                                </td>
                            </tr>

                    @endforeach




    </div>
    @endfor

    </tbody>
    </table>
@endsection
