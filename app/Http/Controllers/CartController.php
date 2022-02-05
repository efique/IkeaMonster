<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class CartController extends BaseController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $carts = Cart::latest()->get();

    return $this->sendResponse($carts, 'Cart list');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $cart = Cart::find($id);

    return $this->sendResponse($cart, 'Cart');
  }

  /**
   * Update the resource in storage
   *
   * @param $id
   *
   * @return \Illuminate\Http\Response
   * @throws \Illuminate\Validation\ValidationException
   */
  public function update(Request $request, $id)
  {
    $cart = Cart::findOrFail($id);

    $cart->update(['status' => 'past']);

    foreach ($request->input('products') as $cart_product) {
      $product = Product::find($cart_product);
      $cart->products()->attach($product);
    }

    return $this->sendResponse($cart, 'Cart Information has been updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $cart = Cart::findOrFail($id);

    $cart->delete();

    return $this->sendResponse([$cart], 'Cart has been Deleted');
  }
}
