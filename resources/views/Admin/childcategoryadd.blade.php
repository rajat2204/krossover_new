<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Add Child Category</h1>
		</div>
	</div><!--/.row-->
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
				<form role="add-childcategory" data-request="enable-enter" action="{!! action('admin\ChildcategoryController@store') !!}" method="POST" class="form-horizontal form-label-left">
					{{csrf_field()}}
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Main Category:</label>
							<select class="form-control select_block" name="cat_id" id="main">
								<option value="">Select Main Category</option>
									@foreach($categories as $category)
	                                    <option value="{{$category->id}}">{{$category->name}}</option>
	                                @endforeach
							</select>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Category:</label>
							<select id="subcategory" class="form-control select_block" name="subcategory" >
								<option value="">Select Sub Category</option>
							</select>
						</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Category Display Name:</label>
						<input class="form-control" name="name" placeholder="E.g. Men's Clothing">
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Category URL Slug:</label>
						<input class="form-control" name= "slug" placeholder="E.g. men's clothing">
					</div>
						<button type="button" class="btn btn-success btn-block add_childcategory" data-request="ajax-submit" data-target='[role="add-childcategory"]'>Add Child Category</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


@section('requirejs')
<script type="text/javascript">
	$(document).ready(function(){
        $('#main').on('change',function(){
            var value = $(this).val();
            $.ajax({
                url:"{{url('admin/subcategories/ajaxcategory?id=')}}"+value,
                type:'POST',
                success:function(data){
                    $('#subcategory').html(data).prev().css("display","block");
                    // $('#subcategory').prev('.select_block').css("display","block");
                }
            });
        });
    });

    setTimeout(function(){
        $('[data-request="enable-enter"]').on('keyup','input',function (e) {
        e.preventDefault();
        if (e.which == 13) {
        $('[data-request="enable-enter"]').find('.add_childcategory').trigger('click');
        return false;   
        }
    }); 
},100);
</script>
@endsection