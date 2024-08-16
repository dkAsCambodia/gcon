<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConcertTblTransaction;
use App\Models\RestaurantOrder;
use App\Models\RestaurantCart;
use Session;

class StripePaymentController extends Controller
{
    public function makePayment(Request $request)
    {
        // echo "<pre>"; print_r($request->all()); die;
       \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $data=\Stripe\Charge::create(array(
            "amount" => $request->amount.'00',
            "currency" => $request->currency,
            "description" => $request->description,
            "source" => $request->stripeToken,
        ));
        
        if(!empty($data->receipt_url)){
                if($data->status == 'succeeded' || $data->status == 'success'){
                    $payment_status ='success';
                }
                date_default_timezone_set('Asia/Phnom_Penh');
                $created_date=date("Y-m-d H:i:s");
                if(!empty(Session::get('sess_transaction_recordId'))){
                    $recordId=Session::get('sess_transaction_recordId');
                    
                    ConcertTblTransaction::where('id', $recordId)
                    ->update([
                            'transaction_id' => $data->id,
                            'receipt_url' => $data->receipt_url,
                            'gateway_name' => 'Stripe',
                            'payment_timezone' => 'Asia/Bangkok',
                            'message' => 'Donation with Striipe',
                            'response_all' => $data,
                            'payment_time' => $created_date,
                            'future_payment_custId' => $data->customer,
                            'status' => $payment_status,
                        ]);
                        $transaction = ConcertTblTransaction::where('id', $recordId)->first();
                        Session::forget('sess_transaction_recordId');
                        $msg =  __('message.Table Booked Successfully!');
                
                    return redirect('/invoice'.'/'.base64_encode($transaction->total_amount).'/'.$transaction->currency_symbol.'/'.base64_encode($transaction->currency).'/'.base64_encode($transaction->id))->withsuccess($msg);
                
                }elseif(!empty(Session::get('restaurant_orderKey'))){
                    $restaurant_orderKey=Session::get('restaurant_orderKey');
                    
                    RestaurantOrder::where('order_key', $restaurant_orderKey)
                    ->update([
                            'TransactionId' => $data->id,
                            'receipt_url' => $data->receipt_url,
                            'gateway_name' => 'Stripe',
                            'response_all' => $data,
                            'payment_time' => $created_date,
                            'future_payment_custId' => $data->customer,
                            'payment_status' => $payment_status,
                            'order_status' => 'ordered',
                        ]);
                        $transaction = RestaurantOrder::where('order_key', $restaurant_orderKey)->first();
                        // Update Cart list
                        RestaurantCart::where('customer_id', $transaction->cust_id)
                        ->update([
                                'order_status' => '1',
                            ]);
                        // Update Cart list
                        Session::forget('restaurant_orderKey');
                        $msg =  __('message.Table Booked Successfully!');
                        return redirect('restaurantFood/invoice'.'/'.base64_encode($transaction->totalPayAmount).'/'.$transaction->currency_symbol.'/'.base64_encode($transaction->currency).'/'.base64_encode($transaction->order_key))->withsuccess($msg);
                    
                }
        }else{
            echo "Something Went Wrong!";
        }
    }

    public function getuserId($fname, $lname, $email)
    {
        if( !empty(auth()->user()->id) ){
            $existUserInfo = UserInformation::where('user_id', auth()->user()->id)->first();
            if(empty($existUserInfo)){
                UserInformation::create([
                    'user_id' => auth()->user()->id,
                ]);
            }
            return auth()->user()->id;
        }else{
            $emailExists = User::where('email', $email)->first();
            if (!empty($emailExists)) {
                $existUserInfo = UserInformation::where('user_id', $emailExists->id)->first();
                if(empty($existUserInfo)){
                    UserInformation::create([
                        'user_id' => $emailExists->id,
                    ]);
                }
                return $emailExists->id;
            }else{
                $NewUser = User::create([
                    'name' => $fname.' '.$lname,
                    'email' => $email,
                    'password' => '$2y$12$d3i8/KSuGg1eBLFC3ZTTBuYQ25klbUQ53slLjkZyGiXtwP5gK7zXK',
                ]);
                UserInformation::create([
                    'user_id' => $NewUser->id,
                ]);
                return $NewUser->id;
            }
        }

       
    }
}
