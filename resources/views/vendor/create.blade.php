@extends('vendor.base')
@section('content')

<div class="page-wrapper">
			<div class="page-content">

				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Cake</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add New Cake</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

                <div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Add New Cake</h5>
					  <hr/>
                        <div class="form-body mt-4">
                            <div class="row">
                            <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                            <form action="{{route('cakesubmit',['id'=>$vendor->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Cake Title</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control"  name="description"rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Category</label>
                                    <select name="category_id" id="" class="form-control">
                                        <option value="">Select a Category</option>
                                        @foreach ($categories as $c)
                                            <option value="{{$c->id}}"{{ $c->id === old('category_id') ? 'selected' : '' }}>{{$c->cat_title}}</option>
                                            @if ($c->children)
                                                @foreach ($c->children as $child)
                                                    <option value="{{ $child->id }}" {{ $child->id === old('category_id') ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;{{ $child->cat_title }}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">price</label>
                                    <input type="text" name="price" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">discount_price</label>
                                    <input type="text" name="discount_price" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="">Weight Type</label>
                                    <select name="weight_type" id="weight_type" class="form-control">
                                        <option value="pound">Pound</option>
                                        <option value="kg">KG</option>
                                           
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Weight</label>
                                    <input type="text" name="weight" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">layer</label>
                                    <input type="text" name="layer" value="1" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Unit</label>
                                    <input type="text" name="unit" value="1" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">isVeg</label>
                                    <select name="isVeg" id="isVeg" class="form-control">
                                        <option value="no">No</option>
                                        <option value="yes">Yes</option>
                                           
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Cake Images</label>
                                    <input type="file" name="image" class="form-control">
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

