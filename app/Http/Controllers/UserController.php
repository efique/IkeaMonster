<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Cart;

class UserController extends BaseController
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $users = User::latest()->get();

    return $this->sendResponse($users, 'User list');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $user = User::find($id);

    return $this->sendResponse($cart, 'User');
  }

   /**
   * Store the resource in storage
   *
   * @return \Illuminate\Http\Response
   * @throws \Illuminate\Validation\ValidationException
   */
  public function store(Request $request)
  {
    $user = User::firstOrCreate($request->input('user'));
    
    $cart = Cart::create(['address' => $request->input('cart')['address'], 'status' => 'current', 'user_id' => $user->id]);

    return $this->sendResponse($user, 'User Information has been created');
  }

     /**
     * storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function connexion(Request $request)
    {
        $user = User::where("email",$request->input('email'))->first();

        if($user != null) {
            $result = $this->sendResponse($user, 'User connected');
        } else {
            $result = $this->sendError('User connexion failed');
        }

        return $result;
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
    $user = User::findOrFail($id);

    $user->update($request->all());

    return $this->sendResponse($cart, 'User Information has been updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $user = User::findOrFail($id);

    $user->delete();

    return $this->sendResponse([$user], 'User has been Deleted');
  }
}
