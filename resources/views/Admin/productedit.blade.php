<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Add Product</h1>
	</div>
</div><!--/.row-->

<div class="panel panel-default">
	<div class="panel-body">
		<div class="col-md-6">
			<form role="edit-product" data-request="enable-enter" method="POST" action="{!! action('Admin\ProductController@update') !!}" class="form-horizontal form-label-left">
				{{csrf_field()}}
				<div class="form-group">
					<label>Product Name:</label>
					<input class="form-control" id="name" name="name" placeholder="E.g. Men's Clothing">
				</div>
				<div class="form-group">
					<label  class="control-label col-md-3 col-sm-3 col-xs-12">Main Category:</label>
					<select class="form-control">
						<option>Option 1</option>
						<option>Option 2</option>
					</select>
				</div>

				<div class="form-group">
					<label  class="control-label col-md-3 col-sm-3 col-xs-12">Sub Category:</label>
					<select class="form-control">
					</select>
				</div>

				<div class="form-group">
                    <label  class="control-label col-md-3 col-sm-3 col-xs-12"> Current Featured Image</label>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <input onchange="readURL(this)" id="uploadFile" accept="" name="" type="file">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="checkbox">
                            <label><input type="checkbox" name="" id="" value="1"><strong>Allow Product Sizes</strong></label>
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

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Description</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea name="" id="" class="form-control" rows="6" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Current Price for User</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" name="" placeholder="e.g 20" pattern="[0-9]+(\.[0-9]{0,2})?%?"
                               title="Price must be a numeric or up to 2 decimal places." type="number">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Previous Price for User</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" name="" placeholder="e.g 25" pattern="[0-9]+(\.[0-9]{0,2})?%?"
                               title="Price must be a numeric or up to 2 decimal places." type="number">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Stock</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" name="" placeholder="e.g 15" pattern="[0-9]{1,10}" type="number">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Buy/Return Policy</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea name="policy" id="" class="form-control" rows="6"></textarea>
                    </div>
                </div>
					<button type="button" class="btn btn-success btn-block edit_product" data-request="ajax-submit" data-target='[role="edit-product"]'>Edit Product</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
    setTimeout(function(){
        $('[data-request="enable-enter"]').on('keyup','input',function (e) {
        e.preventDefault();
        if (e.which == 13) {
        $('[data-request="enable-enter"]').find('.edit_product').trigger('click');
        return false;   
        }
    }); 
},100);
</script>