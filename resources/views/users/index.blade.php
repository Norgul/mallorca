@extends('admin_temp')

@section('content')


        <!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users Data Table</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">

                        <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>E-mail</th>
                            <th>Notification</th>
                            <th>Device</th>
                            <th>Last seen</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($wpusers as $wpuser)
                            <tr>
                                <td>
                                    <img src="https://pbs.twimg.com/profile_images/562466745340817408/_nIu8KHX.jpeg"
                                         alt="Generic placeholder thumbnail"
                                         class="img-rounded"
                                         width="40px">
                                </td>
                                <td>
                                    <a href="{{URL::to('admin/users/' . $wpuser->id)}}">
                                        {{$wpuser->first_name}}
                                    </a>
                                </td>
                                <td>
                                    {{$wpuser->last_name}}
                                </td>
                                <td>
                                    {{$wpuser->email}}
                                </td>
                                <td>
                                    @if($wpuser->notification_status == "on")
                                        <i class="fa fa-circle" style="color: #2ab27b"></i>
                                    @elseif($wpuser->notification_status == "off")
                                        <i class="fa fa-circle-o" style="color: #9c3328"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($wpuser->osdevice == 1)
                                        <i class="fa fa-android" style="color: forestgreen"></i>
                                    @elseif($wpuser->osdevice == 0)
                                        <i class="fa fa-apple" style="color: dimgrey"></i>
                                    @endif
                                </td>
                                <td>
                                    {{$wpuser->date_time}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                        <tfoot>
                        <tr>
                            <th>Thumbnail</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>E-mail</th>
                            <th>Notification</th>
                            <th>Device</th>
                            <th>Last seen</th>
                        </tr>
                        </tfoot>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->


@endsection