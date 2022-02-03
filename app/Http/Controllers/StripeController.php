<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class StripeController extends BaseController {
   /**
   * Store the resource in storage
   *
   * @return \Illuminate\Http\Response
   * @throws \Illuminate\Validation\ValidationException
   */
  public function store(Request $request)
  {
    $stripe = new \Stripe\StripeClient(
        'sk_test_51KCos0BbvjBvzwSPoz6O9YRMjzDj3bbAt7AO2gc41LtJDA81ZFsiomjJPVMCTqpWfWy0NBuObXxVy66sxP6N9FAs00I9Y9wIdr'
      );
      
      $stripe->paymentIntents->create([
        'amount' => $request->input('amount'),
        'currency' => 'usd',
        'payment_method_types' => ['card'],
    ]);

    return $this->sendResponse($stripe, 'Stripe Information has been created');
  }
}