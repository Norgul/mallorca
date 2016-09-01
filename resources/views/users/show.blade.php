@extends('admin_temp')

@section('content')


        <!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">User scopes:</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Scopes</th>
                        </tr>
                        @foreach($wpuser->scopes as $scope)
                            <tr>
                                <td>
                                    {{$scope->scope}}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Restricted ingredients:</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">Status</th>
                            <th>Restricted</th>
                        </tr>
                        @foreach($wpuser->restricted_ingredients as $restricted_ingredient)
                            <tr>
                                <td>
                                    {{$restricted_ingredient->status}}
                                </td>
                                <td>
                                    {{$restricted_ingredient->ingredient}}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>


        </div>
    </div>
</section>

@endsection