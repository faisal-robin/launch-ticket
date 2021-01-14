<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Customer;
class SslCommerzPaymentController extends Controller
{

    public function exampleEasyCheckout()
    {
        return view('exampleEasycheckout');
    }

    public function exampleHostedCheckout()
    {
        return view('exampleHosted');
    }

    public function index(Request $request)
    {
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.



        $post_data = array();
        $post_data['total_amount'] = '100'; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = 'Customer Name';
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.
        $update_product = DB::table('bookings')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'customer_name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'booking_grand_total' => $post_data['total_amount'],
                'booking_status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency'],
                'booking_code'=>'booking_code',
                'customer_id'=>1,
                'booking_tax_amount'=>10,
                'booking_tax_percent'=>1,
                'booking_discount_amount'=>10,
                'booking_sub_total'=>10,
                'booking_date'=> date_create(),
            ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

    public function payViaAjax(Request $request)
    {

        # Here you have to receive all the order data to initate the payment.
        # Lets your oder trnsaction informations are saving in a table called "orders"
        # In orders table order uniq identity is "transaction_id","status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.
        
        // echo "<pre>";print_r('call');die();

        // $validationArray['customer_first_name'] = 'required';
        // $validationArray['customer_last_name'] = 'required';
        // $validationArray['customer_email'] = 'required|email';
        // $validationArray['customer_phone'] = 'required';
        // $this->validate($request, $validationArray);
        $request_data = (array) json_decode($request->cart_json);
        
        // echo "<pre>";print_r($request_data);die();
        $customer = new Customer;

        $customer->customer_code = 'CUS-'.uniqid();
        $customer->customer_first_name = $request_data['customer_first_name'];
        $customer->customer_last_name = $request_data['customer_last_name'];
        $customer->customer_phone = $request_data['customer_phone'];
        $customer->customer_address = $request_data['customer_address'];
        $customer->customer_email = $request_data['customer_email'];
        $customer->customer_status = 1;

        $customer->save();

        // die();
        $post_data = array();
        $total_amount = DB::table('rooms')
                                    ->where('id', $request_data['r_id'])
                                    ->select('sell_price')
                                    ->first(); # You cant not pay less than 10
        $post_data['total_amount'] = $total_amount->sell_price;
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $request_data['customer_first_name'].' '.$request_data['customer_last_name'];
        $post_data['cus_email'] = $request_data['customer_email'];
        $post_data['cus_add1'] = $request_data['customer_address'];
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $request_data['customer_phone'];
        $post_data['cus_fax'] = "";

        #SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        #OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        // echo "<pre>";print_r($customer->id);die();
        #Before  going to initiate the payment order status need to update as Pending.
        $update_product = DB::table('bookings')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'customer_id' => $customer->id,
                'customer_name' => $request_data['customer_first_name'].' '.$request_data['customer_last_name'],
                'booking_grand_total' => $post_data['total_amount'],
                'status' => 'Pending',
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency'],
                'booking_code'=>'B-123',
                'booking_tax_amount'=> 0.00,
                'booking_tax_percent'=> 0.00,
                'booking_discount_amount'=> 0.00,
                'booking_sub_total'=> $post_data['total_amount'],
                'booking_date'=> date_create(),
            ]);
        $booking_id = DB::table('bookings')
                        ->where('transaction_id', $post_data['tran_id'])
                        ->select('id')
                        ->first();
        $post_data['booking_id'] = $booking_id->id;
        // echo "<pre>";print_r($booking_id->id);die();
        
        $booking_data['booking_id'] = $booking_id->id;
        $booking_data['launch_schedule_id'] = $request_data['s_id'];
        $booking_data['launch_room_id'] = $request_data['r_id'];
        $booking_data['booking_room_price'] = $post_data['total_amount'];
        $booking_data['created_at'] = date_create();
        $booking_data['updated_at'] = date_create();

        DB::table('booking_details')->insert($booking_data);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

    public function success(Request $request)
    {
        echo "Transaction is Successful";

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        $booking_id = $request->input('booking_id');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_detials = DB::table('bookings')
            ->where('transaction_id', $tran_id)


            ->select('transaction_id', 'status', 'currency', 'booking_grand_total')->first();


        if ($order_detials->status == 'Pending') {
            $validation = $sslc->orderValidate($tran_id, $amount, $currency, $request->all());

            if ($validation == TRUE) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                $update_product = DB::table('bookings')
                    ->where('transaction_id', $tran_id)
                    ->update(['booking_status' => 'Processing']);


                    echo "<pre>";print_r('sdfasd');die();
                    $booking_info = DB::table('bookings')
                        ->where('bookings.id', $booking_id)
                        ->leftJoin('booking_details','booking_details.booking_id','=','bookings.id')
                        ->leftJoin('launch_schedules','launch_schedules.id','=','booking_details.launch_schedule_id')
                        ->leftJoin('rooms','rooms.id','=','booking_details.launch_room_id')
                        ->select('bookings.*','launch_schedules.*','rooms.room_no','booking_details.booking_room_price')
                        ->get();

                    
                    // $data["email"] = "aatmaninfotech@gmail.com";
                    // $data["title"] = "From ItSolutionStuff.com";
                    // $data["body"] = "This is Demo";

                    $pdf = PDF::loadView('frontend.pdf.document', $data);

                    
                    Mail::send('frontend.pdf.document', $data, function($message)use($data, $pdf) {

                        $message->to($data["email"], $data["email"])

                        ->subject($data["title"])

                        ->attachData($pdf->output(), "text.pdf");
                    });

                echo "<br >Transaction is successfully Completed";
            } else {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
                Here you need to update order status as Failed in order table.
                */
                $update_product = DB::table('bookings')
                    ->where('transaction_id', $tran_id)
                    ->update(['booking_status' => 'Failed']);
                echo "validation Fail";
            }
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            echo "Transaction is successfully Completed";
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            echo "Invalid Transaction";
        }


    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('bookings')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'booking_grand_total')->first();

        if ($order_detials->booking_status == 'Pending') {
            $update_product = DB::table('bookings')
                ->where('transaction_id', $tran_id)
                ->update(['booking_status' => 'Failed']);
            echo "Transaction is Falied";
        } else if ($order_detials->booking_status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('bookings')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'booking_grand_total')->first();

        if ($order_detials->booking_status == 'Pending') {
            $update_product = DB::table('bookings')
                ->where('transaction_id', $tran_id)
                ->update(['booking_status' => 'Canceled']);
            echo "Transaction is Cancel";
        } else if ($order_detials->booking_status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }
    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('bookings')
                ->where('transaction_id', $tran_id)

                ->select('transaction_id', 'status', 'currency', 'booking_grand_total')->first();


            if ($order_details->booking_status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($tran_id, $order_details->amount, $order_details->currency, $request->all());
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('bookings')
                        ->where('transaction_id', $tran_id)
                        ->update(['booking_status' => 'Processing']);

                    echo "Transaction is successfully Completed";
                } else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    $update_product = DB::table('bookings')
                        ->where('transaction_id', $tran_id)
                        ->update(['booking_status' => 'Failed']);

                    echo "validation Fail";
                }

            } else if ($order_details->booking_status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }

}
