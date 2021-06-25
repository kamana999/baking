@extends('admin.base')
@section('content')


<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Vendor Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Vendor Profile</li>
							</ol>
						</nav>
						
					</div>
					<div class="ms-auto">
						<a href="{{route('editpassword',$vendors->id)}}" class="btn btn-primary btn-sm radius-30">Reset PassWord</a>
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
											<img src="{{url('upload/'.$vendors->image)}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
											<div class="mt-3">
												<h4>{{$vendors->user->name}}</h4>
											
												<p class="text-muted font-size-sm">{{$vendors->description}}</p>
											</div>
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
												<p>{{$vendors->user->name}}</p>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Email</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                            <p>{{$vendors->user->email}}</p>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Phone</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                            <p>{{$vendors->contact}}</p>
											</div>
										</div>
									
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Address</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                            <p>{{$vendors->street}},{{$vendors->area->name}}, {{$vendors->district->name}},{{$vendors->state->name}}({{$vendors->country->name}})</p>
											</div>
										</div>
									</div>
								</div>
								
							</div>
							<div class="col-lg-12">
							@if($vendors->order)
								
								<div class="row">
					<div class="col">
						<div class="card radius-10 mb-0">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h5 class="mb-1">Recent Orders</h5>
									</div>
									
								</div>

                               <div class="table-responsive mt-3">
								   <table class="table align-middle mb-0">
									   <thead class="table-light">
										   <tr>
											   <th>Tracking ID</th>
											   <th>Products Name</th>
											   <th>Date Date</th>
											   <th>Date Time</th>
											   <th>Delivery Address</th>
											   <th>Status</th>
											 
										   </tr>
									   </thead>
									   <tbody>
									   @foreach($vendors->order as $o)
										   <tr>
                                           
											   <td>00000A{{$o->id}}</td>
											   <td>
												<div class="d-flex align-items-center">
													@if($o->orderitem)
													@foreach($o->orderitem as $oi)
													<div class="ms-2">
														<h6 class="mb-1 font-14">{{$oi->cake->title}},</h6>
														
													</div>
													@endforeach
													@endif
												</div>
												<td>
												<div class="d-flex align-items-center">
													@if($o->orderitem)
													@foreach($o->orderitem as $oi)
													<div class="ms-2">
														<h6 class="mb-1 font-14">{{$oi->delivery_date}},</h6>
														
													</div>
													@endforeach
													@endif
												</div>
												</td>
												<td>
												<div class="d-flex align-items-center">
													@if($o->orderitem)
													@foreach($o->orderitem as $oi)
													<div class="ms-2">
														<h6 class="mb-1 font-14">{{$oi->delivery_time}},</h6>
														
													</div>
													@endforeach
													@endif
												</div>
												</td>
											   <td>{{$o->address->name}}({{$o->address->contact}}){{$o->address->street}},{{$o->address->area->name}}{{$o->address->district->name}},({{$o->address->state->name}})</td>
											  
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
											   
								
											   <td>
											   </td>
                                            
										   </tr>
										   @endforeach
										
									   </tbody>
								   </table>
							   </div>
								
							</div>
						</div>
					</div>
				</div>	
								

							@endif
								</div>
						</div>
					</div>
				</div>
			</div>
</div>


