@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
@foreach($products as $rows)
<div class="col-xs-12 col-md-6 bootstrap snippets bootdeys">
	<div class="product-content product-wrap clearfix">
		<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12" style="margin-bottom:20px;">
					<div class="product-image"> 
						<img src="https://via.placeholder.com/194x228/87CEFA" alt="194x228" class="img-responsive"> 
						
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xs-12">
				<div class="product-deatil">
						<h5 class="name">
							<a href="#">
								{{ $rows->name}}
							</a>
						</h5>
						<p class="price-container">
							<span>$	{{ $rows->price}}</span>
						</p>
						<span class="tag1"></span> 
				</div>
				<div class="description">
					<p>{{ $rows->description}} </p>
				</div>
				<div class="product-info smart-form">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6"> 
							<a href="{{ url('/checkout')}}/{{$rows->id}}" class="btn btn-success">Buy Now</a>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach()



</div>
</div>
@endsection
