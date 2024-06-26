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
											   <th>Name</th>
											   <th>Contact</th>
											   <th>Status</th>
											   <th>Actions</th>
										   </tr>
									   </thead>
									   <tbody>
									   @foreach($customize as $o)
										   <tr>
                                           
											   <td>00000A{{$o->id}}</td>
											   <td>{{$o->name}}</td>
											   <td>{{$o->contact}}</td>
											   <td class=""><a href=""><span class="btn btn-sm bg-warning text-light-warning w-70">Order</span></a></td>
								
											   <td>
												<div class="d-flex order-actions">	<a href="" class=" btn btn-sm text-danger bg-light-danger border-0"><i class='bx bxs-trash'></i></a>
				
												</div>
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