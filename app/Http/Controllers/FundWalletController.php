<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class FundWalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transactionReference = $request->transaction_reference;
        $transaction = $this->verifyTransaction($transactionReference);
        if($transaction['status']=="success"){

             $amount = $transaction['data']['amount'];
             $id = Auth::id();
             $user = User::find($id);
             $walletAmount = $user->walletBalance;
             $user->update(['walletBalance'=>$walletAmount + $amount]);


            //$me->balance += $amount;
            //TODO:  Store reference number so that it cannot be used again
            //$me->token = $request->token;
            return response(Utility::returnSuccess("Wallet funded with ".$amount,$user));
           
        }
        else{
            
            return response(Utility::returnError($transaction['message']));
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

      private function verifyTransaction($transactionReference){
        $result = array();
        //The parameter after verify/ is the transaction reference to be verified
        $url = 'https://api.paystack.co/transaction/verify/'.$transactionReference;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer sk_test_586c2e4b5776475785308a18fc6d989b4b7927f7'] );
        $request = curl_exec($ch);
        curl_close($ch);

        if ($request) {
            $result = json_decode($request, true);
            //print_r($result);
            if($result && $result['status'] == "true"){
                if($result['data']){
                    //something came in
                    if($result['data']['status'] == 'success'){
                        // the transaction was successful, you can deliver value
                        /*
                        @ also remember that if this was a card transaction, you can store the
                        @ card authorization to enable you charge the customer subsequently.
                        @ The card authorization is in:
                        @ $result['data']['authorization']['authorization_code'];
                        @ PS: Store the authorization with this email address used for this transaction.
                        @ The authorization will only work with this particular email.
                        @ If the user changes his email on your system, it will be unusable
                        */
                        $res = array("status"=>"success",
                            "message"=>"Transaction was successful",
                            "data"=>$result['data']);
                        return $res;
                    }else{
                        // the transaction was not successful, do not deliver value'
                        // print_r($result);  //uncomment this line to inspect the result, to check why it failed.
                        $res = array("status"=>"error",
                            "message"=>"Transaction was not successful: Last gateway response was: ".$result['data']['gateway_response']);
                        return $res;
                    }
                }else{
                    $res = array("status"=>"error", "message"=>$result['message']);
                    return $res;
                }

            }else{
                //print_r($result);
                $res = array("status"=>"error", "message"=>"Something went wrong while trying to convert the request variable to json. Uncomment the print_r command to see what is in the result variable.");
                return $res;
            }
        }else{
            //var_dump($request);
            $res = array("status"=>"error", "message"=>"Something went wrong while executing curl. Uncomment the var_dump line above this line to see what the issue is. Please check your CURL command to make sure everything is ok");
            return $res;
        }
    }
}
