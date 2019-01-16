
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Edit Static Pages</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Static Pages</h1>
				<div class="pull-right">
                    <a href="{!! url('admin/staticpages') !!}" class="btn btn-default btn-back"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
			</div>
		</div><!--/.row-->
		<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
				<form role="edit-staticpages" data-request="enable-enter" action="{{url('admin/staticpages/'.___encrypt($staticpage['id']))}}" method="POST" class="form-horizontal form-label-left">
					{{csrf_field()}}
					<input type="hidden" value="PUT" name="_method">
					<div class="col-md-12">
						<div class="form-group">
							<input type="hidden" id="id" name="id" class="form-control" value="{{$staticpage['id']}}">
						</div>
					</div>
					<div class="form-group">
						<label>Title:</label>
						<input class="form-control" name="title" value="{{$staticpage['title']}}" placeholder="E.g. Men's Clothing">
					</div>

					<div class="item form-group">
	                    <label  class="control-label col-md-3 col-sm-3 col-xs-12"> Current Featured Image</label>
	                    <div class="col-md-3 col-sm-6 col-xs-12">
	                       <img style="max-width: 250px;" src="{{url('assets/images/staticpage')}}/{{$staticpage['image']}}" id="adminimg" alt="No Featured Image Added">
	                    </div>
	                    <div class="col-md-3 col-sm-6 col-xs-12">
	                        <input onchange="readURL(this)" id="uploadFile" accept="image/*" name="image" type="file">
	                    </div>
                	</div>

					<div class="form-group">
						<label>Description:</label>
						<textarea name="description" id="description" class="form-control" rows="6" required>{{$staticpage['description']}}</textarea>
					</div>
						<button type="button" class="btn btn-success btn-block edit_staticpages" data-request="ajax-submit" data-target='[role="edit-staticpages"]'>Edit Static Pages</button>
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
        $('[data-request="enable-enter"]').find('.edit_staticpages').trigger('click');
        return false;   
        }
    }); 
},100);

    bkLib.onDomLoaded(function() {
            new nicEditor().panelInstance('description');
            new nicEditor().panelInstance('policy');
        });

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