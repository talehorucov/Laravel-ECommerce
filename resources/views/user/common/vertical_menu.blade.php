<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            @foreach ($categories as $category)
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle"
                        data-toggle="dropdown"><i style="font-size: 20px; margin-right:10px"
                            class="{{ $category->icon }}"
                            aria-hidden="true"></i>{{ $category->name }}</a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                @foreach ($category->subcategories as $subcategory)
                                    <div class="col-sm-12 col-md-3">
                                        <h2 class="title">{{ $subcategory->name }}</h2>
                                        @foreach ($subcategory->subsubcategories as $subsubcategory)
                                            <ul class="links list-unstyled">
                                                <li><a href="#">{{ $subsubcategory->name }}</a></li>
                                            </ul>
                                        @endforeach

                                    </div>
                                @endforeach

                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                    <!-- /.dropdown-menu -->
                </li>
                <!-- /.menu-item -->
            @endforeach
        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>