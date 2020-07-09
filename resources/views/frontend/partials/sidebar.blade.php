<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
    <div class="bar-right">
        <div class="cate-bar">
            <h3><i class="fas fa-align-justify"></i>Tin tức mới</h3>
        </div>
        @foreach ($sidebar as $b)
        <div class="list-bar">
            <div class="row qe">
                <div class="col-xs-6 col-sm-6 col-md-6 as">
                    <div class="imganh" style="overflow: hidden;">
                        <a href="{{ route('detail', $b->slug) }}"><img src="{{ asset($b->image) }}" alt="" class="img-hover"></a>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 ca">
                    <div class="tensb">
                        <a href="{{ route('detail', $b->slug) }}"><h5>{{ str_limit($b->name, 70) }}</h5></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>