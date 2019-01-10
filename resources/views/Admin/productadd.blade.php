<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Add Product</h1>
	</div>
</div><!--/.row-->

<div class="panel panel-default">
	<div class="panel-body">
		<div class="col-md-6">
			<form role="add-product" data-request="enable-enter" method="POST" action="{!! action('Admin\ProductController@store') !!}" class="form-horizontal form-label-left">
				{{csrf_field()}}
    				<div class="item form-group">
    					<label>Product Name:</label>
    					<input class="form-control" id="name" name="title" placeholder="E.g. Men's Clothing">
    				</div>

    				<div class="item form-group">
    					<label  class="control-label col-md-3 col-sm-3 col-xs-12">Main Category:</label>
    					<select class="form-control" name="" id="">
                            <option value="">Select Main Category</option>
    					</select>
    				</div>

    				<div class="item form-group">
    					<label  class="control-label col-md-3 col-sm-3 col-xs-12">Sub Category:</label>
    					<select class="form-control" name="" id="">
                            <option value="">Select Sub Category</option>
    					</select>
    				</div>

    				<div class="item form-group">
    					<label  class="control-label col-md-3 col-sm-3 col-xs-12">Child Category:</label>
    					<select class="form-control" name="" id="">
                            <option value="">Select Child Category</option>
    					</select>
    				</div>

    				<div class="item form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12"> Current Featured Image</label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                           <img style="max-width: 250px;" src="{{asset('/img/avatar.png')}}" id="adminimg" alt="No Featured Image Added">
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input onchange="readURL(this)" id="uploadFile" accept="image/*" name="feature_image" type="file">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Product Gallery Images</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" accept="" name="photo" multiple/>
                            <br>
                            <p class="small-label">Multiple Image Allowed</p>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="checkbox">
                                <label><input type="checkbox" name="pallow" id="allow" value="1"><strong>Allow Product Sizes</strong></label>
                            </div>
                        </div>
                    </div>

                    <div class="item form-group" id="pSizes" style="display: none;">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Sizes<span class="required">*</span>
                            <p class="small-label">(Write your own size Separated by Comma[,])</p>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="sizes" value="X,XL,XXL,M,L,S" data-role="tagsinput"/>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Description</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="description" id="" class="form-control" rows="6" required></textarea>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Current Price for User</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="price" placeholder="e.g 20" pattern="[0-9]+(\.[0-9]{0,2})?%?"
                                   title="Price must be a numeric or up to 2 decimal places." type="number">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Previous Price for User</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="previous_price" placeholder="e.g 25" pattern="[0-9]+(\.[0-9]{0,2})?%?"
                                   title="Price must be a numeric or up to 2 decimal places." type="number">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Current Price for Retailer</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="retailer_price" placeholder="e.g 20" pattern="[0-9]+(\.[0-9]{0,2})?%?"
                                   title="Price must be a numeric or up to 2 decimal places." type="number">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Previous Price for Retailer</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="retailer_previous_price" placeholder="e.g 25" pattern="[0-9]+(\.[0-9]{0,2})?%?"
                                   title="Price must be a numeric or up to 2 decimal places." type="number">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Stock</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" name="stock" placeholder="e.g 15" pattern="[0-9]{1,10}" type="number">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Buy/Return Policy</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="policy" id="" class="form-control" rows="6"></textarea>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">
                        </label>
                        <div class="col-md-9 col-sm-6 col-xs-12" data-toggle="buttons">
                            <label class="btn btn-default">
                                <input type="checkbox" name="featured" value="" autocomplete="off">
                                <span class="go_checkbox"><i class="glyphicon glyphicon-ok"></i></span>
                                Add to Featured Product
                            </label>
                        </div>
                    </div>

					<button type="button" class="btn btn-success btn-block add_product" data-request="ajax-submit" data-target='[role="add-product"]'>Add Product</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>

@section('requirejs')
<script type="text/javascript">
    setTimeout(function(){
        $('[data-request="enable-enter"]').on('keyup','input',function (e) {
        e.preventDefault();
        if (e.which == 13) {
        $('[data-request="enable-enter"]').find('.add_product').trigger('click');
        return false;   
        }
    }); 
},100);
</script>

<script type="text/javascript">
    $("#allow").change(function () {
           $("#pSizes").toggle();
        });

    bkLib.onDomLoaded(function() {
            new nicEditor().panelInstance('description');
            new nicEditor().panelInstance('policy');
        });
</script>
@endsection
