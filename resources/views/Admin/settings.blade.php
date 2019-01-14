<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">General Settings</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">General Settings</h1>
			</div>
		</div><!--/.row-->
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-12">
					<ul class="nav nav-tabs tabs-left">
                        <li class="active"><a href="#logo" data-toggle="tab" aria-expanded="true">Logo</a>
                        <li class=""><a href="#favicon" data-toggle="tab" aria-expanded="true">Favicon</a>
                        <li class=""><a href="#website" data-toggle="tab" aria-expanded="false">Website Title</a>
                        <li class=""><a href="#background" data-toggle="tab" aria-expanded="false">Background Image</a>
                        </li>
                        <li class=""><a href="#about" data-toggle="tab" aria-expanded="false">About Us</a>
                        </li>
                        <li class=""><a href="#address" data-toggle="tab" aria-expanded="false">Office Address</a>
                        </li>
                        <li class=""><a href="#footer" data-toggle="tab" aria-expanded="false">Footer</a>
                        </li>
                    </ul>
				</div>

				<div class="col-xs-9">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="logo">
                            <p class="lead">Website Logo</p>
                            <div class="ln_solid"></div>
                            <form method="POST" action="settings/logo" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Current Logo
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <img class="col-md-6" src="">
                                    </div>
                                </div><br>
                                <!-- <input type="hidden" name="id" value="1"> -->
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Setup New Logo <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" name="logo" required/>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <!--  <button type="submit" class="btn btn-primary">Cancel</button> -->
                                        <button type="submit" class="btn btn-success btn-block">Update Settings</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="favicon">
                            <p class="lead">Website Favicon</p>
                            <div class="ln_solid"></div>
                            <form method="POST" action="settings/favicon" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Current Favicon
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <img class="col-md-3" src="">
                                    </div>

                                </div><br>
                                <!-- <input type="hidden" name="id" value="1"> -->
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Setup New Favicon <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" name="favicon" required/>
                                    </div>

                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <!--  <button type="submit" class="btn btn-primary">Cancel</button> -->
                                        <button type="submit" class="btn btn-success btn-block">Update Settings</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="website">
                            <p class="lead">Website Title</p>

                            <div class="ln_solid"></div>
                            <form method="POST" action="settings/title" class="form-horizontal form-label-left" id="website_form">
                                        {{csrf_field()}}
                                {{--<input type="hidden" name="_method" value="PUT">--}}
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"> Website Title <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="title" placeholder="Website Title" required="required" type="text" value="">
                                    </div>
                                </div>
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <!--  <button type="submit" class="btn btn-primary">Cancel</button> -->
                                        <button type="submit" id="website_update" class="btn btn-success btn-block">Update Settings</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="background">
                            <p class="lead">Background Image</p>
                            <div class="ln_solid"></div>
                            <form method="POST" action="settings/background" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Current Background Image
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <img class="col-md-10" src="">
                                    </div>

                                </div><br>
                                <!-- <input type="hidden" name="id" value="1"> -->
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Setup New Background <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" name="background" required="required" />
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <!--  <button type="submit" class="btn btn-primary">Cancel</button> -->
                                        <button type="submit" class="btn btn-success btn-block">Update Settings</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="about">
                            <p class="lead">About Us</p>
                            <div class="ln_solid"></div>
                            <form method="POST" action="settings/about" class="form-horizontal form-label-left" id="about_form">
                                {{csrf_field()}}
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="about"> About Us Text <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea rows="10" cols="60" id="aboutpnael" class="form-control" name="about"></textarea>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <!--  <button type="submit" class="btn btn-primary">Cancel</button> -->
                                        <button type="submit" id="about_update" class="btn btn-success btn-block">Update Settings</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="address">
                            <p class="lead">Office Address</p>
                            <div class="ln_solid"></div>
                            <form method="POST" action="settings/address" class="form-horizontal form-label-left" id="about_form">
                                {{csrf_field()}}
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address"> Street Address <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea rows="3" cols="60" class="form-control col-md-7 col-xs-12" name="address" required="required"></textarea>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="phone" placeholder="Phone Number" required="required" type="text" value="">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fax"> Fax <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="fax" placeholder="Fax" required="required" type="text" value="">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"> Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="email" placeholder="Email Address" required="required" type="text" value="">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <!--  <button type="submit" class="btn btn-primary">Cancel</button> -->
                                        <button id="office_update" type="submit" class="btn btn-success btn-block">Update Settings</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="footer">
                            <p class="lead">Website Footer</p>
                            <div class="ln_solid"></div>
                            <form method="POST" action="settings/footer" class="form-horizontal form-label-left" id="footer_form">
                                {{csrf_field()}}
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="footer"> Footer Text <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea rows="2" cols="60" id="footerpnael" class="form-control" name="footer" required="required"></textarea>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <!--  <button type="submit" class="btn btn-primary">Cancel</button> -->
                                        <button id="footer_update" type="submit" class="btn btn-success btn-block">Update Settings</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
			</div>
	   </div>		
</div>