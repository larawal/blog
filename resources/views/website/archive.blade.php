@extends('layouts.website')

@section('content')
	@include('website.archive.post-carousel')
	@include('website.archive.post-featured')
	<div class="main-body section-gap">
		<div class="container box_1170">
			<div class="row">
				<div class="col-lg-8 post-list">
					@include('website.archive.list-posts')
				</div>
				<div class="col-lg-4 sidebar">
					@include('website.archive.sidebar')
				</div>
			</div>
		</div>
	</div>
@endsection
