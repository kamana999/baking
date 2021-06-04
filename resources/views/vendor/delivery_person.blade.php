@extends('admin.base')
@section('content')
<div class="page-wrapper">
			<div class="page-content">
                <div class="col-lg-3 col-xl-2 mb-3">
                    <a href="{{route('createstaff')}}" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>New Staff</a>
                </div>
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Staff Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javasc ript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Staff Profile</li>
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
										<h5 class="mb-1">Recent Staff</h5>
									</div>
								</div>

                               <div class="table-responsive mt-3">
								   <table class="table align-middle mb-0">
									   <thead class="table-light">
										   <tr>
											   <th>ID</th>
											   <th>Name</th>
											   <th>Email</th>
											   <th>Contact</th>
											   <th>Address</th>
											   <th>Image</th>
											   <th>Actions</th>
										   </tr>
									   </thead>
									   <tbody>
                                       @foreach($staffs as $staff)
										   <tr>
											   <td>{{$staff->id}}</td>
											   <td>
												<div class="d-flex align-items-center">
													<div class="ms-2">
														<h6 class="mb-1 font-14">{{$staff->name}}</h6>
													</div>
												</div>
											   </td>
											   <td>{{$staff->user->email}}</td>
											   <td class=""><span class="badge bg-light-success text-success w-100">{{$staff->contact}}</span></td>
											   <td class="">{{$staff->address}}</span></td>
											   <td><img src="{{url('upload/',$staff->image)}}" height="80" width="100" alt=""></td>
											   <td>
												<div class="d-flex order-actions">
													
												<form  class="d-inline" action="{{route('delivery.destroy',['delivery'=>$staff->id])}}" method="POST">
													@csrf @method('delete')
													<button type="submit" class=" btn btn-transparent text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
													<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
													<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
													</svg></button>
												</form>
												<a href="{{route('delivery.show',['delivery'=>$staff->id])}}" class=" bg-transparent text-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
													<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
													<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
													</svg>
												</a>
												<a href="{{route('delivery.edit',['delivery'=>$staff->id])}}"  class=" bg-transparent text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-pencil-square" viewBox="0 0 16 16">
														<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
														<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
														</svg>
													</a>
												
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