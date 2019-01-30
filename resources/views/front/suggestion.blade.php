<ul id="suggestion">
	@if(!empty($products))
		@foreach($products as $product)
			<li><a href="{{url('product')}}/{{$product->id}}">{{!empty($product->title)?$product->title:''}}</a></li>
		@endforeach
	@endif
</ul>