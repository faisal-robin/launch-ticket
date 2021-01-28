 <!DOCTYPE html>
 <head>
    <style>
    body {
        font-family: sans-serif;
        font-size: 10pt;
    }

    p {
        margin: 0pt;
    }

    table.items {
        border: 0.1mm solid #e7e7e7;
    }

    td {
        vertical-align: top;
    }

    .items td {
        border-left: 0.1mm solid #e7e7e7;
        border-right: 0.1mm solid #e7e7e7;
    }

    table thead td {
        text-align: center;
        border: 0.1mm solid #e7e7e7;
    }

    .items td.blanktotal {
        background-color: #EEEEEE;
        border: 0.1mm solid #e7e7e7;
        background-color: #FFFFFF;
        border: 0mm none #e7e7e7;
        border-top: 0.1mm solid #e7e7e7;
        border-right: 0.1mm solid #e7e7e7;
    }

    .items td.totals {
        text-align: right;
        border: 0.1mm solid #e7e7e7;
    }

    .items td.cost {
        text-align: "."center;
    }
    </style>
</head>

<body>

    <table width="100%" style="font-family: sans-serif;" cellpadding="10">
        <tr>
            <td width="49%" style="border: 0.1mm solid #fff;">
                <img src="{{asset('public')}}/frontend_asset/img/launch-ticket.png" width="264" height="110" alt="Logo" align="left" border="0">
            </td>
            <td width="2%">&nbsp;</td>
            <td style="text-align: left;" width="49%" style="border: 0.1mm solid #fff; text-align: right;">
                <p><b>Launch Ticket</b></p>
                <p>House 24/A CWN(B),Road 36 Gulshan 2</p>
                <p>Dhaka, 1212</p>
                <p>+8809638336699</p>
                <p>ict@m360ict.com</p>
            </td>
        </tr>
    </table>


    <table width="100%" style="font-family: sans-serif;" cellpadding="6">
        <tr>
            <td width="49%" style="background-color: #f04e23; color:#fff">Invoice Info</td>
            <!-- <td width="1%"></td> -->
            <td width="50%" style="background-color: #f04e23; color:#fff">Customer Info</td>
        </tr>
    </table>

    <table width="100%" style="font-family: sans-serif;" cellpadding="6">
        <tr>
            <td width="49%" style=" color:#000">
            
                <p><b>Booking No: {{$booking_info[0]->booking_code}}</b></p>
                <p>Booked On: {{$booking_info[0]->booking_date}}</p>
                <p>Journey Date: {{$booking_info[0]->schedule_date}}</p>
                <p>Departure Time: {{$booking_info[0]->schedule_time}}</p>
            </td>
            <td width="2%">&nbsp;</td>
            <td width="49%" style="color:#000">
            <p><b>{{$booking_info[0]->customer_name}}</b></p>
                <p>{{$booking_info[0]->customer_address}}</p>
                <p>{{$booking_info[0]->customer_phone}}</p>
                <p>{{$booking_info[0]->customer_email}}</p>
            </td>
        </tr>
    </table>
    
    <table class="items" width="100%" style="font-size: 14px; border-collapse: collapse;" cellpadding="8">
        <thead style="background-color: #f04e23;color: #fff">
            <tr style="background-color: #f04e23;color: #fff">
                <td  width="15%" style="text-align: left;color: #fff"><strong>SL</strong></td>
                <td width="45%" style="text-align: left;color: #fff"><strong>Launch Name</strong></td>
                <td width="20%" style="text-align: left;color: #fff"><strong>Cabin</strong></td>
                <td width="20%" style="text-align: left;color: #fff"><strong>From</strong></td>
                <td width="20%" style="text-align: left;color: #fff"><strong>Destination</strong></td>
                <td width="20%" style="text-align: left;color: #fff"><strong>Fare</strong></td>
            </tr>
        </thead>
        <tbody>
            <!-- ITEMS HERE -->
            @php $total = 0; @endphp
            @foreach($booking_info as $key => $value) 
            @php  $total += $value->booking_room_price; @endphp
            <tr style="background-color: #eee">
                <td style="line-height: 20px;">1</td>
                <td style="line-height: 20px;">{{$value->launch_name}}</td>
                <td style="line-height: 20px;">{{$value->room_no}}</td>
                <td style="line-height: 20px;">
                <?php  $terminal_from = DB::table('terminals')->select('terminal_name')->where('id',$value->terminal_from)->first(); 
                echo  $terminal_from->terminal_name;
                ?>
                </td>
                <td style="line-height: 20px;">
                    <?php  $terminal_to = DB::table('terminals')->select('terminal_name')->where('id',$value->terminal_to)->first(); 
                    echo  $terminal_to->terminal_name;
                    ?>
                </td>
                <td style="line-height: 20px;">{{$value->terminal_to}}</td>
                <td style="line-height: 20px;">{{$value->booking_room_price}}</td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    
    <table width="100%" style="font-family: sans-serif; font-size: 14px;" >
        <tr>
            <td>
                <table width="60%" align="left" style="font-family: sans-serif; font-size: 14px;" >
                    <tr>
                        <td style="padding: 0px; line-height: 20px;">&nbsp;</td>
                    </tr>
                </table>
                <table width="40%" align="right" style="font-family: sans-serif; font-size: 14px;" >
                    <tr>
                        <td style="border: 2px #eee solid; padding: 0px 8px; line-height: 20px;"><strong>Total Fare</strong></td>
                        <td style="border: 2px #eee solid; padding: 0px 8px; line-height: 20px;">{{$total}}</td>
                    </tr>
                    <tr>
                        <td style="border: 2px #eee solid; padding: 0px 8px; line-height: 20px;"><strong>Transaction ID</strong></td>
                        <td style="border: 2px #eee solid; padding: 0px 8px; line-height: 20px;">{{$booking_info[0]->transaction_id}}</td>
                    </tr>
                    <tr>
                        <td style="border: 2px #eee solid; padding: 0px 8px; line-height: 20px;"><strong>Status</strong></td>
                        <td style="border: 2px #eee solid; padding: 0px 8px; line-height: 20px;">Complete</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    
    <table width="100%" style="font-family: sans-serif; font-size: 14px;" >
        
        <tr>
            <td>
                <table width="100%" align="left" style="font-family: sans-serif; font-size: 14px;" >
                    <tr>
                        <td style="padding: 0px; line-height: 20px;">
                            <b>Trams And Condition</b>
                            <p>All price are excluding VAT & TAX</p>
                            <p>Payment terms: 50% Must be paid with the work order.</p>
                            <p>Kindly issue cheque in favour of 'M360 ICT'</p>
                            <p>30 days prior notice must be given for service termination</p>
                            <p>Client must provide Company Trade License,NID Copy as per BTRC Rules</p>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        
    </table>

 </body>
 </html> 
