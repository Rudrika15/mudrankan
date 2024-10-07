<?php

namespace App\Http\Controllers;

use App\Models\AllPayment;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Order;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Exception;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Session\Session;

class RazorpayPaymentController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response() 
     */
    public function index()
    {
        return view('Front_end.payment.payment');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        try {
            $input = $request->all();

            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $payment = $api->payment->fetch($input['razorpay_payment_id']);

            $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(['amount' => $payment['amount']]);

            AllPayment::create([
                'memberId' => Auth::user()->id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'date' => now(),
                'amount' => $payment['amount'] / 100,
                'status' => 'Active',
            ]);



            $user = Auth::user();
            $carts = Cart::with('product')->where('user_id', $user->id)->get();

            $carts->each(function ($cart) use ($user, $request) {
                $order = new Order();
                $order->product_id = $cart->product_id;
                $order->user_id = $user->id;
                $order->quantity = $cart->quantity;
                $order->status = "Done";
                $order->save();

                $checkout = new Checkout();
                $checkout->o_id = $order->id;
                $checkout->user_id = $user->id;
                $checkout->address_id = $request->address;
                $checkout->save();
            });
            Cart::where('user_id', $user->id)->delete();


            // Redirect back to the same page with a success message
            return redirect()->back()->with('success', 'Payment Successfully Saved!...');
        } catch (\Exception $e) {
            // Redirect back with an error message if an exception occurs
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}