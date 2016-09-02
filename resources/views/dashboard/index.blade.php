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
                    @if(!empty($user['image']))
                        <img src="http://www.eis-selber-machen.com/webservices/image/{{$user['image']}}"
                             alt="User Image">
                    @else
                        <img src="http://app.eis-selber-machen.com/img/avatar.jpg" alt="User Image">
                    @endif
                    <a class="users-list-name"
                       href="{{URL::to('admin/users/' . $user['id'])}}">{{$user['first_name']}} {{$user['last_name']}}</a>
                    <span class="users-list-date">{{\Carbon\Carbon::createFromFormat('d.m.y. H:i:s', $user['date_time'])->format('d.m.y.')}}</span>
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
                    @if(array_key_exists('comment_date', $posts[0]))
                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$posts[0]['comment_date'])->format('d.m.Y.')}}
                    @elseif(array_key_exists('date_time', $posts[0]))
                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$posts[0]['date_time'])->format('d.m.Y.')}}
                    @endif
            </span></li>

            @foreach($posts as $singleComment)
            @if(array_key_exists('comment_ID', $singleComment))
                    <!-- COMMENTS -->
            <li>
                <i class="fa fa-comments bg-blue"></i>

                <div class="timeline-item">
                        <span class="time"><i
                                    class="fa fa-clock-o"></i> {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$singleComment['comment_date'])->addHours(-2)->addSeconds(-30)->diffForHumans()}}</span>

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
            @endif

            @if(array_key_exists('date_time', $singleComment) && !empty($singleComment['user']))
                    <!-- FAVORITES -->
            <li>
                <i class="fa fa-thumbs-up bg-green"></i>

                <div class="timeline-item">
                        <span class="time"><i
                                    class="fa fa-clock-o"></i> {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$singleComment['date_time'])->addHours(-2)->addSeconds(-30)->diffForHumans()}}</span>

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