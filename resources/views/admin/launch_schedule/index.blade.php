@extends('layouts.master')

@section('content')

<br> 
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">All Launch Schedule</h4>
            <p style="text-align: right;margin: 0" ><a href="{{url('admin/launch-schedules/create')}}"><button type="button"  class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-circle"></i> Add New Schedule</button></a></p>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Launch Name</th>
                        <th>Terminal From</th>
                        <th>Terminal To</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($launch_schedule_list  as $key => $value)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$value->launch_name}}</td>
                        <td>
                           <?php  $terminal_from = DB::table('terminals')->select('terminal_name')->where('id',$value->terminal_from)->first(); 
                              echo  $terminal_from->terminal_name;
                           ?>
                        </td>
                        <td>
                            <?php  $terminal_to = DB::table('terminals')->select('terminal_name')->where('id',$value->terminal_to)->first(); 
                              echo  $terminal_to->terminal_name;
                           ?>
                        </td>
                        <td>{{$value->schedule_date}}</td>
                        <td>{{$value->schedule_time}}</td>
                        <td>

                            <a data-id="{{$value->id}}" style="margin-right: 5px" href="{{ url('admin/launch-schedules/'.$value->id.'/edit') }}"  class="btn btn-success btn-sm float-left" >Edit</a>

                            <form method="post" action="{{url('admin/launch-schedules/'.$value->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection