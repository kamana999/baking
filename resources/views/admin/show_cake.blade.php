@extends('admin.base')

@section('title', $cake->title)
@section('meta_keywords', $cake->meta_keywords)
@section('meta_description', $cake->meta_description)

@section('content')
        
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Cake</div>
            

					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Cake Details</li>
							</ol>
                            
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
											<img src="{{url('upload/'.$cake->image)}}" alt="Admin" class="rounded-circle" width="110">
											<div class="mt-3">
												<h4>{{$cake->title}}</h4>
												<p class="text-secondary mb-1">{{$cake->cat_id}}</p>
												<p class="text-muted font-size-sm">{{$cake->description}}</p>
                                                
											</div>
                                            <?php foreach (json_decode($cake->images)as $picture) { ?>
                                                <div class="product-section-thumbnail">
                                                    <img src="{{ asset('/upload/'.$picture) }}" style="height:75px; width:75px;">
                                                </div>
                                            <?php } ?>
										</div>
										
									</div>
								</div>
							</div>
							<div class="col-lg-8">
                            <div class="card">
									<div class="card-body">
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Full Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<p>{{$cake->title}}</p>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Description</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                            <p>{{$cake->description}}</p>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Category</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                            <p>{{$cake->category->cat_title}}</p>
											</div>
										</div>
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Price</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                            <p>{{$cake->price}}</p>
											</div>
										</div>
									 
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Discount Price</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                            <p>{{$cake->discount_price}}</p>
											</div>
										</div>
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Weight</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                            <p>{{$cake->weight}}{{$cake->weight_type}}</p>
											</div>
										</div>

                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">layer</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                            <p>{{$cake->layer}}</p>
											</div>
										</div>


                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Unit</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                            <p>{{$cake->unit}}</p>
											</div>
										</div>
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">flavour</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                            <p>{{$cake->flavour}}</p>
											</div>
										</div>
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Shape</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                            <p>{{$cake->shape}}</p>
											</div>
										</div>
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Serve</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                            <p>{{$cake->serve}}</p>
											</div>
										</div>
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Delivired</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                            <p>{{$cake->delivired}}</p>
											</div>
										</div>


									</div>
								</div>
							
							
							</div>
						</div>
					</div>
				</div>
			</div>
</div>