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
								<li class="breadcrumb-item active" aria-current="page">Edit New Cake</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

              <div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Edit Cake</h5>
					  <hr/>
                        <div class="form-body mt-4">
                            <div class="row">
                            <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                            <form action="{{route('cake.update',$edits->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label class="form-label">Cake Title</label>
                                    <input type="text" name="title" class="form-control"  value="{{$edits->title}}">
                                </div>
                                <div class="mb-3">
                                    <label for="">Category</label>
                                    <select name="category_id" id="" class="form-control">
                                        <option value="">Select a Category</option>
                                        @foreach ($categories as $c)
                                            <option value="{{$c->id}}"{{ $c->id === $edits->category_id ? 'selected' : '' }}>{{$c->cat_title}}</option>
                                            @if ($c->children)
                                                @foreach ($c->children as $child)
                                                    <option value="{{ $child->id }}" {{ $child->id === $edits->category_id ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;{{ $child->cat_title }}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">price</label>
                                    <input type="text" name="price" class="form-control" value="{{$edits->price}}"> 
                                </div>
                                <div class="mb-3">
                                    <label for="">discount_price</label>
                                    <input type="text" name="discount_price" class="form-control" value="{{$edits->discount_price}}">
                                </div>
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <input type="text" name="description" class="form-control" value="{{$edits->description}}">
                                </div>
                                <div class="mb-4">
                                    <label for="">Weight Type</label>
                                    <select name="weight_type" id="weight_type" class="form-control" value="{{$edits->weight_type}}">
                                        <option value="pound">Pound</option>
                                        <option value="kg">KG</option>
                                           
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Weight</label>
                                    <input type="text" name="weight" class="form-control" value="{{$edits->weight}}">
                                </div>
                                <div class="mb-3">
                                    <label for="">layer</label>
                                    <input type="text" name="layer" class="form-control" value="{{$edits->layer}}">
                                </div>
                                <div class="mb-3">
                                    <label for="">flavour</label>
                                    <input type="text" name="flavour" class="form-control" value="{{$edits->flavour}}">
                                </div>
                                <div class="mb-3">
                                    <label for="">Unit</label>
                                    <input type="text" name="unit" value="{{$edits->unit}}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">isVeg</label>
                                    <input type="text" name="isVeg" class="form-control" value="{{$edits->isVeg}}">
                                </div>
                                <div class="mb-3">
                                    <label for="">Image</label>
                                    <img src="{{url('upload/',$edits->image)}}" height="80" width="100" alt="">
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




<!-- <div class="col-lg-4">
            <h4>Add Cake Details</h4>
            <div class="card card-body">
                <form action="{{route('cake.update',$edits->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="">title</label>
                        <input type="text" name="title" class="form-control" value="{{$edits->title}}">
                    </div>
                    <div class="mb-3">
                        <label for="">Category</label>
                        <select name="category_id" id="" class="form-control" value="{{$edits->category->cat_title}}">
                            @foreach ($categories as $c)
                                <option value="{{$c->id}}">{{$c->cat_title}}</option>
                            @endforeach
                        </select>
                </div>
                    <div class="mb-3">
                        <label for="">price</label>
                        <input type="text" name="price" class="form-control" value="{{$edits->price}}"> 
                    </div>
                    <div class="mb-3">
                        <label for="">discount_price</label>
                        <input type="text" name="discount_price" class="form-control" value="{{$edits->discount_price}}">
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <input type="text" name="description" class="form-control" value="{{$edits->description}}">
                    </div>
                    <div class="mb-3">
                        <label for="">Weight</label>
                        <input type="text" name="weight" class="form-control" value="{{$edits->weight}}">
                    </div>
                    <div class="mb-3">
                        <label for="">layer</label>
                        <input type="text" name="layer" class="form-control" value="{{$edits->layer}}">
                    </div>
                    <div class="mb-3">
                        <label for="">flavour</label>
                        <input type="text" name="flavour" class="form-control" value="{{$edits->flavour}}">
                    </div>
                    <div class="mb-3">
                        <label for="">isVeg</label>
                        <input type="text" name="isVeg" class="form-control" value="{{$edits->isVeg}}">
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <img src="{{url('upload/',$edits->image)}}" height="80" width="100" alt="">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-dark w-100">
                    </div>
                </form>
            </div>
</div> -->
