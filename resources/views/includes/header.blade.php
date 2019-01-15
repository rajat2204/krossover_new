<header class="header_area sticky-header">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light main_box">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="{{url('/')}}"><img src="{{url('img/logo.png')}}" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
           aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto">
              <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Home</a></li>
             
              @if(\App\Models\Category::where('status','active')->count() >0)
              @php
                $menus = \App\Models\Category::where('status','active')->get();
              @endphp
                @foreach($menus as $menu)
                  <li class="nav-item submenu dropdown">
                    <a href="{{url('/category/main')}}/{{$menu->slug}}" class="nav-link">{{$menu->name}}</a>
                   
                    @if(\App\Models\Subcategories::where('cat_id',$menu->id)->where('status','active')->count() >0)
                      <ul class="dropdown-menu">
                        @foreach(\App\Models\Subcategories::where('cat_id',$menu->id)->where('status','active')->get() as $submenu)
                          <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="{{url('/category/sub')}}/{{$submenu->slug}}">{{$submenu->name}}</a>
                           {{--  <ul class="dropdown-menu sub-dropdown">
                              @foreach(\App\Models\Childcategories::where('sid',$submenu->id)->where('status','active')->get() as $childmenu)
                              
                              <li class="nav-item"><a class="child nav-link" href="category.html">{{$childmenu->name}}</a></li>
                              @endforeach
                            </ul> --}}
                          </li>
                        @endforeach
                      </ul>
                    @endif
                  </li>
                @endforeach
              @endif
              {{-- <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                 aria-expanded="false">Blog</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                  <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
                </ul>
              </li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                 aria-expanded="false">Pages</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                  <li class="nav-item"><a class="nav-link" href="tracking.html">Tracking</a></li>
                  <li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
                </ul>
              </li>
              <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li> --}}
            </ul>
            <ul class="nav navbar-nav navbar-right">
              {{-- <li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li> --}}
              <li class="nav-item">
                <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div class="search_input" id="search_input_box">
      <div class="container">
        <form class="d-flex justify-content-between">
          <input type="text" class="form-control" id="search_input" placeholder="Search Here">
          <button type="submit" class="btn"></button>
          <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
        </form>
      </div>
    </div>
</header>