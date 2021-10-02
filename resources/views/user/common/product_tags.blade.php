@php
    $tags = App\Models\Product::groupBy('tags')->select('tags')->get();
@endphp

<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @foreach ($tags as $tag)
                <a class="item active" title="Phone" href="{{ route('user.tags',$tag->tags) }}">{{ str_replace(',',' ',$tag->tags) }}</a>
            @endforeach
        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
