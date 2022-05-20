<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                @foreach($categories as $category)
                     <li class="active"><a href="{{ route('product_by_cat',['id'=>$category->id]) }}">{{ $category->name }}</a></li>
                @endforeach

            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
