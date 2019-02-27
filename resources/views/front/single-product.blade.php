<!-- Start Banner Area -->
<section class="banner-area clearfix organic-breadcrumb singleproductWrapper">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<h1>{{!empty(ucfirst($productdata['title']))?(ucfirst($productdata['title'])):''}}</h1>
				<nav class="d-flex align-items-center">
					<a href="{{url('/')}}">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="javascript:void(0);">{{!empty(ucfirst($productdata['title']))?(ucfirst($productdata['title'])):''}}</a>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- End Banner Area -->

<!--================Single Product Area =================-->
<div class="product_image_area singleProduct">
	<div class="container">
		<div class="row s_product_inner">
			<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 col-xs">
				<div class="categoryproductZoom">
					<div class="preview col">
					    <div class="api-controls">
					       {{--  <button class="cfg-btn" onclick="MagicZoom.prev('Zoom-1')">Prev</button>
					        <button class="cfg-btn" onclick="MagicZoom.next('Zoom-1')">Next</button>
					        <button class="cfg-btn" onclick="MagicZoom.zoomIn('Zoom-1')">Zoom In</button> --}}
					        {{-- <button class="cfg-btn" onclick="MagicZoom.zoomOut('Zoom-1')">Zoom Out</button> --}}
					    </div>
					    <div class="app-figure" id="zoom-fig">
					        <a id="Zoom-1" class="MagicZoom"
					            href="{{url('assets/images/products')}}/{{$productdata['feature_image']}}">
					            <img src="{{url('assets/images/products')}}/{{$productdata['feature_image']}}" alt=""/>
					        </a>
					        <div class="selectors" id="galleries">
					        	<ul id="myList">
					        		<a data-zoom-id="Zoom-1" href="{{url('assets/images/products')}}/{{$productdata['feature_image']}}"><img src="{{url('assets/images/products')}}/{{$productdata['feature_image']}}" alt=""/></a>
					        	@foreach($gallery as $galimages)
						           	<a data-zoom-id="Zoom-1"
						                href="{{url('assets/images/Product Gallery')}}/{{$galimages['images']}}"
						                data-image="{{url('assets/images/Product Gallery')}}/{{$galimages['images']}}">
						            	<img srcset="{{url('assets/images/Product Gallery')}}/{{$galimages['images']}}" src="{{url('assets/images/Product Gallery')}}/{{$galimages['images']}}"/>
						            </a>
					            @endforeach
						        </ul>
					        </div>
					    </div>
				   	</div>
				</div>
			</div>
			<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 col-xs">
				<div class="s_product_text">
					<h3>{{ucfirst($productdata['title'])}}</h3>
					<!-- <h2>${{$productdata['price']}}</h2> -->
					<ul class="list">
						<li><a class="active"><span>Category:</span>{{!empty($productdata['category']['name'])?$productdata['category']['name']:''}}</a></li>
						<!-- <li><a href="#"><span>Availibility:</span>
						@if(!empty($productdata['stock']))
							In Stock
						@else
						<span>Out of Stock</span>
						@endif
					</a></li> -->
					</ul>
					<p>{{trim(html_entity_decode(strip_tags(!empty($productdata['description'])?$productdata['description']:'')))}}</p>
					<div class="product_count">
						<label for="qty">Quantity:</label>
						<input type="number" name="qty" id="qty" maxlength="12" min="1" value="1" title="Quantity:" class="input-text qty">
						
					</div>
					<div class="card_area d-flex align-items-center">
						<button type="button" id="getquotes" class="primary-btn" data-toggle="modal" data-target="#myModal">Get Quotes</button>
					</div>
					<div class="share-box detail-info-entry">
                        <!-- AddToAny BEGIN -->
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                            <a class="a2a_dd" href="https://#"></a>
                            <a class="a2a_button_facebook"></a>
                            <a class="a2a_button_twitter"></a>
                            <a class="a2a_button_google_plus"></a>
                            <a class="a2a_button_linkedin"></a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->
                        <div class="title">Share in social media</div>

                        <div class="clear"></div>
                    </div>
					<div class="modal modalWrapper fade" id="myModal" role="dialog">
					    <div class="modal-dialog">
					      <div class="modal-content">
					        <div class="modal-header">
					          <button type="button" class="close" data-dismiss="modal">&times;</button>
					        </div>
					        <div class="modal-header-btm">
					        	<h3 class="modal-title">Product Enquiry</h3>
					        </div>
					        <div class="modal-body popupmodal-body">
								<form role="productenquiry" action="{{url('enquiry')}}" method="POST">
						        	<div class="form-group">
						        		{{csrf_field()}}
									<div class="col-md-12">
										<div class="form-group">
											<input type="hidden" id="id" name="product_id" class="form-control" value="{{!empty($productdata['id'])?$productdata['id']:''}}">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="hidden" class="form-control" id="quantity" name="quantity" >
										</div>
									</div>
									<div class="form-group">
	                                  	<label for="usr">Product Name:</label>
	                                  	<input name="product" {{-- value="{{ old('email') }}" --}} placeholder="" class="form-control" type="text" disabled value="{{!empty($productdata['title'])?$productdata['title']:''}}">
	                                </div>
						        	<div class="form-group">
	                                  	<label for="usr">Name:</label>
	                                  	<input name="name" placeholder="Enter Name" class="form-control" type="text">
	                                </div>
						        	<div class="form-group">
	                                  	<label for="usr">Email:</label>
	                                  	<input name="email" placeholder="Enter Email" class="form-control" type="text">
	                                </div>
						        	<div class="form-group">
	                                  	<label for="usr">Mobile Number:</label>
	                                  	<input name="mobile" placeholder="Enter Mobile Number" class="form-control" type="text">
	                                </div>
							        <div class="modal-footer">
							          <button type="button" id="product_enq" class="btn btn-info" data-request="ajax-submit" data-target='[role="productenquiry"]'>Submit</button>
							        </div>
						        </form>
					        </div>
					      </div>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!--================End Single Product Area =================-->

<!-- Start related-product Area -->
<section class="related-product-area section_gap_bottom">
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
								<a href="{{url('product')}}/{{___encrypt($popular_products['id'])}}" class="title">{{!empty($popular_products->title)?$popular_products->title:''}}</a>
								<!-- <div class="price">
									<h6>${{!empty($popular_products->price)?$popular_products->price:''}}</h6>
									<h6 class="l-through">${{!empty($popular_products->previous_price)?$popular_products->previous_price:''}}</h6>
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

@section('requirejs')
<script type="text/javascript" language="javascript">
	$(function() {
		$("#getquotes").on("click", function() {
			var qty = $("#qty").val();
			$("#quantity").val(qty);
		});
	})
</script>
<script type="text/javascript">
   var mzOptions = {};
    mzOptions = {
        onZoomReady: function() {
            console.log('onReady', arguments[0]);
        },
        onUpdate: function() {
            console.log('onUpdated', arguments[0], arguments[1], arguments[2]);
        },
        onZoomIn: function() {
            console.log('onZoomIn', arguments[0]);
        },
        onZoomOut: function() {
            console.log('onZoomOut', arguments[0]);
        },
        onExpandOpen: function() {
            console.log('onExpandOpen', arguments[0]);
        },
        onExpandClose: function() {
            console.log('onExpandClosed', arguments[0]);
        }
    };
    var mzMobileOptions = {};

    function isDefaultOption(o) {
        return magicJS.$A(magicJS.$(o).byTag('option')).filter(function(opt){
            return opt.selected && opt.defaultSelected;
        }).length > 0;
    }

    function toOptionValue(v) {
        if ( /^(true|false)$/.test(v) ) {
            return 'true' === v;
        }
        if ( /^[0-9]{1,}$/i.test(v) ) {
            return parseInt(v,10);
        }
        return v;
    }

    function makeOptions(optType) {
        var  value = null, isDefault = true, newParams = Array(), newParamsS = '', options = {};
        magicJS.$(magicJS.$A(magicJS.$(optType).getElementsByTagName("INPUT"))
            .concat(magicJS.$A(magicJS.$(optType).getElementsByTagName('SELECT'))))
            .forEach(function(param){
                value = ('checkbox'==param.type) ? param.checked.toString() : param.value;

                isDefault = ('checkbox'==param.type) ? value == param.defaultChecked.toString() :
                    ('SELECT'==param.tagName) ? isDefaultOption(param) : value == param.defaultValue;

                if ( null !== value && !isDefault) {
                    options[param.name] = toOptionValue(value);
                }
        });
        return options;
    }

    function updateScriptCode() {
        var code = '&lt;script&gt;\nvar mzOptions = ';
        code += JSON.stringify(mzOptions, null, 2).replace(/\"(\w+)\":/g,"$1:")+';';
        code += '\n&lt;/script&gt;';

        magicJS.$('app-code-sample-script').changeContent(code);
    }

    function updateInlineCode() {
        var code = '&lt;a class="MagicZoom" data-options="';
        code += JSON.stringify(mzOptions).replace(/\"(\w+)\":(?:\"([^"]+)\"|([^,}]+))(,)?/g, "$1: $2$3; ").replace(/\{([^{}]*)\}/,"$1").replace(/\s*$/,'');
        code += '"&gt;';

        magicJS.$('app-code-sample-inline').changeContent(code);
    }

    function applySettings() {
        MagicZoom.stop('Zoom-1');
        mzOptions = makeOptions('params');
        mzMobileOptions = makeOptions('mobile-params');
        MagicZoom.start('Zoom-1');
        updateScriptCode();
        updateInlineCode();
        try {
            prettyPrint();
        } catch(e) {}
    }

    function copyToClipboard(src) {
        var
            copyNode,
            range, success;

        if (!isCopySupported()) {
            disableCopy();
            return;
        }
        copyNode = document.getElementById('code-to-copy');
        copyNode.innerHTML = document.getElementById(src).innerHTML;

        range = document.createRange();
        range.selectNode(copyNode);
        window.getSelection().addRange(range);

        try {
            success = document.execCommand('copy');
        } catch(err) {
            success = false;
        }
        window.getSelection().removeAllRanges();
        if (!success) {
            disableCopy();
        } else {
            new magicJS.Message('Settings code copied to clipboard.', 3000,
                document.querySelector('.app-code-holder'), 'copy-msg');
        }
    }

    function disableCopy() {
        magicJS.$A(document.querySelectorAll('.cfg-btn-copy')).forEach(function(node) {
            node.disabled = true;
        });
        new magicJS.Message('Sorry, cannot copy settings code to clipboard. Please select and copy code manually.', 3000,
            document.querySelector('.app-code-holder'), 'copy-msg copy-msg-failed');
    }

    function isCopySupported() {
        if ( !window.getSelection || !document.createRange || !document.queryCommandSupported ) { return false; }
        return document.queryCommandSupported('copy');
    }
</script>
@endsection	