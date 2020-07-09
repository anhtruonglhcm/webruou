<?php
    namespace App\Http\Composers;

    use Illuminate\Contracts\View\View;
    use App\Models\Cate_product;
    use App\Models\Support;
    use App\Models\Post;
    use App\Models\Cate_post;
    use App\Models\Slide;

    class SidebarComposer
    {
        public function compose(View $view)
        {
            $sidebar = Post::where('status', 1)->orderBy('id', 'DESC')->take(5)->get();

            $data = [
                'sidebar' => $sidebar,
            ];

            $view->with($data);
        }
    }
