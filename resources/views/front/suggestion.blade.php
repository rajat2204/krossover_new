@if(!empty($products))
	@foreach($products as $product)
		 <li><a href="{{url('product')}}/{{$product['id']}}">{{!empty($product['title'])?$product['title']:''}}</a></li>
	
	@endforeach
@else
		<p>No Product(s) Found with '{{$searchkey}}' keyword.</p>
@endif
