
@extends('layouts.master')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Booking Details</h4>
            <div class="card-tools">
                Date: {{$booking_info[0]->booking_date}}
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
                <!-- Main content -->
    <section class="">
      
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>{{ company_info()->company_name }}</strong><br>
            {{ company_info()->company_address  }} <br>
            Phone: {{ company_info()->company_phone  }}<br>
            Email: {{ company_info()->company_email  }}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong>{{ $booking_info[0]->customer_name }}</strong><br>
            {{ $booking_info[0]->customer_address }}<br>
            Phone: {{ $booking_info[0]->customer_phone }}<br>
            Email: {{ $booking_info[0]->customer_email }}   
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Booking NO:</b> {{ $booking_info[0]->booking_code }}<br>
          <b>Booking  Date:</b> {{ $booking_info[0]->booking_date }}<br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <td width="15%" style=""><strong>SL</strong></td>
                <td width="45%" style=""><strong>Launch Name</strong></td>
                <td width="20%" style=""><strong>Cabin</strong></td>
                <td width="20%" style=""><strong>From</strong></td>
                <td width="20%" style=""><strong>Destination</strong></td>
                <td width="20%" style=""><strong>Fare</strong></td>
              </tr>
            </thead>
            <tbody>  
            @php $total = 0; @endphp
            @foreach($booking_info as $key => $value) 
            @php  $total += $value->booking_room_price; @endphp
            <tr>
              <td style="line-height: 20px;">1</td>
              <td style="line-height: 20px;">{{$value->launch_name}}</td>
              <td style="line-height: 20px;">{{$value->room_no}}</td>
              <td style="line-height: 20px;">
                <?php
                $terminal_from = DB::table('terminals')->select('terminal_name')->where('id',$value->terminal_from)->first(); 
                echo  $terminal_from->terminal_name;
                ?>
              </td>
              <td style="line-height: 20px;">
                <?php
                $terminal_to = DB::table('terminals')->select('terminal_name')->where('id',$value->terminal_to)->first(); 
                echo  $terminal_to->terminal_name;
                ?>
              </td>
              <td style="line-height: 20px;">{{$value->booking_room_price}}</td>
            </tr>
            @endforeach   
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-md-4">
          <p class="lead">Payment Method:</p>
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>
        </div>
        <div class="col-md-4"></div>
        <!-- /.col -->
        <div class="col-md-4">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>{{$total}}</td>
              </tr>
              <tr>
                <th>Tax</th>
                <td></td>
              </tr>
              <tr>
                <th>Shipping:</th>
                <td>$5.80</td>
              </tr>
              <tr>
                <th>Grand Total:</th>
                <td></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <a href="{{ url('admin/order-pdf/'.$booking_info[0]->id) }}" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </a>
        </div>
      </div>
    </section>
    <!-- /.content -->
        </div>
    </div>
</div>


    @endsection