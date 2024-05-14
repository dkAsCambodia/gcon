<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Omnipay\Omnipay;
use App\Models\ConcertTblTransaction;
use Session;

class PaypalPaymentController extends Controller
{
    private $gateway;

     function __construct()
    {
    	$this->gateway = Omnipay::create('PayPal_Rest');
    	$this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
    	$this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
    	$this->gateway->setTestMode(true);
    }

    public function paypalCheckout(Request $request)
    {
           
    	try {
    		$response = $this->gateway->purchase(array(
    			'amount' => $request->amount,
    			'currency' => $request->currency,
    			'returnUrl' => route('paypalCheckout.success'),
    			'cancelUrl' => route('paypalCheckout.cancel'),

                // Additional parameters
                // 'firstName' => 'first_name',
                // 'lastName' => 'last_name',
                // 'email' => 'email@gmail.com',
                // 'line1' => 'address1',
                // 'line2' => 'address2',
                // 'city' => 'city',
                // 'state' => 'state',
                // 'countryCode' => 'country',
                // 'postalCode' => 'postal_code',
    		))->send();
            $data = $response->getData();
              
    		if ($response->isRedirect()) {
             
                if(!empty(Session::get('sess_transaction_recordId'))){
                   
                    $recordId=Session::get('sess_transaction_recordId');
                    // Code for update data into DB START
                        ConcertTblTransaction::where('id', $recordId)
                        ->update([
                            'transaction_id' => $data['id'],
                            'receipt_url' => $data['links']['1']['href'],
                            'gateway_name' => 'Paypal',
                            'payment_timezone' => 'Asia/Bangkok',
                            'message' => 'Donation with Paypal',
                        ]);
                    // Code for update data into DB END
                    // echo "<pre>";  print_r($data); die;
                    $response->redirect();
                }else{
                    echo "Something Went Wrong!"; die;
                }
    		}else{
    			return $response->getMessage();
    		}
    	} catch (Exception $e) {
    		return $this->getMessage();
    	}
    }

    public function paypalSuccess(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));
            $response = $transaction->send();
            if ($response->isSuccessful()) {
                $arr = $response->getData();
                // echo "<pre>"; print_r($arr); die;
                date_default_timezone_set('Asia/Phnom_Penh');
                $created_date=date("Y-m-d H:i:s");
                if(!empty(Session::get('sess_transaction_recordId'))){
                    $recordId=Session::get('sess_transaction_recordId');
                   
                    ConcertTblTransaction::where('id', $recordId)
                    ->update([
                            'response_all' => json_encode($arr, true),
                            'payment_time' => $created_date,
                            'future_payment_custId' => $arr['payer']['payer_info']['payer_id'],
                            'status' => 'success',
                        ]);
                        $transaction = ConcertTblTransaction::where('id', $recordId)->first();
                        $msg =  __('message.Table Booked Successfully!');
               
                    return redirect('/invoice'.'/'.base64_encode($transaction->total_amount).'/'.$transaction->currency_symbol.'/'.base64_encode($transaction->currency).'/'.base64_encode($transaction->id))->withsuccess($msg);
                }else{
                    echo "Something Went Wrong!"; die;
                }  
            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return 'Payment declined!!';
        }
    }

    public function paypalCancel(Request $request)
    {
        return redirect()->back();
    }
}
