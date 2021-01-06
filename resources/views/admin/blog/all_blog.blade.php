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
            <h4 class="card-title">Blogs List</h4>
            
            <div class="card-tools">
                <a href="{{url('admin/blogs/create')}}" class="btn btn-info btn-sm" >
                    <i class="fas fa-plus-circle"></i> Add New Blog
                </a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_blog  as $key => $value)
                    <tr>
                        <td>{{$key +1}}</td>
                        <td>{{$value->title}}</td>
                        <td>{{$value->date}}</td>
                        <td>                            
                           <a href="{{url('admin/blogs/'.$value->id.'/edit')}}" style="margin-right: 5px" class="btn btn-primary btn-sm float-left view_modal">
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


