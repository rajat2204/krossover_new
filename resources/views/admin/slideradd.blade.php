<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li class="active">Add Slider</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
            <div class="clearfix">
    			<h1 class="page-header">Add Slider</h1>
    			<div class="pull-right back-admin">
                    <a href="{!! url('admin/sliders') !!}" class="btn btn-info btn-back"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
		</div>
	</div><!--/.row-->
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
				<form role="add-slider" method="POST" action="{!! action('Admin\SliderController@store') !!}" class="form-horizontal form-label-left">
					{{csrf_field()}}
					<div class="item form-group">
    					<label>Slider Image:</label>
    					<select class="form-control" name="main_id" id="main_id">
                            <option value="">Select Product</option>
                            @foreach($products as $product)
                                <option value="{{!empty($product->id)?$product->id:''}}">{{!empty($product->title)?$product->title:''}}</option>
                            @endforeach
    					</select>
    				</div>
					<div class="item form-group">
                        <label> Slider Image</label>
                        <div id="image_div">
                            <input onchange="readURL(this)" id="uploadFile" accept="image/*" name="image" type="file">
                            <span>max. size 2 MB.</span>
                        	<span>(575X533 pixels)</span>
                        </div>
                        <div id="image-location">
                           <img style="max-width: 250px;" src="{{asset('assets/images/avatar1.png')}}" id="adminimg" alt="No Featured Image Added">
                        </div>
                    </div>
					<div class="form-group">
						<label>Slider Title:</label>
						<input class="form-control" id="title" name="title" placeholder="E.g. Men's Clothing">
					</div>
					<div class="form-group">
						<label>Slider Text:</label>
						<input class="form-control" id="text" name="text" placeholder="E.g. men's clothing">
					</div>
						<button type="button" class="btn btn-success btn-block" data-request="ajax-submit" data-target='[role="add-slider"]'>Add Slider</button>
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

    // $(document).ready(function(){
    //     $('#main_id').on('change',function(){
    //         var value = $(this).val();
    //         $.ajax({
    //             url:"{{url('admin/subcategories/ajaxsubcategory?id=')}}"+value,
    //             type:'POST',
    //             success:function(data){
    //                 $('#subcategory').html(data).prev().css("display","block");
    //             }
    //         });
    //     });
    // });
</script>

<!-- <script type="text/javascript">
    $('#main_id').change(function(){ //if the select value gets changed
   var imageSource = $(this).find(':selected').data('picture'); //get the data from data-picture attribute
   if(imageSource){ //if it has data
      $('#image-location').html('<img src="'+imageSource+'">'); // insert image in div image-location
   } else {
      $('#image-location').html(''); //remove content from div image-location, thus removing the image
   }
})

// $(function() {
//     $('#main_id').change(function(){
//         if($('#main_id').val() != "NULL") {
//             $('#image_div').hide(); 
//         } else {
//             $('#image_div').show(); 
//         } 
//     });
// });
</script> -->
@endsection
