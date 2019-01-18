<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Edit Product</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Product</h1>
            <div class="pull-right">
                <a href="{!! url('admin/products') !!}" class="btn btn-default btn-back"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
    </div><!--/.row-->

<div class="panel panel-default">
	<div class="panel-body">
		<div class="col-md-6">
			<form role="edit-product" data-request="enable-enter" method="POST" class="form-horizontal form-label-left">
				{{csrf_field()}}
				<div class="form-group">
					<label>Product Name:</label>
					<input class="form-control" id="name" name="title" value="{{$product['title']}}" placeholder="E.g. Men's Clothing">
				</div>
				<div class="form-group">
					<label  class="control-label col-md-3 col-sm-3 col-xs-12">Main Category:</label>
					<select class="form-control" name="main_id" id="main_id">
                        <option value="">Select Main Category</option>
                        @foreach($categories as $categoriess)
                            <option value="{{$categoriess['id']}}" @if($categoriess['id'] == $product['main_id']) selected @endif >{{$categoriess['name']}}</option>
                        @endforeach
					</select>
				</div>

				<div class="form-group">
					<label  class="control-label col-md-3 col-sm-3 col-xs-12">Sub Category:</label>
					<select class="form-control" name="sub_id" id="subcategory">
                        <option value="">Select Main Category</option>
                        @foreach($subcategory as $subcategories)
                            @if($subcategories['id'] == $product['sub_id'])
                                <option value="{{$product['sub_id']}}" selected>{{$subcategories['name']}}</option>
                            @else
                                <option value="{{$product['sub_id']}}">{{$subcategories['name']}}</option>
                            @endif
                        @endforeach
					</select>
				</div>

                <div class="form-group">
                    <label  class="control-label col-md-3 col-sm-3 col-xs-12">Product Brand:</label>
                    <select class="form-control" name="brand_id" id="brandid">
                        <option value="">Select Brand</option>
                        @foreach($brands as $brand)
                            <option value="{{$brand['id']}}" @if($brand['id'] == $product['brand_id']) selected @endif >{{$brand['brand_name']}}</option>
                        @endforeach
                    </select>
                </div>

				<div class="item form-group">
                    <label  class="control-label col-md-3 col-sm-3 col-xs-12"> Current Featured Image</label>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                       <img style="max-width: 250px;" src="{{url('assets/images/products')}}/{{$product['feature_image']}}" id="adminimg" alt="No Featured Image Added">
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <input onchange="readURL(this)" id="uploadFile" accept="image/*" name="feature_image" type="file">
                    </div>
                </div>

                <div class="item form-group">
                    <label  class="control-label col-md-3 col-sm-3 col-xs-12">Product Color:</label>
                    @foreach($color as $colors)
                        <label class="checkbox-inline">
                        @foreach($product_color as $product_colors)
                            <input type="checkbox" id="id" name="color_name[]" @php if($product_colors->color_id==$colors->id){ echo "checked"; } @endphp value="{{$colors->id}}"> {{$colors->color_name}}
                        @endforeach    
                        </label>
                    @endforeach
                </div>

                @if($product['sizes'] != null)
                <div class="form-group">
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
                        <input class="form-control col-md-7 col-xs-12" name="sizes" value="{{$product['sizes']}}" data-role="tagsinput"/>
                    </div>
                </div>
                @else
                <div class="form-group">
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
                @endif

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Description</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea name="description" id="" class="form-control" rows="6" required>{{$product['description']}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Current Price for User</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" name="price" value="{{$product['price']}}" placeholder="e.g 20" pattern="[0-9]+(\.[0-9]{0,2})?%?"
                               title="Price must be a numeric or up to 2 decimal places." type="number">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Previous Price for User</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" name="previous_price" value="{{$product['previous_price']}}" placeholder="e.g 25" pattern="[0-9]+(\.[0-9]{0,2})?%?"
                               title="Price must be a numeric or up to 2 decimal places." type="number">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Stock</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" name="stock" value="{{$product['stock']}}" placeholder="e.g 15" pattern="[0-9]{1,10}" type="number">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Buy/Return Policy</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea name="policy" id="" class="form-control" rows="6">{{$product['policy']}}</textarea>
                    </div>
                </div>

                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">
                    </label>
                    <div class="col-md-9 col-sm-6 col-xs-12" data-toggle="buttons">
                        @if($product['featured'] == 1)
                        <label class="checkbox-inline">
                            <input type="checkbox" name="featured" value="1" checked>
                            Add to Featured Product
                        </label>
                        @else
                        <label class="checkbox-inline">
                            <input type="checkbox" name="featured" value="1" autocomplete="off">
                                Add to Featured Product
                            </label>
                        @endif
                    </div>
                </div>
					<button type="button" class="btn btn-success btn-block edit_product" data-request="ajax-submit" data-target='[role="edit-product"]'>Edit Product</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>

@section('requirejs')

<script type="text/javascript">

    bkLib.onDomLoaded(function() {
            new nicEditor().panelInstance('description');
            new nicEditor().panelInstance('policy');
        });

    setTimeout(function(){
        $('[data-request="enable-enter"]').on('keyup','input',function (e) {
        e.preventDefault();
        if (e.which == 13) {
        $('[data-request="enable-enter"]').find('.edit_product').trigger('click');
        return false;   
        }
    }); 
},100);

    function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#adminimg').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#allow").change(function () {
           $("#pSizes").toggle();
        });

    $(document).ready(function(){
        $('#main_id').on('change',function(){
            var value = $(this).val();
            $.ajax({
                url:"{{url('admin/subcategories/ajaxsubcategory?id=')}}"+value,
                type:'POST',
                success:function(data){
                    $('#subcategory').html(data).prev().css("display","block");
                }
            });
        });
    });

</script>