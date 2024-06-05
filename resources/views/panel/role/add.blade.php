@extends('panel.adminlayout.app')  
  
  
 @section('content')

 <div class="pagetitle">
    <h1>Role</h1> 
   
  </div><!-- End Page Title -->



  <section class="section" style="width:210vh;">
    <div class="row">
      <div class="col-lg-8">
        @include('layout._message')
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add New Role</h5>

            <!-- General Form Elements -->
            <form action="{{route('rolesinsert')}}" method="POST">
                @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" required class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label style="display: block; margin-bottom: 20px;" for="inputText"
                    class="col-sm-2 col-form-label"><b>Permissions</b></label>
                 @foreach ($getPermission as $value)
               

                <div class="row" style="margin-bottom: 20px">
                                <div class="col-md-3">
                                    {{ $value['name'] }}
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                          @foreach ($value['group'] as $group)
                          <div class="col-md-3">
                            <label for=""><input type="checkbox" value="{{ $group['id'] }}" name="permission_id[]" id="">{{ $group['name'] }}</label>
                          </div>
                          @endforeach
                        </div>
                        
                            
                        
                    </div>
                
                <hr>
              </div>
                @endforeach
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



  