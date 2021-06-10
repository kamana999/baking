@extends('admin.base')
@section('content')

<div class="page-wrapper">
			<div class="page-content">
                <div class="col-lg-3 col-xl-2 mb-3">
                    <a href="{{route('vendors.create')}}" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>New Vendor</a>
                </div>
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
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col">
						<div class="card radius-10 mb-0">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h5 class="mb-1">Recent Vendor</h5>
									</div>
								</div>

                               <div class="table-responsive mt-3">
								   <table class="table align-middle mb-0">
									   <thead class="table-light">
										   <tr>
											   <th>ID</th>
											   <th>Name</th>
											   <th>Email</th>
										   </tr>
									   </thead>
									   <tbody>
                                       @foreach($users as $vendor)
										   <tr>
											   <td>{{$vendor->id}}</td>
											   <td>
												<div class="d-flex align-items-center">
													<div class="ms-2">
														<h6 class="mb-1 font-14">{{$vendor->name}}</h6>
													</div>
												</div>
											   </td>
											   <td>{{$vendor->email}}</td>
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












