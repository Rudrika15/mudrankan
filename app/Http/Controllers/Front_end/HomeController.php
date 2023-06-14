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
use App\Models\Order;
use App\Models\Review;
use App\Models\Slide;
use Hash;
use DB;
use Session;
use Redirect;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Whoops\Run;

// use Illuminate\Hashing\HashManager;
class HomeController extends Controller
{

    // home
    function index($id = 0)
    {
        if ($id == 0) {
            $product = Product::all();
        } else {
            $product = Product::where('category', '=', $id)->get();
        }
        $pro = Product::inRandomOrder()->limit(4)->get();
        $cat = Category::inRandomOrder()->limit(4)->get();
        $slide = Slide::inRandomOrder()->limit(4)->get();
        $bottomslide = Slide::inRandomOrder()->limit(4)->get();
        return view("Front_end.home", compact('product', 'pro', 'cat', 'slide', 'bottomslide'));
    }

    // about
    function about()
    {
        return view("Front_end.about");
    }

    // product view
    function products($id = 0)
    {
        $pro = Product::all()->first();
        if ($id == 0) {
            $product = Product::all();
        } else {
            $product = Product::where('category', '=', $id)->get();
        }
        return view('Front_end.products', compact('product', 'pro'));
    }

    // product details
    function productsdetails($id)
    {
        $product = Product::find($id);
        $review = Review::all();
        $pro = Product::all()->take(4);
        return view("Front_end.productdetail", compact('product', 'pro', 'review'));
    }

    // Review
    function review(Request $request)
    {
        $review = new Review();
        $review->product_id = $request->product_id;
        $review->username = $request->username;
        $review->email = $request->email;
        $review->rate = $request->rate;
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

    function walldecors()
    {
        $product = Product::all();
        $category = Category::all();
        return view("Front_end.walldecors", compact('product', 'category'));
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
        $string = exec('getmac');
        $mac = substr($string, 0, 17);
        $wishlist = new Wishlist();
        $wishlist->product_id = $request->product_id;
        $wishlist->user_id = $mac;
        $wishlist->save();
        return view("Front_end.wishlist");
        // return redirect()->back()->with('success','Product added to wishlist  successfully');
    }

    function wishlist()
    {
        $string = exec('getmac');
        $mac = substr($string, 0, 17);
        $wishlist = Wishlist::join('products', 'products.id', '=', 'wishlists.product_id')
            ->where('user_id', '=', $mac)
            ->get(['products.id as product_id', 'products.name', 'products.image', 'products.price', 'wishlists.*']);
        return view("Front_end.wishlist", compact('wishlist'));
    }

    function wishlistdelete($id)
    {
        $wish = Wishlist::find($id);
        // return $cart;
        $wish->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
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
    function registercode(RegisterRequest $request)
    {

        $user = User::create($request->validated());
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
        $string = exec('getmac');
        $mac = substr($string, 0, 17);

        $product = Cart::join('products', 'products.id', '=', 'carts.product_id')
            ->where('user_id', '=', $mac)
            ->get(['products.id as product_id', 'products.name', 'products.image', 'products.price', 'carts.id as c_id', 'carts.quantity']);
        $random = Product::all()->random(8);
        return view("Front_end.viewcart", compact('product', 'random'));
    }

    function cartcode($id)
    {
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
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
        // $cart = Cart::find($id);
        // // return $cart;
        // $cart->delete();
        // return redirect()->back()->with('success', 'Product deleted successfully');
    }

    // checkout

    function checkout()
    {
        if (isset(Auth::user()->id)) {
            $add = Address::all();
            $user_id = Auth::user()->id;

            $cart = Cart::join('products', 'products.id', '=', 'carts.product_id')
                ->where('user_id', '=', $user_id)->get();
            // return $cart;

            return view("Front_end.checkout", compact('add',  'cart'));
        } else {
            return redirect("/myaccount");
        }
    }

    function checkoutcode(Request $request)
    {
        $request->validate([
            'quantity' => 'required',
        ]);

        $string = exec('getmac');
        $mac = substr($string, 0, 17);
        $cart = Cart::where('user_id', '=', $mac)->get();
        // return $cart;
        foreach ($cart as $carts) {
            $order = new Order();
            $order->product_id = $carts->product_id;
            $order->user_id = Auth::user()->id;
            $order->quantity = $carts->quantity;
            $order->status = "Done";
            $order->save();
            $o_id = $order->id;

            $checkout = new Checkout();
            $checkout->o_id = $o_id;
            $checkout->user_id = Auth::user()->id;
            $checkout->address_id = $request->address_id;
            $checkout->save();
        }
        //return view("Front_end.home");
        return redirect()->back()->with('thanks', 'your order has been placed and will arrive in few days ');
    }


    // Address
    function address()
    {
        return view('Front_end.address');
    }
    function addresscode(Request $request)
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
        $add->user_id = 1;
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

        return redirect()->back()->with('success', 'Address Added successfully');
    }
    function addressedit(Request $request)
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
        $add->user_id = 1;
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

        return redirect()->back()->with('success', 'Address Added successfully');
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
