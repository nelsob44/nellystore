<?php

namespace App\Http\Controllers;

use App\Model\Payment;
use Illuminate\Http\Request;


class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('JWT');
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    public function charge(Request $request){
        //\Log::info($request->all());
        try {
            // Use Stripe's library to make requests...
            $token = \Stripe\Token::create([
                "card" => [
                  "number" => $request->card['card_number'],
                  "exp_month" => $request->card['expiry_month'],
                  "exp_year" => $request->card['expiry_year'],
                  "cvc" => $request->card['cvv']
                ]
              ]);
              \Stripe\Charge::create([
                "amount" => $request->amount * 100,
                "currency" => "gbp",
                "source" => $token, // obtained with Stripe.js
                "description" => $request->description,
                "receipt_email" => $request->email
              ]);
              return response()->json([
                  "success" => true
              ]);
          } catch(\Stripe\Error\Card $e) {
            // Since it's a decline, \Stripe\Error\Card will be caught
            return response()->json($e->getJsonBody());
          } catch (\Stripe\Error\RateLimit $e) {
            // Too many requests made to the API too quickly
            return response()->json($e->getJsonBody());
          } catch (\Stripe\Error\InvalidRequest $e) {
            // Invalid parameters were supplied to Stripe's API
            return response()->json($e->getJsonBody());
          } catch (\Stripe\Error\Authentication $e) {
            // Authentication with Stripe's API failed
            // (maybe you changed API keys recently)
            return response()->json($e->getJsonBody());
          } catch (\Stripe\Error\ApiConnection $e) {
            // Network communication with Stripe failed
            return response()->json($e->getJsonBody());
          } catch (\Stripe\Error\Base $e) {
            // Display a very generic error to the user, and maybe send
            // yourself an email
            return response()->json($e->getJsonBody());
          } catch (Exception $e) {
            // Something else happened, completely unrelated to Stripe
            return response()->json($e->getJsonBody());
          }
    }

    public function index()
    {
        return Payment::latest()->get();
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
        Payment::create($request->all());
        return response('Created', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return response('Payment Deleted', 204);
    }
}
