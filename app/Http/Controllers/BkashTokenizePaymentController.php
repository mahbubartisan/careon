<?php

namespace App\Http\Controllers;

use App\Mail\BookingMail;
use App\Models\Booking;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Karim007\LaravelBkashTokenize\Facade\BkashPaymentTokenize;
use Karim007\LaravelBkashTokenize\Facade\BkashRefundTokenize;

class BkashTokenizePaymentController extends Controller
{
    public function index()
    {
        return view('bkashT::bkash-payment');
    }

    public function createPayment(Request $request)
    {
        $bookingId = $request->booking_id;
        $amount = $request->total_price;

        session()->put('payment_data', [
            'booking_id'       => $request->booking_id,
            'total_price'      => $request->total_price,
            'care_price'       => $request->care_price,
            'location_price'   => $request->location_price,
            'hours'            => $request->hours,
            'service_name'     => $request->service_name,
            'location_group'   => $request->location_group,
            'package_name'     => $request->package_name,
            'care_level_name'  => $request->care_level_name,
            'booking_form'     => $request->booking_form,
        ]);


        $inv = uniqid();
        $request['intent'] = 'sale';
        $request['mode'] = '0011'; //0011 for checkout
        $request['payerReference'] = $inv;
        $request['currency'] = 'BDT';
        $request['amount'] = $amount;
        $request['merchantInvoiceNumber'] = $inv;
        $request['callbackURL'] = config("bkash.callbackURL");;

        $request_data_json = json_encode($request->all());

        $response =  BkashPaymentTokenize::cPayment($request_data_json);
        //$response =  BkashPaymentTokenize::cPayment($request_data_json,1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..

        //store paymentID and your account number for matching in callback request
        // dd($response) //if you are using sandbox and not submit info to bkash use it for 1 response

        if (isset($response['bkashURL'])) return redirect()->away($response['bkashURL']);
        else return redirect()->back()->with('error-alert2', $response['statusMessage']);
    }

    public function callBack(Request $request)
    {
        //callback request params
        // paymentID=your_payment_id&status=success&apiVersion=1.2.0-beta
        //using paymentID find the account number for sending params

        if ($request->status == 'success') {
            $response = BkashPaymentTokenize::executePayment($request->paymentID);
            //$response = BkashPaymentTokenize::executePayment($request->paymentID, 1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
            if (!$response) { //if executePayment payment not found call queryPayment
                $response = BkashPaymentTokenize::queryPayment($request->paymentID);
                //$response = BkashPaymentTokenize::queryPayment($request->paymentID,1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
            }

            if (isset($response['statusCode']) && $response['statusCode'] == "0000" && $response['transactionStatus'] == "Completed") {

                $data = session()->get('payment_data');

                if (!$data) {
                    return BkashPaymentTokenize::failure('No booking data found.');
                }

                // Extract data
                $bookingId       = $data['booking_id'];
                $totalPrice      = $data['total_price'];
                $carePrice       = $data['care_price'];
                $locationPrice   = $data['location_price'];
                $hours           = $data['hours'];
                $serviceName     = $data['service_name'];
                $locationGroup   = $data['location_group'];
                $packageName     = $data['package_name'];
                $careLevelName   = $data['care_level_name'];
                $form            = $data['booking_form'];

                // Step 4: Insert into Bookings table
                $booking = Booking::create([
                    'booking_id'       => $bookingId,
                    'user_id'          => auth()->id(),
                    'service_name'     => $serviceName,
                    'package_name'     => $packageName,
                    'care_level_name'  => $careLevelName,
                    'hours'            => $hours,
                    'price'            => $carePrice,
                    'location_price'   => $locationPrice,
                    'total_price'      => $totalPrice,
                    'location_group'   => $locationGroup,
                    'location_name'    => $form['location'],
                    'date'             => $form['date'],
                    'time'             => $form['time'],
                    'payment_method'   => $form['payment_type'], // should be 'bkash'
                    'trx_id'   => $response['trxID'],
                ]);

                // Step 5: Insert into Patients table
                Patient::create([
                    'booking_id'        => $booking->id,
                    'name'              => $form['patientName'],
                    'gender'            => $form['gender'],
                    'height'            => $form['height'],
                    'weight'            => $form['weight'],
                    'patient_type'      => $form['patientType'],
                    'country'           => $form['country'],
                    'patient_contact'   => $form['patientContact'],
                    'emergency_contact' => $form['emergencyContact'],
                    'address'           => $form['address'],
                    'gender_preference' => $form['genderPreference'],
                    'language'          => $form['language'],
                    'special_notes'     => $form['specialInstructions'],
                ]);



                $adminEmail = 'admin@example.com';

                // Send to user
                Mail::to(auth()->user()->email)
                    ->send(new BookingMail($booking));

                // Send to admin
                Mail::to($adminEmail)
                    ->send(new BookingMail($booking));

                // Step 6: Clear session
                session()->forget('payment_data');

                // Step 7: Redirect success
                session()->put('booking_id', $booking->id);
                return redirect()->route('frontend.confirmation');

                // return BkashPaymentTokenize::success('Thank you for your payment', $response['trxID']);
            }
            return BkashPaymentTokenize::failure($response['statusMessage']);
        } else if ($request->status == 'cancel') {
            return BkashPaymentTokenize::cancel('Your payment is canceled');
        } else {
            return BkashPaymentTokenize::failure('Your transaction is failed');
        }
    }

    public function searchTnx($trxID)
    {
        //response
        return BkashPaymentTokenize::searchTransaction($trxID);
        //return BkashPaymentTokenize::searchTransaction($trxID,1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
    }

    public function refund(Request $request)
    {
        $paymentID = 'Your payment id';
        $trxID = 'your transaction no';
        $amount = 5;
        $reason = 'this is test reason';
        $sku = 'abc';
        //response
        return BkashRefundTokenize::refund($paymentID, $trxID, $amount, $reason, $sku);
        //return BkashRefundTokenize::refund($paymentID,$trxID,$amount,$reason,$sku, 1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
    }
    public function refundStatus(Request $request)
    {
        $paymentID = 'Your payment id';
        $trxID = 'your transaction no';
        return BkashRefundTokenize::refundStatus($paymentID, $trxID);
        //return BkashRefundTokenize::refundStatus($paymentID,$trxID, 1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
    }
}
