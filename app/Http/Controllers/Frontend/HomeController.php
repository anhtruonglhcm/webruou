<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cate_Slide;
use App\Models\Slide;
use App\Models\Cate_post;
use App\Models\Product;
use App\Models\Post;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $product = DB::table('products')->where('status', 1)->where('is_home', 1)->orderBy('position', 'ASC')->get();
        $top     = Slide::where('status', 1)->where('dislay', 1)->first();
        $cf      = Slide::where('status', 1)->where('dislay', 2)->first();
        $blog = DB::table('posts')->where('status', 1)->where('is_home', 1)->where('cate_post_id', 2)->orderBy('position', 'ASC')->limit(4)->get();
        return view('frontend.index', compact('product', 'cf', 'top', 'blog'));
    }
}