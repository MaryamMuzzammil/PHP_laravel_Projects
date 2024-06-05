@extends('panel.adminlayout.app')  
  
  
 @section('content')

 <div class="pagetitle">
    <h1>User</h1> 
   
  </div><!-- End Page Title -->



  <section class="section">
    <div class="row">
      <div class="col-lg-8">
        @include('layout._message')
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add New User</h5>

            <!-- General Form Elements -->
            <form action="{{route('usersinsert')}}" method="POST">
                @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name"  value="{{old('name')}}" required class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                 
                    <input type="text" name="email" value="{{old('email')}}" required class="form-control">
                {{-- <div style="color:red">{{$errors->first('email')}}</div> --}}
                
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="text" name="password" required class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <select class="form-control" name="role_id" >
                    <option value="">Select</option>
                    @foreach ($getRole as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>  
                    {{-- <option {{ (old('role_id') == $value->id)? 'selected' :''}} value="{{$value->id}}"{{$value->name}}></option> --}}
                    @endforeach
                  </select>
                </div>
              </div>
              
              <div class="row mb-3">
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>

            </form>

          </div>
        </div>

      </div>

      
    </div>
  </section>

 
@endsection



  