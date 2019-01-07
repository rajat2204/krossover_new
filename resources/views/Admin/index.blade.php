@extends('layouts.app')
<!-- header logo: style can be found in header.less -->
@section('content')
	@includeIf('admin.includes.header')
		@includeIf('admin.includes.sidebar')
		<div class="content-wrapper">
				@includeIf($view)
		</div><!-- ./wrapper -->
	@includeIf('includes.footer')
@endsection