<div class="sidebar-widget product-tag wow fadeInUp outer-bottom-xs animated">
    <h3 class="section-title">Məhsul Təqləri</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @foreach ($tags as $tag)
                <a class="item active" href="{{ route('user.tags',strtolower($tag->name)) }}">{{ $tag->name }}</a>
            @endforeach
        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
