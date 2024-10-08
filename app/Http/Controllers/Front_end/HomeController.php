<?php

namespace App\Http\Controllers\Front_end;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Contact;
use App\Models\User;
//use App\Models\Users;
use App\Models\Checkout;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\AskQuestion;
use App\Models\City;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Review;
use App\Models\Slide;
use App\Models\State;
use Hash;
use DB;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Whoops\Run;
use Carbon\Carbon;
use Mail; 
use Illuminate\Support\Str; 
// use Illuminate\Hashing\HashManager;
class HomeController extends Controller
{

    // home
    function index($id = 0)
    {
        $user = Auth::user();
        if ($id == 0) {
            $product = Product::all();
        } else {
            $product = Product::where('category', '=', $id)->get();
        }
        $pro = Product::inRandomOrder()->limit(4)->get();
        $cat = Category::inRandomOrder()->limit(4)->get();
        $slide = Slide::inRandomOrder()->limit(4)->get();
        $bottomslide = Slide::inRandomOrder()->limit(4)->get();

        if ($user) {
            $wishlist = Wishlist::where('user_id', $user->id)->get();
        } else {
            $wishlist = '';
        }
        return view("Front_end.home", compact('product', 'pro', 'cat', 'slide', 'bottomslide', 'wishlist'));
    }

    // about
    function about()
    {
        return view("Front_end.about");
    }

    // product view
    function products($id = 0)
    {
        $user = Auth::user();
        if ($user) {
            $wishlist = Wishlist::where('user_id', $user->id)->get();
        } else {
            $wishlist = '';
        }
        $pro = Product::all()->first();
        if ($id == 0) {
            $product = Product::all();
        } else {
            $product = Product::where('category', '=', $id)->get();
        }
        return view('Front_end.products', compact('product', 'pro', 'wishlist'));
    }

    // product details
    function productsdetails($id)
    {
        $user = Auth::user();
        $product = Product::find($id);
        $review = Review::all();
        $pro = Product::all()->take(4);

        if ($user) {
            $wishlist = Wishlist::where('user_id', $user->id)->get();
        } else {
            $wishlist = '';
        }
        // return $wishlist[0]->id;
        return view("Front_end.productdetail", compact('product', 'pro', 'review', 'wishlist'));
    }

    function ask_question(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'question' => 'required|string',
        ]);

        $ask_question = new AskQuestion();
        $ask_question->product_id = $request->product_id;
        $ask_question->email = $request->email;
        $ask_question->question = $request->question;
        $ask_question->save();

        return redirect()->back()->with('success', 'Your Message is Successfully Submitted');
    }

    // Review
    function review(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review = new Review();
        $review->product_id = $request->product_id;
        $review->username = $request->username;
        $review->email = $request->email;
        $review->rating = $request->rating;
        $review->message = $request->message;
        $review->save();
        return redirect()->back()->with('success', 'Your Message is Successfully Submitted');
    }

    //categorys
    function homedecors()
    {
        $product = Product::all();
        $category = Category::all();
        return view("Front_end.homedecors", compact('product', 'category'));
    }


    function craft()
    {
        $product = Product::all();
        $category = Category::all();
        return view("Front_end.craft", compact('product', 'category'));
    }

    function category($id)
    {
        $user = Auth::user();
        $category = Category::all();
        $product = Product::where('category', $id)->get();
        if ($user) {
            $wishlist = Wishlist::where('user_id', $user->id)->get();
        } else {
            $wishlist = '';
        }

        return view("Front_end.category", compact('product', 'category', 'wishlist'));
    }

    function stationery()
    {

        $product = Product::all();
        $category = Category::all();
        return view("Front_end.stationery", compact('product', 'category'));
    }
    // contact us
    function contactus()
    {
        return view("Front_end.contactus");
    }

    function contactuscode(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('success', 'Message sent successfully');
        // return view("Front_end.contactus");
    }


    // Wishlist 
    function wishlistcode(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/myaccount')->with('error', 'Please log in to add products to the cart.');
        }
        $user = Auth::user();
        // $string = exec('getmac');
        // $mac = substr($string, 0, 17);
        $wishlist = new Wishlist();
        $wishlist->product_id = $request->product_id;
        $wishlist->user_id = $user->id;
        $wishlist->save();
        return response()->json(['success' => true, 'message' => 'Product added to wishlist.']);
    }

    function wishlist()
    {
        if (!Auth::check()) {
            return redirect('/myaccount')->with('error', 'Please log in to add products to the cart.');
        }
        $user = Auth::user();
        $wishlist = Wishlist::with('product')->where('user_id', $user->id)->get();
        // return $wishlist;


        return view("Front_end.wishlist", compact('wishlist'));
    }

    function wishlistdelete($id)
    {
        $wish = Wishlist::find($id);

        if ($wish) {
            $wish->delete();
            return response()->json(['success' => true, 'message' => 'Product deleted successfully']);
        }
        return response()->json(['success' => false, 'error' => 'Wishlist item not found']);
    }

    // login register page
    function myaccount()
    {
        return view("Front_end.myaccount");
    }
    function logincode()
    {
        return view("Front_end.myaccount");
    }


    function logincodee(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                ->withSuccess('Signed in');

            $string = exec('getmac');
            $mac = substr($string, 0, 17);
            // $cart = session()->get('cart', []);
            $cart = Cart::where('user_id', '=', $mac)->get();
            if ($cart > 0) {
                return redirect()->back();
            } else {
                return redirect('Front_end.myaccount');
            }
        }
        return redirect("/myaccount")->withSuccess('Login details are not valid');
    }
    protected function authenticated(Request $request, $user)
    {
        return redirect('/');
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('/myaccount');
    }
    // forgot password
    public function showForgetPasswordForm()
    {

       return view('Front_end.forgetPassword');

    }
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([

            'email' => 'required|email|exists:users',

        ]);
        $token = Str::random(64);
        DB::table('password_resets')->insert([

            'email' => $request->email, 

            'token' => $token, 

            'created_at' => Carbon::now()

          ]);
        Mail::send('email.demoEmail', ['token' => $token], function($message) use($request){

            $message->to($request->email);

            $message->subject('Reset Password');

        });
        return back()->with('message', 'We have e-mailed your password reset link!');

    }

    public function showResetPasswordForm($token) { 

        return view('Front_end.forgetPasswordLink', ['token' => $token]);

     }
     public function submitResetPasswordForm(Request $request)

     {

         $request->validate([

             'email' => 'required|email|exists:users',

             'password' => 'required|string|min:6|confirmed',

             'password_confirmation' => 'required'

         ]);

 

         $updatePassword = DB::table('password_resets')

                             ->where([

                               'email' => $request->email, 

                               'token' => $request->token

                             ])

                             ->first();

 

         if(!$updatePassword){

             return back()->withInput()->with('error', 'Invalid token!');

         }

 

         $user = User::where('email', $request->email)

                     ->update(['password' => Hash::make($request->password)]);



         DB::table('password_resets')->where(['email'=> $request->email])->delete();

 

         return redirect('/myaccount')->with('message', 'Your password has been changed!');

     }
    function registercode(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'contactNo' => 'required|digits:10',
            'password' => 'required',
            'userStatus' => 'required',
        ]);

        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->contactNo = $request->contactNo;
        $user->password = $request->password;
        $user->userStatus = $request->userStatus;
        $user->status = "Active";
        $user->save();


        // $user = User::create($request->validated());
        auth()->login($user);

        return view("Front_end.myaccount");
    }
    function register()
    {
        return view("Front_end.frontregister");
    }

    // cart
    function viewcart()

    {
        $user = Auth::user();
        if (!Auth::check()) {
            return redirect('/myaccount')->with('error', 'Please log in to add products to the cart.');
        }
        if ($user) {
            $wishlist = Wishlist::where('user_id', $user->id)->get();
        } else {
            $wishlist = '';
        }

        $string = exec('getmac');
        $mac = substr($string, 0, 17);
        $user = Auth::user();
        $carts = Cart::with('product')->where('user_id', $user->id)->get();
        $total = $carts->reduce(function ($carry, $carts) {
            return $carry + ($carts->product->price * $carts->quantity);
        }, 0);

        // wishlistitem delete code
        $wishlistItems = Wishlist::with('product')->where('user_id', $user->id)->get();

        foreach ($wishlistItems as $wishlistItem) {
            $matchingCart = Cart::where('product_id', $wishlistItem->product_id)->where('user_id', $user->id)->first();

            if ($matchingCart) {
                $wishlistItem->delete();
            }
        }
        // 

        $random = Product::all()->random(8);
        return view("Front_end.viewcart", compact('carts', 'random', 'total','wishlist'));
    }

    function cartcode(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect('/myaccount')->with('error', 'Please log in to add products to the cart.');
        }

        $user = Auth::user();
        $quantity = $request->input('quantity', 1);
        $action = $request->input('action');
        if ($action === 'cart' || $action === 'buy_now') {
            $cart = Cart::where('product_id', $id)->where('user_id', $user->id)->first();
            if ($cart) {
                $cart->quantity += $quantity;
            } else {
                $cart = new Cart();
                $cart->product_id = $id;
                $cart->user_id = $user->id;
                $cart->quantity = $quantity;
            }
            $cart->save();
        }

        // $cart->save();
        // $cart =new Cart();        
        // $cart->product_id = $id;
        // $cart->user_id = $user->id;
        // $cart->quantity = 1;
        // $cart->save();

        $product = Product::find($id);
        $id = $product->id;
        $name = $product->name;
        $image = $product->image;
        $price = $product->price;
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "product_id" => $product->id,
                "name" => $name,
                "image" => $image,
                "price" => $price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect("/viewcart")->with('success', 'Product Added to the Cart successfully');;
    }

    function cartdelete(Request $request)
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->where('product_id', $request->id)->first();
        $cart->delete();
        // if ($request->id) {
        //     $cart = session()->get('cart');
        //     if (isset($cart[$request->id])) {
        //         unset($cart[$request->id]);
        //         session()->put('cart', $cart);
        //     }
        //     session()->flash('success', 'Product successfully removed!');
        // }
        // $cart = Cart::find($id);
        // // return $cart;
        // $cart->delete();
        return  response()->json([
            'success' => 'Product deleted successfully',
        ]);
        // redirect()->back()->with('success', 'Product deleted successfully');
    }

    // checkout

    function checkout()
    {
        if (isset(Auth::user()->id)) {
            $add = Address::where('user_id', Auth::user()->id)->get();
            $user = Auth::user();

            // $cart = Cart::join('products', 'products.id', '=', 'carts.product_id')
            //     ->where('user_id', '=', $user_id)->get();
            // // return $cart;
            $carts = Cart::with('product')->where('user_id', $user->id)->get();
            
            $total = $carts->reduce(function ($carry, $carts) {
                return $carry + ($carts->product->price * $carts->quantity);
            }, 0);
            $totalquantity = $carts->sum('quantity');
            // $product = Product::where('user_id',Auth::user()->id)->get();
            return view("Front_end.checkout", compact('add', 'carts', 'total', 'totalquantity'));
        } else {
            return redirect("/myaccount");
        }
    }

    function checkoutcode(Request $request)
    {
        // $request->validate([
        //     'address' => 'required',
        // ]);
        // $user = Auth::user();
        // $carts = Cart::with('product')->where('user_id',$user->id)->get();

        // $carts->each(function ($cart) use ($user, $request) {
        //     $order = new Order(); 
        //     $order->product_id = $cart->product_id; 
        //     $order->user_id = $user->id;
        //     $order->quantity = $cart->quantity; 
        //     $order->status = "Done";
        //     $order->save(); 

        //     $checkout = new Checkout();
        //     $checkout->o_id = $order->id;
        //     $checkout->user_id = $user->id;
        //     $checkout->address_id = $request->address;
        //     $checkout->save();
        // });
        // Cart::where('user_id', $user->id)->delete();
        // $request->validate([
        //     'quantity' => 'required',
        // ]);

        // $string = exec('getmac');
        // $mac = substr($string, 0, 17);
        // $cart = Cart::where('user_id', '=', $mac)->get();
        // // return $cart;
        // foreach ($cart as $carts) {
        //     $order = new Order();
        //     $order->product_id = $carts->product_id;
        //     $order->user_id = Auth::user()->id;
        //     $order->quantity = $carts->quantity;
        //     $order->status = "Done";
        //     $order->save();
        //     $o_id = $order->id;

        //     $checkout = new Checkout();
        //     $checkout->o_id = $o_id;
        //     $checkout->user_id = Auth::user()->id;
        //     $checkout->address_id = $request->address_id;
        //     $checkout->save();
        // }
        //return view("Front_end.home");
        return redirect()->back()->with('thanks', 'your order has been placed and will arrive in few days ');
    }


    public function applyDiscount(Request $request)
    {
        $discountCode = $request->input('discount_code');
        $totalPrice = $request->input('total_price'); 
        $product_id = $request->input('product_ids');
    
        $discount = Coupon::where('code', $discountCode)->first();
    
        if ($discount) {
            $validProducts = Product::whereIn('id', $product_id)
                ->where('coupon_id', $discount->id) 
                ->get();
    
            if ($validProducts->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'The discount code is not valid for these products.'
                ]);
            }
    
      
            $totalDiscountedPrice = 0;

            foreach ($validProducts as $product) {
                $cartItem = Cart::where('product_id', $product->id)
                    ->where('user_id', Auth::user()->id)
                    ->first();
    
                if ($cartItem) {
                    $discountAmount = $discount->discount; 
                    $newItemPrice = $totalPrice - $discountAmount;
    
                    if ($newItemPrice < 0) {
                        $newItemPrice = 0;
                    }
    
                    $totalDiscountedPrice += $newItemPrice;
                }
            }
    
            return response()->json([
                'success' => true,
                'new_price' => $totalDiscountedPrice
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid discount code.'
            ]);
        }
    }
    

    // Address
    function address()
    {
        $countries = Country::where('status','Active')->get();
        return view('Front_end.address',compact('countries'));
    }
    
    function getstates($countryId){
        $states = State::where('countryId', $countryId)->where('status', 'Active')->get();
        return response()->json($states);
    }

    function getcities($stateId){
        $cities = City::where('stateId',$stateId)->where('status','Active')->get();
        return response()->json($cities);
    }
    function addresscode(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            // 'company' => 'required',
            'country' => 'required',
            'address' => 'required',
            // 'apartment' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pin' => 'required',
            'phone' => 'required',

        ]);
        $countryName = Country::find($request->country)->countryName;
        $stateName = State::find($request->state)->stateName;
        $cityName = City::find($request->city)->cityName;
        
        $add = new Address();
        $add->user_id = Auth::user()->id;
        $add->email = $request->email;
        $add->firstname = $request->firstname;
        $add->lastname = $request->lastname;
        $add->country = $countryName;
        if ($request->company) {
            $add->company = $request->company;
        }
        $add->address = $request->address;
        if ($request->apartment) {
            $add->apartment = $request->apartment;
        }
        $add->city = $cityName;
        $add->state = $stateName;
        $add->pin = $request->pin;
        $add->phone = $request->phone;
        $add->save();

        return redirect()->back()->with('success', 'Address Added successfully');
    }
    public function addressedit($id)
    {
        $address = Address::findOrFail($id);
        $countries = Country::where('status','Active')->get(); 
        $states = State::where('status','Active')-> get(); 
        $cities = City::where('status','Active')->get(); 

        return view('Front_end.addressedit', compact('address', 'countries', 'states', 'cities'));
    }
    
    function addressupdate(Request $request,$id)
    {
        $request->validate([
            'email' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            // 'company' => 'required',
            'country' => 'required',
            'address' => 'required',
            // 'apartment' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pin' => 'required',
            'phone' => 'required',

        ]);
        $countryName = Country::find($request->country)->countryName;
        $stateName = State::find($request->state)->stateName;
        $cityName = City::find($request->city)->cityName;

        $id = $request->id;
        $add = Address::find($id);
        $add->user_id = Auth::user()->id;
        $add->email = $request->email;
        $add->firstname = $request->firstname;
        $add->lastname = $request->lastname;
        $add->country = $countryName;
        if ($request->company) {
            $add->company = $request->company;
        }
        $add->address = $request->address;
        if ($request->apartment) {
            $add->apartment = $request->apartment;
        }
        $add->city = $cityName;
        $add->state = $stateName;
        $add->pin = $request->pin;
        $add->phone = $request->phone;
        $add->save();

        return redirect()->route('front_end.checkout')->with('success', 'Address Updated successfully');
    }

    function addressdelete($id)
    {
        $address = Address::find($id);
        $address->delete();
        return redirect()->back()->with('success', 'Address deleted successfully');
    }

    // Menu
    function menu()
    {
        $category = Category::all();
        return view('Front_end.menu', compact('category'));
    }
}