@extends('admin.base')
@section('content')


<div class="page-wrapper">
	<div class="page-content">

        <!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Delivery Person</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Delivery Person Details</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

              <div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Edit Delivery Person Details</h5>
					  <hr/>
                        <div class="form-body mt-4">
                            <div class="row">
                            <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                            <form action="{{route('delivery.update',$edits->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="">Name<span class="text-danger"> * </span></label>
                                    <input type="text" name="name" class="form-control" value="{{$edits->name}}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div> 
                                <div class="mb-3">
                                    <label for="">User_Id<span class="text-danger"> * </span></label>
                                    <select name="user_id" id="" class="form-control"  value="{{$edits->user}}">
                                        <option>Select User  Id</option>
                                        @foreach ($users as $c)
                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Contact<span class="text-danger"> * </span></label>
                                    <input type="text" name="contact" class="form-control" value="{{$edits->contact}}">
                                    @if ($errors->has('contact'))
                                        <span class="text-danger">{{ $errors->first('contact') }}</span>
                                    @endif
                                </div> 
                                <div class="mb-3">
                                    <label for="">contact2</label>
                                    <input type="text" name="contact2" class="form-control"  value="{{$edits->contact2}}">
                                </div> 
                                <div class="mb-3">
                                    <label for="">Address<span class="text-danger"> * </span></label>
                                    <input type="text" name="address" class="form-control"  value="{{$edits->address}}">
                                    @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="">Aadhar_no<span class="text-danger"> * </span></label>
                                    <input type="text" name="aadhar_no" class="form-control"  value="{{$edits->aadhar_no}}">
                                    @if ($errors->has('aadhar_no'))
                                        <span class="text-danger">{{ $errors->first('aadhar_no') }}</span>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label for="">Status</label>
                                    <select name="status" id="status" class="form-control" >
                                        <option>{{$edits->status}}</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select> 
                                </div> 
                                <div class="mb-4">
                                    <label for="">Vehicle</label>
                                    <select name="vehicle" id="vehicle" class="form-control" value="{{$edits->vehicle}}">
                                        <option>{{$edits->vehicle}}</option>
                                        <option value="Bike">Bike</option>
                                        <option value="Cycle">Cycle</option>
                                        <option value="Ecycle">E-Cycle</option>
                                           
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="">Work Time</label>
                                    <select name="work_time" id="work_time" class="form-control" value="{{$edits->work_time}}">
                                        <option>{{$edits->work_time}}</option>
                                        <option value="Part Time">Part Time</option>
                                        <option value="Full Time">Full Time</option>
                                           
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">image</label>
                                    <img src="{{url('upload/'.$edits->image)}}" height="80" width="80" alt="">
                                    <input type="file" name="image" class="form-control">
                                    @if ($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="">pancard</label>
                                    <img src="{{url('upload/'.$edits->pancard)}}" height="80" width="80" alt="">
                                    <input type="file" name="pancard" class="form-control">
                                    @if ($errors->has('pancard'))
                                        <span class="text-danger">{{ $errors->first('pancard') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="">Bank Passbook</label>
                                    <img src="{{url('upload/'.$edits->bank_passbook)}}" height="80" width="80" alt="">
                                    <input type="file" name="bank_passbook" class="form-control">
                                    @if ($errors->has('bank_passbook'))
                                    <span class="text-danger">{{ $errors->first('bank_passbook') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="">Driving License</label>
                                    <img src="{{url('upload/'.$edits->driving_license)}}" height="80" width="80" alt="">
                                    <input type="file" name="driving_license" class="form-control">
                                    @if ($errors->has('driving_license'))
                                        <span class="text-danger">{{ $errors->first('driving_license') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-dark w-100">
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