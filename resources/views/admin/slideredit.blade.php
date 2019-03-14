<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li class="active">Edit Slider</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<div class="clearfix">
				<h1 class="page-header">Edit Slider</h1>
				<div class="pull-right back-admin">
	                <a href="{!! url('admin/sliders') !!}" class="btn btn-info btn-back"><i class="fa fa-arrow-left"></i> Back</a>
	            </div>
	        </div>
		</div>
	</div><!--/.row-->
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
				<form role="edit-slider" method="POST" action="{{url('admin/sliders/'.___encrypt($slider['id']))}}" class="form-horizontal form-label-left">
					{{csrf_field()}}
					<input type="hidden" value="PUT" name="_method">
						<div class="col-md-12">
							<div class="form-group">
								<input type="hidden" id="id" name="id" class="form-control" value="{{!empty($slider['id'])?$slider['id']:''}}">
							</div>
						</div>

					<div class="item form-group">
    					<label>Slider Image:</label>
    					<select class="form-control" name="main_id" id="main_id">
                            <option value="">Select Product Image</option>
                            @foreach($products as $product)
                            	@if($product->id == $slider['product_id'])
                                	<option value="{{!empty($product->id)?$product->id:''}}" data-picture="{{asset('assets/images/products')}}/{{!empty($product->feature_image)?$product->feature_image:''}}" selected="">{{!empty($product->title)?$product->title:''}}</option>
                                @else
                                	<option value="{{!empty($product->id)?$product->id:''}}" data-picture="{{asset('assets/images/products')}}/{{!empty($product->feature_image)?$product->feature_image:''}}">{{!empty($product->title)?$product->title:''}}</option>
                                @endif
                            @endforeach
    					</select>
    				</div>
					
                    <div class="item form-group">
	                    <label> Current Featured Image:</label>
	                    <div id="image_div">
	                        <input onchange="readURL(this)" id="uploadFile" accept="image/*" name="image" type="file">
	                        <span>max. size 2 MB.</span>
	                        <span>(700X450 pixels)</span>
	                    </div>
	                    <div class="col-md-12 col-sm-12 col-xs-12">
	                    	@if(!empty($slider['product_id']))
	                       		<img src="{!! url('/') !!}/assets/images/products/{{$slider['image']}}" style="max-height: 300px;" alt="No Banner Photo" id="adminimg">
                    		@else
                            	<img src="{!! url('/') !!}/assets/images/sliders/{{$slider['image']}}" style="max-height: 300px;" alt="No Banner Photo">
                            @endif
	                    </div>
	                </div>

					<div class="form-group">
						<label>Slider Title:</label>
						<input class="form-control" id="title" name="title" value="{{!empty($slider['title'])?$slider['title']:''}}" placeholder="E.g. Men's Clothing">
					</div>
					<div class="form-group">
						<label>Slider Text:</label>
						<input class="form-control" id="text" name="text" value="{{!empty($slider['text'])?$slider['text']:''}}" placeholder="E.g. men's clothing">
					</div>
						<button type="button" class="btn btn-success btn-block" data-request="ajax-submit" data-target='[role="edit-slider"]'>Edit Slider</button>
					</div>
				</form>
			</div>
		</div>
	</div>		
</div>

@section('requirejs')
<script type="text/javascript">
	
    function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#adminimg').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

@endsection
