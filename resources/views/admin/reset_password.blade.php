@extends('admin.base')



@section('content')

<div class="page-wrapper">
    <div class="page-content">
        <div class="card p-4">
        
            <div class="card-body">
               <form action="{{route('updatepassword',$edits->id)}}" method="POST">
               @csrf
               @method('put')
               <h5 class="card-title">Reset Password</h5><hr/>
               
                <div class="mb-3">
                        <label for="">Email</label>
                        <input type="text"  readonly placeholder="{{$edits->email}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">PassWord</label>
                        <input type="text" name="password" placeholder="Enter New Password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="submit"  value="Reset Password" class="form-control btn btn-primary">
                    </div>
               </form>
            </div>
        </div>
    </div>
</div>