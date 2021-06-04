@extends('vendor.base')
@section('content')

<div class="page-wrapper">
			<div class="page-content">
			  <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
                    <div class="col">
                            <div class="card radius-10 overflow-hidden bg-danger">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-white">Total Categories</p>
                                            <h5 class="mb-0 text-white">{{$categories}}</h5>
                                        </div>
                                        <div class="ms-auto text-white">	<i class='bx bx-cart font-30'></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="" id="chart1"></div>
                            </div>
                    </div>
                    <div class="col">
                            <div class="card radius-10 overflow-hidden bg-info">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-white">Total Cakes</p>
                                            <h5 class="mb-0 text-white">{{$cakes}}</h5>
                                        </div>
                                        <div class="ms-auto text-white">	<i class='bx bx-cart font-30'></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="" id="chart2"></div>
                            </div>
                    </div>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-warning">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-dark">Total Customers</p>
										<h5 class="mb-0 text-dark">223</h5>
									</div>
									<div class="ms-auto text-dark">	<i class='bx bx-group font-30'></i>
									</div>
								</div>
							</div>
							<div class="" id="chart3"></div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-success">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Orders</p>
										<h5 class="mb-0 text-white">869</h5>
									</div>
									<div class="ms-auto text-white"><i class='bx bx-chat font-30'></i>
									</div>
								</div>
							</div>
							<div class="" id="chart4"></div>
						</div>
					</div>
			  </div><!--end row-->
			  
              
			    <div class="row">
                    <div class="col-12 col-xl-4 d-flex">
                        <div class="card radius-10 w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="mb-0">New Orders</h5>
                                    </div>
                                    <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                                    </div>
                                </div>
                            </div>
                            <div class="customers-list p-3 mb-3">
                                <!-- @foreach($cake as $v)
                                    <div class="customers-list-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer">
                                        <div class="">
                                            <img src="{{url('upload',$v->image)}}" class="rounded-circle" width="46" height="46" alt="" />
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-1 font-14">{{$v->name}}</h6>
                                            <p class="mb-0 font-13 text-secondary">{{$v->price}}</p>
                                        </div>
                                        <div class="list-inline d-flex customers-contacts ms-auto">	<a href="javascript:;" class="list-inline-item"><i class='bx bxs-envelope'></i></a>
                                            <a href="javascript:;" class="list-inline-item"><i class='bx bxs-phone' ></i></a>
                                            <a href="javascript:;" class="list-inline-item"><i class='bx bx-dots-vertical-rounded'></i></a>
                                        </div>
                                    </div>
                                @endforeach -->
                            </div>
                        </div>
				    </div>
				    <div class="col-12 col-xl-4 d-flex">
					    <div class="card radius-10 w-100 overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="mb-0">Store Metrics</h5>
                                    </div>
                                    <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                                    </div>
                                </div>
                            </div>

                            <div class="store-metrics p-3 mb-3">
                                <div class="card mt-3 radius-10 border shadow-none">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="mb-0 text-secondary">Total Categories</p>
                                                <h4 class="mb-0">{{$categories}}</h4>
                                            </div>
                                            <div class="widgets-icons bg-light-primary text-primary ms-auto"><i class='bx bxs-shopping-bag' ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card radius-10 border shadow-none">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center"><div>
                                            <p class="mb-0 text-secondary">Total Customers</p>
                                            <h4 class="mb-0">345</h4>
                                        </div>
                                        <div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bxs-group' ></i>
                                        </div>
                                    </div>
                                </div>
                                </div>
							<div class="card radius-10 border shadow-none">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Total Orders</p>
											<h4 class="mb-0">364</h4>
										</div>
										<div class="widgets-icons bg-light-success text-success ms-auto"><i class='bx bxs-category' ></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card radius-10 border shadow-none">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Total Cakes</p>
											<h4 class="mb-0">{{$cakes}}</h4>
										</div>
										<div class="widgets-icons bg-light-info text-info ms-auto"><i class='bx bxs-cart-add' ></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				 </div>

				 <div class="col-12 col-xl-4 d-flex">
					<div class="card radius-10 w-100 ">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h5 class="mb-1">Top Products</h5>
								</div>
								<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
								</div>
							</div>
						</div>

						<div class="product-list p-3 mb-3">
                            @foreach($cake as $c)
							<div class="d-flex align-items-center py-3 border-bottom cursor-pointer">
								<div class="product-img me-2">
									 <img src="{{url('upload',$c->image)}}" alt="product img">
								  </div>
								<div class="">
									<h6 class="mb-0 font-14">{{$c->title}}</h6>
									<p class="mb-0"></p>
								</div>
								<div class="ms-auto">
									<h6 class="mb-0">{{$c->price}}</h6>
								</div>
							</div>
                            @endforeach
						</div>
					</div>
				 </div>
				</div><!--end row-->

                <div class="row">
					<div class="col">
						<div class="card radius-10 mb-0">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h5 class="mb-1">Recent Orders</h5>
									</div>
									<div class="ms-auto">
										<a href="javscript:;" class="btn btn-primary btn-sm radius-30">View All Products</a>
									</div>
								</div>

                               <div class="table-responsive mt-3">
								   <table class="table align-middle mb-0">
									   <thead class="table-light">
										   <tr>
											   <th>Tracking ID</th>
											   <th>Products Name</th>
											   <th>Date</th>
											   <th>Status</th>
											   <th>Price</th>
											   <th>Actions</th>
										   </tr>
									   </thead>
									   <tbody>
										   <tr>
											   <td>#55879</td>
											   <td>
												<div class="d-flex align-items-center">
													<div class="recent-product-img">
														<img src="assets/images/products/15.webp" alt="">
													</div>
													<div class="ms-2">
														<h6 class="mb-1 font-14">Light Red T-Shirt</h6>
													</div>
												</div>
											   </td>
											   <td>22 Jun, 2020</td>
											   <td class=""><span class="badge bg-light-success text-success w-100">Completed</span></td>
											   <td>#149.25</td>
											   <td>
												<div class="d-flex order-actions">	<a href="javascript:;" class="text-danger bg-light-danger border-0"><i class='bx bxs-trash'></i></a>
													<a href="javascript:;" class="ms-4 text-primary bg-light-primary border-0"><i class='bx bxs-edit' ></i></a>
												</div>
											   </td>
										   </tr>
										   <tr>
											<td>#88379</td>
											<td>
											 <div class="d-flex align-items-center">
												 <div class="recent-product-img">
													 <img src="assets/images/products/16.webp" alt="">
												 </div>
												 <div class="ms-2">
													 <h6 class="mb-1 font-14">Grey Headphone</h6>
												 </div>
											 </div>
											</td>
											<td>22 Jun, 2020</td>
											<td class=""><span class="badge bg-light-danger text-danger w-100">Cancelled</span></td>
											<td>#149.25</td>
											<td>
												<div class="d-flex order-actions">	<a href="javascript:;" class="text-danger bg-light-danger border-0"><i class='bx bxs-trash'></i></a>
													<a href="javascript:;" class="ms-4 text-primary bg-light-primary border-0"><i class='bx bxs-edit' ></i></a>
												</div>
											</td>
										</tr>
										<tr>
											<td>#68823</td>
											<td>
											 <div class="d-flex align-items-center">
												 <div class="recent-product-img">
													 <img src="assets/images/products/19.webp" alt="">
												 </div>
												 <div class="ms-2">
													 <h6 class="mb-1 font-14">Grey Hand Watch</h6>
												 </div>
											 </div>
											</td>
											<td>22 Jun, 2020</td>
											<td class=""><span class="badge bg-light-warning text-warning w-100">Pending</span></td>
											<td>#149.25</td>
											<td>
												<div class="d-flex order-actions">	<a href="javascript:;" class="text-danger bg-light-danger border-0"><i class='bx bxs-trash'></i></a>
													<a href="javascript:;" class="ms-4 text-primary bg-light-primary border-0"><i class='bx bxs-edit' ></i></a>
												</div>
											</td>
										</tr>
										<tr>
											<td>#54869</td>
											<td>
											 <div class="d-flex align-items-center">
												 <div class="recent-product-img">
													 <img src="assets/images/products/07.webp" alt="">
												 </div>
												 <div class="ms-2">
													 <h6 class="mb-1 font-14">Brown Sofa</h6>
												 </div>
											 </div>
											</td>
											<td>22 Jun, 2020</td>
											<td class=""><span class="badge bg-light-success text-success w-100">Completed</span></td>
											<td>#149.25</td>
											<td>
												<div class="d-flex order-actions">	<a href="javascript:;" class="text-danger bg-light-danger border-0"><i class='bx bxs-trash'></i></a>
													<a href="javascript:;" class="ms-4 text-primary bg-light-primary border-0"><i class='bx bxs-edit' ></i></a>
												</div>
											</td>
										</tr>
										<tr>
											<td>#22536</td>
											<td>
											 <div class="d-flex align-items-center">
												 <div class="recent-product-img">
													 <img src="assets/images/products/17.webp" alt="">
												 </div>
												 <div class="ms-2">
													 <h6 class="mb-1 font-14">Black iPhone 11</h6>
												 </div>
											 </div>
											</td>
											<td>22 Jun, 2020</td>
											<td class=""><span class="badge bg-light-success text-success w-100">Completed</span></td>
											<td>#149.25</td>
											<td>
												<div class="d-flex order-actions">	<a href="javascript:;" class="text-danger bg-light-danger border-0"><i class='bx bxs-trash'></i></a>
													<a href="javascript:;" class="ms-4 text-primary bg-light-primary border-0"><i class='bx bxs-edit' ></i></a>
												</div>
											</td>
										</tr>
										<tr>
											<td>#25796</td>
											<td>
											 <div class="d-flex align-items-center">
												 <div class="recent-product-img">
													 <img src="assets/images/products/14.webp" alt="">
												 </div>
												 <div class="ms-2">
													 <h6 class="mb-1 font-14">Men Yellow T-Shirt</h6>
												 </div>
											 </div>
											</td>
											<td>22 Jun, 2020</td>
											<td class=""><span class="badge bg-light-warning text-warning w-100">Pending</span></td>
											<td>#149.25</td>
											<td>
												<div class="d-flex order-actions">	<a href="javascript:;" class="text-danger bg-light-danger border-0"><i class='bx bxs-trash'></i></a>
													<a href="javascript:;" class="ms-4 text-primary bg-light-primary border-0"><i class='bx bxs-edit' ></i></a>
												</div>
											</td>
										</tr>
										<tr>
											<td>#98754</td>
											<td>
											 <div class="d-flex align-items-center">
												 <div class="recent-product-img">
													 <img src="assets/images/products/08.webp" alt="">
												 </div>
												 <div class="ms-2">
													 <h6 class="mb-1 font-14">Grey Stand Table</h6>
												 </div>
											 </div>
											</td>
											<td>22 Jun, 2020</td>
											<td class=""><span class="badge bg-light-danger text-danger w-100">Cancelled</span></td>
											<td>#149.25</td>
											<td>
												<div class="d-flex order-actions">	<a href="javascript:;" class="text-danger bg-light-danger border-0"><i class='bx bxs-trash'></i></a>
													<a href="javascript:;" class="ms-4 text-primary bg-light-primary border-0"><i class='bx bxs-edit' ></i></a>
												</div>
											</td>
										</tr>
									   </tbody>
								   </table>
							   </div>
								
							</div>
						</div>
					</div>
				</div>				
			</div>
		</div>






<!-- <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <img src="{{url('upload/'.$vendor->image)}}" alt="" class="card-img-top" height="300">
                <div class="card-body">
                    
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        {{$vendor->id}}
                        <td>{{$vendor->user->name}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$vendor->user->email}}</td>
                    </tr>
                    <tr>
                        <th>contact</th>
                        <td>{{$vendor->contact}}</td>
                    </tr>
                    <tr>
                        <th>nationality</th>
                        <td>{{$vendor->country->name}}</td>
                    </tr>
                    <tr>
                        <th>address</th>
                        <td>{{$vendor->address}},{{$vendor->state->name}}({{$vendor->country->name}})</td>
                    </tr>
                    
                </table>
            </div>
            <div class="col-lg-9">
                <div class="container bg-dark text-light p-5">
                    <h2>Welcome to DASHBOARD</h2>
                    <p>{{$vendor->description}}</p>
                </div>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <a href="{{route('cake',$vendor->id)}}" class="text-decoration-none text-white"><h3>Cakes</h3></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        
</div>   

 -->
