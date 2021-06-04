@extends('admin.base')
@section('content')

        <div class="page-wrapper">
			<div class="page-content">
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
									   @foreach($orderitem as $o)
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
											   </td>
											   <td>{{$o->created_at}}</td>
											   <td class=""><a href=""><span class="btn btn-sm bg-danger text-light w-100">Cancled</span></a></td>
								
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
			</div>
		</div>