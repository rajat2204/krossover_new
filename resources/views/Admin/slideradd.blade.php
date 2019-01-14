<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
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
			<h1 class="page-header">Add Slider</h1>
		</div>
	</div><!--/.row-->
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
				<form role="add-slider" data-request="enable-enter" method="POST" action="{!! action('Admin\SliderController@store') !!}" class="form-horizontal form-label-left">
					{{csrf_field()}}
					<div class="item form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12"> Slider Image</label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                           <img style="max-width: 250px;" src="{{asset('/img/avatar.png')}}" id="adminimg" alt="No Featured Image Added">
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input onchange="readURL(this)" id="uploadFile" accept="image/*" name="image" type="file">
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
						<button type="button" class="btn btn-success btn-block add_slider" data-request="ajax-submit" data-target='[role="add-slider"]'>Add Slider</button>
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
        $('[data-request="enable-enter"]').find('.add_slider').trigger('click');
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
</script>

@endsection
