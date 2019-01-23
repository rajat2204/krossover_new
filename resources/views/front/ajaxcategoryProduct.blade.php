<section class="lattest-product-area pb-40 category-list" id="products">
	<div class="row" id="products">
		@if(!empty($product))
			@foreach($product as $products)
				<div class="col-lg-4 col-md-6">
					<div class="single-product">
						<a href="{{url('product')}}/{{$products['id']}}"><img class="img-fluid" src="{{url('assets/images/products')}}/{{$products['feature_image']}}" style="height: 320px;" alt="Product Image" /></a>
						<div class="product-details">
							<h6>{{$products['title']}}</h6>
							<div class="price"><h6>${{$products['price']}}</h6>
								<h6 class="l-through">${{$products['previous_price']}}</h6>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		@else
			<div class="no_product_found">
				<h3>No Product Found in this category.</h3>
			</div>
		@endif
	</div>
</section>