<header class="header_area sticky-header">
    <div class="main_menu">
      <div class="top">
        <div class="container-fluid">
          <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6 col-10">
                 <div class="phone-e">
                      <a href="tel:{{!empty($contact[0]['mobile'])?$contact[0]['mobile']:''}}" target="_blank"><i class="fa fa-phone"></i>{{!empty($contact[0]['mobile'])?$contact[0]['mobile']:''}}</a>
                      <a href="mailto:{{!empty($contact[0]['email'])?$contact[0]['email']:''}}" target="_blank"><i class="fa fa-envelope:"></i>  {{!empty($contact[0]['email'])?$contact[0]['email']:''}}</a>
                  </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6 col-2">
                  <div class="footer-social text-right" id="top-social">
                      <a href="{{$social[0]['url']}}" target="_blank"><i class="fa fa-facebook"></i></a>
                      <a href="{{$social[1]['url']}}" target="_blank"><i class="fa fa-twitter"></i></a>
                      <a href="{{$social[2]['url']}}" target="_blank"><i class="fa fa-linkedin"></i></a>
                      <a href="{{$social[3]['url']}}" target="_blank"><i class="fa fa-instagram"></i></a>
                  </div>
                  <div class="mobileseach">
                    <form>
                      <i class="fa fa-search searchproduct"></i>
                      <div class="inputsearchblock">    
                        <input type="text" name="search" class="inputsearch" placeholder="Search Products">
                        <i class="fa fa-times crosses"></i>
                      </div>
                    </form>
                  </div>
              </div>
          </div>
        </div>
      </div>
      <nav class="navbar navbar-expand-lg navbar-light main_box">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="{{url('/')}}"><img src="{{url('assets/images/k-logo.png')}}" alt=""></a>
          {{-- <span class="formSearch">
            <form>
              <input type="text" name="search" placeholder="Search Products">
              <i class="fa fa-search"></i>
            </form>
          </span> --}}
          <button class="navbar-toggler menu-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
           aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="close-header-layer"></div>
          <div class="close-menu"></div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="navbar-collapse do-main-menu" >
            <ul class="nav navbar-nav menu_nav ml-auto">
              <li class="nav-item  @if(Request::segment(1)=='') active @endif"><a class="nav-link" href="{{url('/')}}">Home</a></li>
              <li class="nav-item @if(Request::segment(2)=='aboutus') active @endif"><a class="nav-link" href="{{url('pages/aboutus')}}">About Us</a></li>
              <li class="nav-item @if(Request::segment(1)=='whyus') active @endif"><a class="nav-link" href="{{url('whyus')}}">Why Us</a></li>
              <li class="nav-item submenu dropdown @if(Request::segment(2)=='main') active @endif"><a class="nav-link" href="javascipt:void(0);">Products<i class="fa fa-chevron-down"></i></a>
                @if(\App\Models\Category::where('status','active')->count() >0)
                  @php
                    $menus = \App\Models\Category::where('status','active')->orderBy('name','asc')->get();
                  @endphp
                  <ul class="dropdown-menu">
                    <div class="cscrollbar" id="style-7">
                      <div class="force-overflow">
                    @foreach($menus as $menu)
                      <li class="nav-item">
                        <a href="{{url('/category/main')}}/{{$menu->slug}}" class="nav-link">{{$menu->name}}</a>
                      </li>
                    @endforeach
                      </div>
                    </div>
                  </ul>
                  @endif   
              </li>
              <!-- <li class="nav-item @if(Request::segment(1)=='gallery') active @endif"><a class="nav-link" href="{{url('gallery')}}">Inspirational Gallery</a></li> -->
              <li class="nav-item @if(Request::segment(1)=='most-popular') active @endif"><a class="nav-link" href="{{url('most-popular')}}">Featured Products</a></li>
              <li class="nav-item @if(Request::segment(1)=='catalogue') active @endif"><a class="nav-link" href="{{url('/catalogue')}}">Catalogue</a></li>
              <!-- <li class="nav-item submenu dropdown @if(Request::segment(2)=='main') active @endif"><a class="nav-link" href="javascipt:void(0);">Products</a>
                @if(\App\Models\Category::where('status','active')->count() >0)
                  @php
                    $menus = \App\Models\Category::where('status','active')->orderBy('name','asc')->get();
                  @endphp
                  <ul class="dropdown-menu">
                    @foreach($menus as $menu)
                      <li class="nav-item">
                      <a href="{{url('/category/main')}}/{{$menu->slug}}" class="nav-link">{{$menu->name}}</a>
                      </li>
                    @endforeach
                </ul>
                @endif
              </li> -->
              <li class="nav-item @if(Request::segment(1)=='contactus') active @endif"><a class="nav-link" href="{{url('/contactus')}}">Contact Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
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
          <input type="text" class="form-control" name="q" size="90" onkeyup="getSuggestion(this.value)" autocomplete="off"  id="search_input" placeholder="Product Name or Product Code...">
          <button type="submit" class="btn"></button>
          <span class="lnr lnr-magnifier-cross" id="close_search" title="Close Search"></span>
        </form>
          <ul id="suggestion">
            @php
              $products = \App\Models\Products::where('status', 'active')->get();
            @endphp
            @if(!empty($products))
              @foreach($products as $product)
              <li><a href="{{url('product')}}/{{___encrypt($product->id)}}">{{!empty($product->title)?$product->title:''}} -- {{!empty($product->code)?$product->code:''}}</a></li>
              @endforeach
            @endif
          </ul>
      </div>
    </div>
</header>

<script>
  var header = document.getElementById("navbarSupportedContent");
  var list = header.getElementsByClassName("nav-item");
  for (var i = 0; i < list.length; i++) {
    list[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
    });
  }

  function getSuggestion(q){
    $.ajax({
      type: "GET",
      url: "{{url('search')}}",
      data: {item:q},
      success:function(data){
      console.log(data);
        $("#suggestion").html(data);
      }
    });
  }
</script>