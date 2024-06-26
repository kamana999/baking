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
                                            <p class="mb-0 text-white">Total Orders</p>
                                            <h5 class="mb-0 text-white">{{$orders}}</h5>
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
										<p class="mb-0 text-dark">Total Delivery Person</p>
										<h5 class="mb-0 text-dark">{{$delivery}}</h5>
									</div>
									<div class="ms-auto text-dark">	<i class='bx bx-group font-30'></i>
									</div>
								</div>
							</div>
							<div class="" id="chart3"></div>
						</div>
					</div>
				
			  </div><!--end row-->
			  
              
			    <div class="row">
                    <div class="col-12 col-xl-4 d-flex">
                        <div class="card radius-10 w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="mb-0">New Category</h5>
                                    </div>
                                    <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                                    </div>
                                </div>
                            </div>
                            <div class="customers-list p-3 mb-3">
							@foreach($category as $v)
                                    <div class="customers-list-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer">
                                        <div class="">
                                            <img src="{{url('upload',$v->image)}}" class="rounded-circle" width="46" height="46" alt="" />
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-1 font-14">{{$v->cat_title}}</h6>
                                            <p class="mb-0 font-13 text-secondary">{{$v->description}}</p>
                                        </div>
                                        
                                    </div>
                                @endforeach
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
                                                <p class="mb-0 text-secondary">Total Order</p>
                                                <h4 class="mb-0">{{$orders}}</h4>
                                            </div>
                                            <div class="widgets-icons bg-light-primary text-primary ms-auto"><i class='bx bxs-shopping-bag' ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card radius-10 border shadow-none">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center"><div>
                                            <p class="mb-0 text-secondary">Total Category</p>
                                            <h4 class="mb-0">{{$categories}}</h4>
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
											<h4 class="mb-0">{{$orders}}</h4>
										</div>
										<div class="widgets-icons bg-light-success text-success ms-auto"><i class='bx bxs-category' ></i>
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
									<h5 class="mb-1">New Delivery Person</h5>
								</div>
								<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
								</div>
							</div>
						</div>

						<div class="product-list p-3 mb-3">
						@foreach($delivery_person as $v)
                                    <div class="customers-list-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer">
                                        <div class="">
                                            <img src="{{url('upload',$v->image)}}" class="rounded-circle" width="46" height="46" alt="" />
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-1 font-14">{{$v->user->name}}</h6>
                                            <p class="mb-0 font-13 text-secondary">{{$v->user->email}}</p>
                                        </div>
                                        <div class="list-inline d-flex customers-contacts ms-auto">	<a href="javascript:;" class="list-inline-item"><i class='bx bxs-envelope'></i></a>
                                            <a href="javascript:;" class="list-inline-item"><i class='bx bxs-phone' ></i></a>
                                            <a href="javascript:;" class="list-inline-item"><i class='bx bx-dots-vertical-rounded'></i></a>
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
											
										   </tr>
									   </thead>
									   <tbody>
									   @foreach($order as $o)
										   <tr>
                                           
											   <td>00000A{{$o->id}}</td>
											   <td>
												<div class="d-flex align-items-center">
													
													@if($o->orderitem)
													@foreach($o->orderitem as $oi)
													<div class="ms-2">
														<h6 class="mb-1 font-14">{{$oi->cake->title}},</h6>
														<h6 class="mb-1 font-14">{{$oi->delivery_date}},</h6>
													</div>
													
													@endforeach
													@endif
												</div>
											   </td>
											   <td>{{$o->created_at}}</td>
											   @if($o->isPending)
											   <td class=""><a href=""><span class="btn btn-sm bg-warning text-light-warning w-100">Pending</span></a></td>
											   @elseif($o->isConfirm)
											   <td class=""><a href=""><span class="btn btn-sm bg-primary text-light-primary w-100">confirm</span></a></td>
											   @elseif($o->outForDelivery)
											   <td class=""><a href=""><span class="btn btn-sm bg-info text-light-info w-100">OutForDelivery</span></a></td>
											   @elseif($o->orderCompleted)
											   <td class=""><a href=""><span class="btn btn-sm bg-success text-light-success w-100">confirm</span></a></td>
												@elseif($o->isCancle)
												<td class=""><a href=""><span class="btn btn-sm bg-danger text-light-success w-100">Cancle</span></a></td>
												@endif
										   </tr>
										   @endforeach
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
                                    <a href="" class="text-decoration-none text-white"><h3>Cakes</h3></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        
</div>   

 -->
