<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\EmailDemo;
use App\Models\Address;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\Contact;
use App\Models\Coupon;
use App\Models\Currency;
use App\Models\Discountable;
use App\Models\Field;
use App\Models\Market;
use App\Models\Option;
use App\Models\Optiongroup;
use App\Models\Order;
use App\Models\Otp;
use App\Models\Product;
use App\Models\Productgallery;
use App\Models\Review;
use App\Models\Slide;
use App\Models\User;
use App\Models\Vouchardetail;
use App\Models\Voucharmaster;
use App\Models\Wishlist;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ApiController extends Controller
{
    //login register

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        // print_r($data);
        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('my-app-token')->plainTextToken;

            $role = $user->getRoleNames();
            $response = [
                'User Data' => $user,
                'token' => $token,
            ];

            return response($response, 201);
        } else {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
    }

    function register(RegisterRequest $request)
    {

        $user = User::create($request->validated());
        auth()->login($user);

        if ($user)
            return $user;
        else
            return ['data' => "somthing went wrong.."];
    }

    function changepassword(Request $req)
    {
        $req->validate([
            'user_id' => 'required',
            'oldpassword' => 'required',
            'newpassword' => 'required',
        ]);
        $user_id = $req->user_id;

        $newpassword = Hash::make($req->newpassword);

        $user = User::where('users.id', '=', $user_id)
            ->get();

        if (count($user) > 0) {

            if (Hash::check($req->oldpassword, $user[0]->password)) {

                $userpassword = User::find($user_id);
                $userpassword->password = $newpassword;
                $userpassword->save();

                //    return $userpassword;
                return response('Password Change Successfully', 201);
            } else {
                return response('Old Password does not match', 404);
            }
        } else {
            return response('Username does not match', 501);
        }
    }

    function forgotpassword(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $rand = random_int(1000, 9999);
        $email = $request->email;
        $user = User::where('users.email', '=', $email)
            ->first('users.*');
        if ($user) {
            $mailData = [
                'title' => 'Mudrankan',
                'otp' => $rand,
                'email' => $email
            ];
            Mail::to($email)->send(new EmailDemo($mailData));
            $otp = new Otp();
            $otp->email = $email;
            $otp->otp = $rand;
            $otp->save();
            //  create a new table and insert code
            return response()->json([
                'message' => 'Email has been sent.',
                'OTP' => $rand
            ]);
        } else {
            return response()->json([
                'message' => 'User not Found',
                'status' => false
            ]);
        }
    }


    function checkotp(Request $request)
    {
        $request->validate([
            'otp' => 'required',
            'email' => 'required',
        ]);
        $otp = $request->otp;
        $email = $request->email;
        $check = Otp::where('email', '=', $email)
            ->where('otp', '=', $otp)
            ->first('otps.*');
        if ($check) {
            return response()->json([
                'message' => 'Verify Successfully',
                'status' => true
            ]);
        } else {
            return response()->json([
                'message' => 'Not Verify',
                'status' => false
            ]);
        }
    }

    function updatepassword(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $email = $request->email;
        // $otp = Otp::join('users', 'users.id', '=', 'otps.users_id')
        //     ->where('otps.email', '=', $email)
        //     ->where('users.email', '=', $email)
        //     ->first();
        $user = User::where('users.email', '=', $email)->first();
        $id = $user->id;
        if ($user) {
            $userupdate = User::find($id);
            $userupdate->password =  $request->password;
            $userupdate->save();
            return response()->json([
                'message' => 'User Updated Successfully',
                'status' => true
            ]);
        } else {
            return response()->json([
                'message' => 'User not Found',
                'status' => false
            ]);
        }
    }
    //Front end 
    function addressview($user_id)
    {
        $address = Address::where('user_id', '=', $user_id)->get();
        if ($address)
            return $address;
        else
            return ['data' => "No Address Found.."];
    }
    function addressedit($id, Request $request)
    {
        $request->validate([
            'email' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'company' => 'required',
            'country' => 'required',
            'address' => 'required',
            'apartment' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pin' => 'required',
            'phone' => 'required',

        ]);
        $id = $request->id;
        $add = Address::find($id);
        $add->user_id = $request->user_id;
        $add->email = $request->email;
        $add->firstname = $request->firstname;
        $add->lastname = $request->lastname;
        $add->country = $request->country;
        $add->company = $request->company;
        $add->address = $request->address;
        $add->apartment = $request->apartment;
        $add->city = $request->city;
        $add->state = $request->state;
        $add->pin = $request->pin;
        $add->phone = $request->phone;
        $add->save();

        if ($add)
            return $add;
        else
            return ['data' => "No Address Found.."];
    }
    function checkoutview($id)
    {
        $checkout = Checkout::find($id);
        if ($checkout)
            return $checkout;
        else
            return ['data' => "No Data Found.."];
    }
    function cartview($user_id)
    {
        $cart = Cart::join('products', 'products.id', '=', 'carts.product_id')
            ->where('user_id', '=', $user_id)->get(['carts.*', 'products.name', 'products.price', 'products.image']);
        if ($cart)
            return $cart;
        else
            return ['data' => "No Data Found.."];
    }
    function wishlistview($user_id)
    {
        $wishlist = Wishlist::join('products', 'products.id', '=', 'wishlists.product_id')
            ->where('user_id', '=', $user_id)->get(['wishlists.*', 'products.name', 'products.price', 'products.image']);
        if ($wishlist)
            return $wishlist;
        else
            return ['data' => "No Data Found.."];
    }
    function profileview($id)
    {
        $user = User::find($id);
        if ($user)
            return $user;
        else
            return ['data' => "No Data Found.."];
    }

    function productdetailview($id)
    {
        $productdetail = Product::find($id);
        if ($productdetail)
            return $productdetail;
        else
            return ['data' => "No Data Found.."];
    }

    //Back end ....................................................................................

    // view 
    function categoryview($id = 0)
    {
        if ($id == 0) {
            $data = Category::orderBy('id', 'desc')->get();
        } else {
            $data = Category::find($id);
        }
        if ($data)
            return $data;
        else
            return ['data' => "No Category Found.."];
    }
    function couponview($id = 0)
    {
        if ($id == 0) {
            $data = Coupon::orderBy('id', 'desc')->get();
        } else {
            $data = Coupon::find($id);
        }
        if ($data)
            return $data;
        else
            return ['data' => "No Coupone Found.."];
    }
    function currencyview($id = 0)
    {
        if ($id == 0) {
            $data = Currency::orderBy('id', 'desc')->get();
        } else {
            $data = Currency::find($id);
        }
        if ($data)
            return $data;
        else
            return ['data' => "No Currency Found.."];
    }
    function discountableview($id = 0)
    {
        if ($id == 0) {
            $data = Discountable::orderBy('id', 'desc')->get();
        } else {
            $data = Discountable::find($id);
        }
        if ($data)
            return $data;
        else
            return ['data' => "No Discountable Found.."];
    }
    function fieldview($id = 0)
    {
        if ($id == 0) {
            $data = Field::orderBy('id', 'desc')->get();
        } else {
            $data = Field::find($id);
        }
        if ($data)
            return $data;
        else
            return ['data' => "No Field Found.."];
    }
    function marketview($id = 0)
    {
        if ($id == 0) {
            $data = Market::orderBy('id', 'desc')->get();
        } else {
            $data = Market::find($id);
        }
        if ($data)
            return $data;
        else
            return ['data' => "No Market Found.."];
    }
    function optionview($id = 0)
    {
        if ($id == 0) {
            $data = Option::orderBy('id', 'desc')->get();
        } else {
            $data = Option::find($id);
        }
        if ($data)
            return $data;
        else
            return ['data' => "No Option Found.."];
    }
    function optiongroupview($id = 0)
    {
        if ($id == 0) {
            $data = Optiongroup::orderBy('id', 'desc')->get();
        } else {
            $data = Optiongroup::find($id);
        }
        if ($data)
            return $data;
        else
            return ['data' => "No Optiongroup Found.."];
    }
    function productviewcat($id = 0)
    {

        if ($id == 0) {
            $data = Product::orderBy('id', 'desc')->get();
        } else {
            $data = Product::where('category', '=', $id)
                ->get();
        }

        if ($data)
            return $data;
        else
            return ['data' => "No Product Found.."];
    }

    function productgalleryview($id = 0)
    {
        if ($id == 0) {
            $data = Productgallery::orderBy('id', 'desc')->get();
        } else {
            $data = Productgallery::find($id);
        }
        if ($data)
            return $data;
        else
            return ['data' => "No Productgallery Found.."];
    }
    function slideview($id = 0)
    {
        if ($id == 0) {
            $data = Slide::orderBy('id', 'desc')->get();
        } else {
            $data = Slide::find($id);
        }
        if ($data)
            return $data;
        else
            return ['data' => "No Slide Found.."];
    }
    function usersview($id = 0)
    {
        if ($id == 0) {
            $data = User::orderBy('id', 'desc')->get();
        } else {
            $data = User::find($id);
        }
        if ($data)
            return $data;
        else
            return ['data' => "No Users Found.."];
    }
    function vouchardetailview($id = 0)
    {
        if ($id == 0) {
            $data = Vouchardetail::orderBy('id', 'desc')->get();
        } else {
            $data = Vouchardetail::find($id);
        }
        if ($data)
            return $data;
        else
            return ['data' => "No Vouchardetail Found.."];
    }
    function voucharmasterview($id = 0)
    {
        if ($id == 0) {
            $data = Voucharmaster::orderBy('id', 'desc')->get();
        } else {
            $data = Voucharmaster::find($id);
        }
        if ($data)
            return $data;
        else
            return ['data' => "No Voucharmaster Found.."];
    }
    function orderview($user_id)
    {
        $data = Order::where('user_id', '=', $user_id)->get();
        if ($data)
            return $data;
        else
            return ['data' => "No Order Found.."];
    }

    function productfilter()
    {
        $data = Product::orderBy('id', 'desc')->take(4)
            ->get();
        if ($data)
            return $data;
        else
            return ['data' => "No Order Found.."];
    }

    // create
    function addressstore(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'company' => 'required',
            'country' => 'required',
            'address' => 'required',
            'apartment' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pin' => 'required',
            'phone' => 'required',
        ]);
        $add = new Address();
        $add->user_id = $request->user_id;
        $add->email = $request->email;
        $add->firstname = $request->firstname;
        $add->lastname = $request->lastname;
        $add->country = $request->country;
        $add->company = $request->company;
        $add->address = $request->address;
        $add->apartment = $request->apartment;
        $add->city = $request->city;
        $add->state = $request->state;
        $add->pin = $request->pin;
        $add->phone = $request->phone;
        $add->save();
        if ($add)
            return $add;
        else
            return ['data' => "No Voucharmaster Found.."];
    }
    function addtocartstore(Request $request)
    {
        $request->validate([
            'quantity' => 'required',
        ]);

        $product_id = $request->product_id;
        $user_id = $request->user_id;
        $qty = $request->quantity;

        $cart = Cart::where('product_id', '=', $product_id)
            ->where('user_id', '=', $user_id)->get();

        if (count($cart)) {
            $updatecart = $cart->first();
            $updatecart->quantity = $updatecart->quantity + $qty;
            $updatecart->save();
        } else {
            $cart =  new Cart();
            $cart->product_id = $request->product_id;
            $cart->user_id = $request->user_id;
            $cart->quantity = $qty;
            $cart->save();
        }
        if ($cart)
            return $cart;
        else
            return ['data' => "No Cart items Found.."];
    }
    function wishliststore(Request $request)
    {
        $wishlist = new Wishlist();
        $wishlist->product_id = $request->product_id;
        $wishlist->user_id = $request->user_id;
        $wishlist->save();
        // return "mac is" . $string;
        if ($wishlist)
            return $wishlist;
        else
            return ['data' => "No wishlist items Found.."];
    }
    function contactusstore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        if ($contact)
            return $contact;
        else
            return ['data' => "No contact Found.."];
    }
    function reviewstore(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'star' => 'required',
            'message' => 'required',
        ]);
        $review = new Review();
        $review->product_id = $request->product_id;
        $review->username = $request->username;
        $review->email = $request->email;
        $review->star = $request->star;
        $review->message = $request->message;
        $review->save();
        if ($review)
            return $review;
        else
            return ['data' => "No review Found.."];
    }
    function cartdelete($id)
    {
        $cart = Cart::find($id);
        // return $cart;
        $cart->delete();
        if ($cart)
            return ['data' => "Cart Deleted.."];
    }
    function wishlistdelete($id)
    {
        $wish = Wishlist::find($id);
        // return $cart;
        $wish->delete();
        if ($wish)
            return ['data' => "Wishlist Deleted.."];
    }
    function addressdelete($id)
    {
        $address = Address::find($id);
        $address->delete();
        if ($address)
            return ['data' => "Address Deleted.."];
    }
}
