@extends('layouts.master')

@section('content')

<style>
    span.select2.select2-container.select2-container--default{
        width: 450px !important;
    }
</style>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Booking List</h4>
            
            <!-- <div class="card-tools">
                <a href="{{url('admin/blogs/create')}}" class="btn btn-info btn-sm" >
                    <i class="fas fa-plus-circle"></i> Add New Blog
                </a>
            </div> -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Booking No</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_booking  as $key => $value)
                    <tr>
                        <td>{{$key +1}}</td>
                        <td>{{$value->booking_code}}</td>
                        <td>{{$value->customer_name}}</td>
                        <td>{{$value->status}}</td>
                        <td>{{$value->booking_date}}</td>
                        <td>{{$value->booking_grand_total}}</td>
                        <td>        

                            <a href="{{url('admin/bookings/'.$value->id)}}" style="margin-right: 5px" class="btn btn-success btn-sm float-left">
                                View
                            </a>

                           <a href="{{url('admin/bookings/'.$value->id.'/edit')}}" style="margin-right: 5px" class="btn btn-primary btn-sm float-left view_modal">
                                Edit
                            </a> 

                             

                            <form method="post" action="{{url('admin/blogs/'.$value->id)}}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you want to delete this!')" type="submit" class="btn btn-danger btn-sm">Delete</button>
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


