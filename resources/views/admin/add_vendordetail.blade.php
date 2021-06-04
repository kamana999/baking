@extends('admin.base')
@section('content')


<div class="page-wrapper">
	<div class="page-content">

        <!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Vendor</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Vendor Details</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

              <div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Add Vendor Details</h5>
					  <hr/>
                        <div class="form-body mt-4">
                            <div class="row">
                            <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                            <form action="{{route('vendordetail')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="">User_Id<span class="text-danger"> * </span></label>
                                    <select name="user_id" id="" class="form-control">
                                        @foreach ($users as $c)
                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Contact<span class="text-danger"> * </span></label>
                                    <input type="text" name="contact" class="form-control">
                                    @if ($errors->has('contact'))
                                        <span class="text-danger">{{ $errors->first('contact') }}</span>
                                    @endif

                                </div> 
                                <div class="mb-3">
                                    <label for="">contact2</label>
                                    <input type="text" name="contact2" class="form-control">
                                </div> 
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Street<span class="text-danger"> * </span></label>
                                    <input type="text" name="street" class="form-control">
                                    @if ($errors->has('street'))
                                        <span class="text-danger">{{ $errors->first('street') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="">Country<span class="text-danger"> * </span></label>
                                    <select name="country_id" id="" class="form-control">
                                        @foreach ($country as $c)
                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">State<span class="text-danger"> * </span></label>
                                    <select name="state_id" id="" class="form-control">
                                        @foreach ($state as $c)
                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="">District<span class="text-danger"> * </span></label>
                                    <select name="district_id" id="" class="form-control">
                                        @foreach ($district as $c)
                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="">area<span class="text-danger"> * </span></label>
                                    <select name="area_id" id="" class="form-control">
                                        @foreach ($area as $c)
                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="">image</label>
                                    <input type="file" name="image" class="form-control">
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