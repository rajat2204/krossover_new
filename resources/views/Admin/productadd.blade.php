<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Add Product</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="clearfix">
                <h1 class="page-header">Add Product</h1>
                <div class="pull-right back-admin">
                    <a href="{!! url('admin/products') !!}" class="btn btn-info btn-back"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <div class="panel panel-default">
    	<div class="panel-body">
    		<div class="col-md-6">
    			<form role="add-product" method="POST" action="{!! action('Admin\ProductController@store') !!}" class="form-horizontal form-label-left">
    				{{csrf_field()}}
        				<div class="item form-group">
                            <label>Product Name:</label>
                            <input class="form-control" id="name" name="title" placeholder="E.g. Men's Clothing">
                        </div>

                        <div class="item form-group">
        					<label>Product Code:</label>
        					<input class="form-control" id="code" name="code" placeholder="E.g. IT-123456">
        				</div>

        				<div class="item form-group">
        					<label>Main Category:</label>
        					<select class="form-control" name="main_id" id="main_id">
                                <option value="">Select Main Category</option>
                                @foreach($categories as $category)
                                    <option value="{{!empty($category->id)?$category->id:''}}">{{!empty($category->name)?$category->name:''}}</option>
                                @endforeach
        					</select>
        				</div>

        				<div class="item form-group">
                            <label>Sub Category:</label>
                            <select class="form-control select_block" name="sub_id" id="subcategory">
                                <option value=" ">Select Sub Category</option>
                            </select>
                        </div>

                        <div class="item form-group">
                            <label>Product Brand:</label>
                            <select class="form-control select_block" name="brand_id" id="brandid">
                                <option value=" ">Select Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{!empty($brand->id)?$brand->id:''}}">{{!empty($brand->brand_name)?$brand->brand_name:''}}</option>
                                @endforeach
                            </select>
                        </div>

        				<div class="item form-group productWrap">
                            <label>Current Featured Image:</label>
                            <div>
                                <input onchange="readURL(this)" id="uploadFile" accept="image/*" name="feature_image" type="file" class="product-size">
                                <span>max. size 2 MB.</span>
                                <span>(225 X 225 pixels)</span>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                               <img style="max-width: 250px;margin-top: 10px;" src="{{asset('/img/avatar.png')}}" id="adminimg" alt="No Featured Image Added">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label> Product Gallery Images:</label>
                            <div>
                                <input type="file" id="gallery" accept="image/*" name="gallery[]" multiple/>
                                <h5 id="errorGal" style="color:#a94442"></h5>
                                <br>
                                <p class="small-label">Multiple Image Allowed</p>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label>Product Color:</label>
                            @foreach($color as $colors)
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="id" name="color_name[]" value="{{!empty($colors->id)?$colors->id:''}}"> {{!empty($colors->color_name)?$colors->color_name:''}}
                                </label>
                            @endforeach  
                        </div>

                        <div class="item form-group">
                            <label for="name">
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="pallow" id="allow" value="1"><strong>Allow Product Sizes</strong></label>
                                </div>
                            </div>
                        </div>

                        <div class="item form-group" id="pSizes" style="display: none;">
                            <label for="name">Product Sizes<span class="required">*</span>
                                <p class="small-label">(Write your own size Separated by Comma[,])</p>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="sizes" value="X,XL,XXL,M,L,S" data-role="tagsinput"/>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label>Product Description:</label>
                            <textarea name="description" id="description" class="form-control" rows="6"></textarea>
                        </div>

                        <div class="item form-group">
                            <label>Product Dimensions:</label>
                            <input class="form-control" id="dimensions" name="dimensions" placeholder="E.g. 12X12X12">
                        </div>

                        <div class="item form-group">
                            <label for="name">
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="pPrice" id="pprice" value="1"><strong> Product Price</strong></label>
                                </div>
                            </div>
                        </div>

                        <div class="item form-group" id="pPrice" style="display: none;">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" placeholder="e.g.2000" name="price" pattern="[0-9]+(\.[0-9]{0,2})?%?" title="Price must be a numeric or up to 2 decimal places." data-role="tagsinput"/>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label for="name">
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="ppPrice" id="ppprice" value="1" placeholder="e.g.2000"><strong> Product Previous Price</strong></label>
                                </div>
                            </div>
                        </div>

                        <div class="item form-group" id="ppPrice" style="display: none;">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="previous_price" pattern="[0-9]+(\.[0-9]{0,2})?%?" title="Price must be a numeric or up to 2 decimal places." data-role="tagsinput"/ placeholder="e.g.2000">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label for="name">
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="pstock" id="pStock" value="1"><strong> Product Stock</strong></label>
                                </div>
                            </div>
                        </div>

                        <div class="item form-group" id="pstock" style="display: none;">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="stock" pattern="[0-9]{1,10}" placeholder="e.g 15" data-role="tagsinput"/>
                            </div>
                        </div>

                        <!-- <div class="item form-group">
                            <label>Product Buy/Return Policy:</label>
                            <textarea name="policy" id="policy" class="form-control" rows="6"></textarea>
                        </div> -->

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">
                            </label>
                            <div class="col-md-9 col-sm-6 col-xs-12" data-toggle="buttons">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="id" name="featured" value="1"> Add to featured Products
                                </label>
                            </div>
                        </div>

    					<button type="button" class="btn btn-success btn-block" data-request="ajax-submit" data-target='[role="add-product"]'>Add Product</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>
</div>

@section('requirejs')
<script type="text/javascript">
    
    CKEDITOR.replace( 'description');
    // CKEDITOR.replace( 'policy');

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

        $("#pprice").change(function () {
           $("#pPrice").toggle();
        });

        $("#ppprice").change(function () {
           $("#ppPrice").toggle();
        });

        $("#pStock").change(function () {
           $("#pstock").toggle();
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

@endsection
