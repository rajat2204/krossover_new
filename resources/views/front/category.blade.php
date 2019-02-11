<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>{{!empty($cats['name'])?$cats['name']:''}}</h1>
					<nav class="d-flex align-items-center">
						<a href="{{url('/')}}">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="javascript:void(0);">{{!empty($cats['name'])?$cats['name']:''}}</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
<!-- End Banner Area -->
	
	<section class="section_gap">
		<div class="container">
			<div class="row">
				<div class="col-xl-3 col-lg-4 col-md-5">
					<div class="sidebar-categories">
						<div class="head">Browse Categories</div>
						<ul class="main-categories">
							<li class="main-nav-list sub_cat_filter" id="sub_cat_filter0"><a href="javascript:void(0);" class="nav-link">All</a></li>
			            	<input type="hidden" id="catid" name="cat_id" value="{{!empty($cats['cat_id'])?$cats['cat_id']:''}}">
			            	<input type="hidden" id="subcatid" name="cat_id" value="{{!empty($subcatid)?$subcatid:''}}">
							@php
				            	$subcategory = \App\Models\Subcategories::where('status','active')->where('cat_id',$cats['cat_id'])->get();
							if(!empty($subcategory)){
								$i=0;
								foreach($subcategory as $subcat){
									$i++;
									/*{{url('/category/sub')}}/{{$subcat->slug}}*/
								@endphp
									<li class="main-nav-list sub_cat_filter" id="sub_cat_filter{{$i}}"><a href="javascript:void(0)" class="nav-link">{{!empty($subcat->name)?($subcat->name):''}}</a>
									</li>
									<input type="hidden" name="sub_cat_filter_val" id="sub_cat_filter_val{{$i}}" value="{{$subcat->id}}">
								@php	
								}
							}
				            @endphp
						</ul>
					</div>
					<!-- <div class="sidebar-filter mt-50">
						<div class="top-filter-head">Product Filters</div>
						<div class="common-filter">
							<div class="head">Price</div>
							<div class="price-range-area">
								<div id="price-range"></div>
								<div class="value-wrapper d-flex">
									<div class="price">Price:</div>
									<span>$</span>
									<div id="lower-value"></div>
									<div class="to">to</div>
									<span>$</span>
									<div id="upper-value"></div>
								</div>
							</div>
						</div>
					</div> -->
				</div>


				<div class="col-xl-9 col-lg-8 col-md-7">
					<!-- Start Filter Bar -->

					<div id="products_cus">
					<div class="filter-bar d-flex flex-wrap align-items-center" id="products_cus1">
						<div class="sorting">
							{{-- <select>
								<option value="1">Default sorting</option>
							</select> --}}
						</div>
						<div class="sorting mr-auto">
							{{-- <select>
								<option value="1">Show 12</option>
							</select> --}}
						</div>
						<div class="pagination">
							{{-- <a href="" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
							<a href="#" class="active">1</a>
							<a href="#">2</a>
							<a href="#">3</a>
							<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
							<a href="#">6</a>
							<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> --}}
						</div>
					</div>
					<!-- End Filter Bar -->

					<!-- Start Best Seller -->
					<section class="lattest-product-area pb-40 category-list" id="products">
						<div class="row">
							<div class="col-lg-12 col-md-6">
								<div class="single-product">
									{{-- <a href=""><img class="img-fluid" src="" style="height: 320px;" alt="Product Image" /></a> --}}
									<div class="product-details" id="datatable">
										{!!$html->table()!!}
									</div>
								</div>
							</div>
						</div>
					</section>
					<!-- End Best Seller -->
				</div>
				</div>
			</div>
		</div>
	</section>

<!-- Start related-product Area -->
	<section class="related-product-area section_gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Deals of the Week</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
							magna aliqua.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
						@if(\App\Models\Products::where('status','active')->count() >0)
                  @php
                    $popular_product = \App\Models\Products::take(9)->orderBy('id','DESC')->where('featured','1')->where('status','active')->get();
                  @endphp
                    @foreach($popular_product as $popular_products)
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="{{url('product')}}/{{___encrypt($popular_products['id'])}}"><img src="{{url('assets/images/products')}}/{{$popular_products->feature_image}}" style="width: 70px; height:70px;" alt=""></a>
								<div class="desc">
									<a href="{{url('product')}}/{{___encrypt($popular_products['id'])}}" class="title">{{!empty($popular_products->title)?($popular_products->title):''}}</a>
									<!-- <div class="price">
										<h6>${{!empty($popular_products->price)?($popular_products->price):''}}</h6>
										<h6 class="l-through">${{!empty($popular_products->previous_price)?($popular_products->previous_price):''}}</h6>
									</div> -->
								</div>
							</div>
						</div>
						@endforeach
              			@endif
					</div>
				</div>
				<div class="col-lg-3">
					<div class="ctg-right">
						<a href="#" target="_blank">
							@if(!empty($offer[1]['image']))
							<img class="img-fluid d-block mx-auto" src="{{url('assets/images/offers')}}/{{$offer[1]['image']}}" alt="">
							@else
			               <div class="offer_text">
			                <h1>{{!empty($offer[1]['text'])?$offer[1]['text']:''}}</h1>
			               </div>
			              @endif
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- End related-product Area -->

@section('requirejs')
{!! $html->scripts()!!}
<script type="text/javascript">
	$(function(){
		$( ".sub_cat_filter" ).each(function( index ) {
		 	$(document).on('click','#sub_cat_filter'+index,function(){
		 		var id    = $("#sub_cat_filter_val"+index).val();
			   LaravelDataTables["dataTableBuilder"].on('preXhr.dt', function ( e, settings, data) {
				   data.sub_cat_filter  = id;
			   });
			   window.LaravelDataTables.dataTableBuilder.draw();
		   	});
	    });
	});
    $(function(){
        if(document.getElementById("price-range")){
        var nonLinearSlider = document.getElementById('price-range');
        var maxvalue = "{{!empty($highPrice->price)?($highPrice->price):0}}";
        var minvalue = "{{!empty($lowPrice->price)?($lowPrice->price):0}}";
        noUiSlider.create(nonLinearSlider, {
            connect: true,
            behaviour: 'tap',
            start: [parseInt(minvalue) , parseInt(maxvalue)],
            range: {
                'min': [parseInt(minvalue)],
                'max': [parseInt(maxvalue)]
            }
        });
        var nodes = [
            document.getElementById('lower-value'),
            document.getElementById('upper-value')
        ];
        nonLinearSlider.noUiSlider.on('update', function ( values, handle, unencoded, isTap, positions ) {

            nodes[handle].innerHTML = values[handle];
            var minPrice = values[0];
            var maxPrice = values[1];
            var catId = $('#catid').val();
            var subcatid = $('#subcatid').val();

					LaravelDataTables["dataTableBuilder"].on('preXhr.dt', function ( e, settings, data ) {
						data.min_price    = minPrice;
						data.max_price    = maxPrice;
					}); 
					window.LaravelDataTables.dataTableBuilder.draw();
        	});
        }

    });
   
</script>

@endsection


