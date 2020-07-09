<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Cate_post;
use Illuminate\Support\Collection;
use DB;

class PostController extends Controller

{
    public function postByCate($slug)
    {
        $post = DB::table('cate_posts')->where('status', 1)->where('slug', $slug)->first();
        $ds_post = DB::table('posts')->where('status', 1)->where('cate_post_id', $post->id)->paginate(8);
        return view('frontend.posts.list', compact('post', 'ds_post'));
    }
    public function listPost($slug)
    {
        $cate_post = Cate_post::where('slug', $slug)->first();
        $id        = $cate_post->id;
        session()->put('id', $id);
        $post = Post::orderBy('position', 'ASC')->where('status', 1)->where(function ($query) {
            $pro       = $query;
            $id        = session('id');
            $cate_post = Cate_post::find($id);
            $pro       = $pro->orWhere('cate_post_id', $cate_post->id); // bài viết có id của danh muc cha cấp 1.
            $com       = Cate_post::where('parent_id', $cate_post->id)->get(); //danh mục cha cấp 2.
            foreach ($com as $dt) {
                $pro = $pro->orWhere('cate_post_id', $dt->id); // bài viết có id của danh muc cha cấp 2.
            }
            session()->forget('id'); //xóa session;
        })->paginate(8);

        return view('frontend.posts.list', compact('post', 'cate_post'));
    }

    public function detail($slug)
    {
        $detail = Post::where('status', 1)->where('slug', $slug)->first();
        $bloglienquan = Post::where('status', 1)->where('cate_post_id', $detail->cate_post_id)->where('id', '<>', $detail->id)->orderBy('position', 'ASC')->limit(8)->get();
        return view('frontend.posts.detail', compact('detail', 'bloglienquan'));
    }

    public function postSearch(Request $req)
    {
        $input  = $req->search;
        $search = Post::where('name', 'LIKE', "%$input%")->where('status', 1)->paginate(8);

        return view('frontend.search', compact('search', 'input'));
    }
}