@extends('admin_temp')

@section('content')
        <!-- Content -->

<!-- USERS LIST -->
<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Latest Members</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <ul class="users-list clearfix">
            @foreach($users as $user)
                <li>
                    <img src="https://i.ytimg.com/vi/opKg3fyqWt4/hqdefault.jpg" alt="User Image">
                    <a class="users-list-name"
                       href="{{URL::to('admin/users/' . $user['id'])}}">{{$user['first_name']}} {{$user['last_name']}}</a>
                    <span class="users-list-date">{{$user['date_time']}}</span>
                </li>
            @endforeach
        </ul>
        <!-- /.users-list -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer text-center">
        <a href="{{URL::to('admin/users')}}" class="uppercase">View All Users</a>
    </div>
    <!-- /.box-footer -->
</div>
<!--/.box -->

<!-- TIMELINE -->
<div class="tab-pane" id="timeline">
    <!-- The timeline -->
    <ul class="timeline timeline-inverse">
        <!-- timeline time label -->
        @foreach($mergedArray as $posts)
            <li class="time-label"><span class="bg-red">
                          {{$posts[0]['comment_date']}}
            </span></li>

            @foreach($posts as $singleComment)
            @if(array_key_exists('comment_ID', $singleComment))
                    <!-- COMMENTS -->
            <li>
                <i class="fa fa-comments bg-blue"></i>

                <div class="timeline-item">
                        <span class="time"><i
                                    class="fa fa-clock-o"></i> {{\Carbon\Carbon::createFromFormat('d.m.Y.',$singleComment['comment_date'])->diffForHumans()}}</span>

                    <h3 class="timeline-header">
                            <span style="color: #3c8dbc; font-weight: bold">
                                {{$singleComment['comment_author']}}
                            </span>
                        posted a new comment on
                            <span style="color: #3c8dbc; font-weight: bold">
                                {{$singleComment['recipe']['post_title']}}
                            </span>
                    </h3>

                    <div class="timeline-body">
                        {{$singleComment['comment_content']}}

                        <span style="color: red; float:right;">
                            <a href="" data-href="{{route('comment.destroyMe', $singleComment['comment_ID'])}}"
                               data-toggle="modal" data-target="#confirm-delete">
                                <i class="fa fa-fw fa-times text-danger"></i>
                            </a>
                        </span>

                    </div>
                </div>
            </li>
            @else
                    <!-- FAVORITES -->
            @if(!empty($singleComment['user']))
                <li>
                    <i class="fa fa-thumbs-up bg-green"></i>

                    <div class="timeline-item">
                        <span class="time"><i
                                    class="fa fa-clock-o"></i> {{\Carbon\Carbon::createFromFormat('d.m.Y.',$singleComment['date_time'])->diffForHumans()}}</span>

                        <h3 class="timeline-header">
                            <span style="color: #3c8dbc; font-weight: bold">
                                {{$singleComment['user']['first_name']}} {{$singleComment['user']['last_name']}}
                            </span>
                            liked a recipe
                            <span style="color: #3c8dbc; font-weight: bold">
                                {{$singleComment['recipe']['post_title']}}
                            </span>
                        </h3>
                    </div>
                </li>
            @endif
            @endif
        @endforeach

        @endforeach

        <li>
            <i class="fa fa-clock-o bg-gray"></i>
        </li>
    </ul>
</div>
<!-- /.box -->


@include('partials.delete_modal', ['title' => 'comment', 'body' => 'comment'])


@endsection