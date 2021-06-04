@extends('admin.base')
@section('content')

<div class="page-wrapper">
			<div class="page-content">

				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Coupon</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Coupon</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

              <div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Edit Coupon</h5>
					  <hr/>
                        <div class="form-body mt-4">
                            <div class="row">
                            <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                            <form action="{{route('coupons.update', $edits->id)}}" method="POST">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label class="form-label">Code</label>
                                    <input type="text" name="code" class="form-control" value="{{$edits->code}}">
                                </div>
                                <div class="mb-4">
                                    <label for="">Type</label>
                                    <select name="type" id="type" class="form-control" >
                                        <option value="{{$edits->type}}">{{$edits->type}}</option>
                                        <option value="">Select Type</option>
                                        <option value="percentage">Percentage</option>
                                        <option value="numeric">Numeric</option>     
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Value</label>
                                    <input class="form-control"  name="value" value="{{$edits->value}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Count</label>
                                    <input class="form-control"  name="count" value="{{$edits->count}}">
                                </div>
                                <div class="mb-4">
                                    <label for="">Select Expire date</label>
                                    <input class="form-control" name="expired_at" value="{{$edits->expired_at}}">
                                </div>
                                <div class="col-12 mt-2">
                                <div class="d-grid">
                                    <input type="submit" class="btn btn-primary w-100">    
                                </div>
                            </div>
                            </form>
                            </div>
    
                            </div>
                            </div>
                        </div>
					</div>
				  </div>
			  </div>

			</div>
</div>
