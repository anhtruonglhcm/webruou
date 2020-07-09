<?php
    namespace App\Http\Composers;

    use Illuminate\Contracts\View\View;
    use App\Models\Setting;
    use App\Models\Slide;

    class SettingComposer
    {
        public function compose(View $view)
        {
            $setting = Setting::first();
            $slide = Slide::where('status', 1)->where('dislay', 1)->orderBy('position', 'ASC')->get();

            $data = [
                'setting' => $setting,
                'slide' => $slide,
            ];

            $view->with($data);
        }
    }
