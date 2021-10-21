<?php

namespace App\Http\Controllers\Frontend;

use App\AboutService;
use App\Advertise;
use App\FeaturedProduct;
use App\Http\Controllers\Controller;
use App\Model\CartShopping;
use App\Model\category;
use App\Model\product;
use App\Model\slider;
use App\Model\sub_category;
use App\Model\contacts;
use App\Model\logo;
use App\Model\review;
use App\Model\PrivacyPolicy;
use App\Model\TermsAndConditions;
use App\Model\AboutUs;
use App\Model\ServiceArea;
use App\VideoArea;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function index() {
        $slider=Slider::all();
        $cartpage=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        $service = ServiceArea::first();
        // dd($cartpage->product->image);

        //  finding popular categories
        $prod = DB::table('order_product')->select('product_id', DB::raw('SUM(qty) as total_sales'))->groupBy('product_id')->orderByRaw('total_sales DESC')->limit(10)->get();

        $prod_id = array();
        foreach( $prod as $row){
            array_push( $prod_id , $row->product_id);
        }

        $cat = DB::table('products')->select('category_id')->whereIn('id', $prod_id)->get();

        $cat_id = array();
        foreach( $cat as $row){
            array_push( $cat_id , $row->category_id);
        }

        /*
        get the popular categories, if popular categories less than 6, then fill
        the rest with first most categories
        $popular_categories1 = actual popular categories
        $popular_categories2 = normal categories
        */
        $popular_categories1 =[];
        $popular_categories1[] = category::find($cat_id);

        $max = 7;
        $count = count($popular_categories1['0']);

        $popular_categories1_id = [];
        foreach($popular_categories1['0'] as $cat){
            $popular_categories1_id[] = $cat->id;
        }
        if(count($popular_categories1_id) > 0){
            $popular_categories2[] = category::whereNotIn('id', $popular_categories1_id)->take($max-$count)->get();
        }
        else
            $popular_categories2[] = category::take($max-$count)->get();

        $popular_categories[] = $popular_categories1['0']->concat($popular_categories2['0']);
        $popular_categories = $popular_categories['0'];

        $data['sliders']=DB::table('products')->orderBy('created_at','desc')->take(2)->get();
        // $logos = logo::all()->last();
        // home categories
        $categories = category::with('sub_category','product')->take(4)->get();

        // flash deal/offer products
        $date = Carbon::today()->toDateString();
        $products = product::where('end_date', '>=', $date)->with('reviews')->take(10)->get();

        // update offered products which expired
        product::where('end_date', '<', $date)->update(['promo_price' => null , 'start_date' => null , 'end_date' => null]);

        //Advertises
        $advertise = Advertise::first();

        //Vide Area
        $video = VideoArea::first();

        //Featured Area
        $featured_area = FeaturedProduct::first();

        return view('Frontend.layouts.home', $data, compact('categories' ,'products', 'popular_categories','cartpage', 'service','slider', 'advertise', 'video', 'featured_area'));
    }


    public function contact()
    {
        $cartpage = CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        $contacts = contacts::orderByDesc('id')->first();
        $products = product::all();
        return view('Frontend.layouts.contact' , compact( 'cartpage','contacts' , 'products'));
    }

    public function aboutUs()
    {
        $about = AboutUs::first();
        $about_service = AboutService::first();
        $cartpage=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();

        return view('Frontend.single_pages.about_us', compact('cartpage','about', 'about_service'));
    }
    public function termsAndCond()
    {
        $term = TermsAndConditions::first();
        $cartpage=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        return view('Frontend.single_pages.terms-and-conditions', compact('cartpage','term'));
    }
    public function privacyPolicy()
    {
        $policy = PrivacyPolicy::first();
        $cartpage = CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        return view('Frontend.single_pages.privacy-policy', compact('cartpage','policy'));
    }


}
