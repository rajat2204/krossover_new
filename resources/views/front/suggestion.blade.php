@if(!empty($products))
	@foreach($products as $product)
		<li><a href="{{url('product')}}/{{___encrypt($product['id'])}}">{{!empty($product['title'])?$product['title']:''}} -- {{!empty($product['code'])?$product['code']:''}}</a></li>
	@endforeach
@else
		<p>No Product(s) Found with '{{$searchkey}}' keyword.</p>
@endif
