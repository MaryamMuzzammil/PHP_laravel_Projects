@extends('panel.adminlayout.app')  
  
  
 @section('content')

 <div class="pagetitle">
    <h1>Events</h1> 
   
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        @include('layout._message')
        <div class="card">
          <div class="card-body">
            <div class="row">
            <div class="col-lg-6">
                <h5 class="card-title">Events List</h5>
            </div>
            <div class="col-lg-6" style="text-align: right">
              @if(!empty($permissionAdd))
                <a href="{{route('eventsadd')}}" style="margin-top: 10px" class="btn btn-primary pull-right">Add</a>
                @endif
              </div>
        </div>
            <!-- Table with stripped rows -->
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Title</th>
                  <th scope="col">Date</th>
                  <th scope="col">Time </th>
                  <th scope="col">Image</th>
                  @if (!empty($permissionEdit || $permissionDelete))
                  <th scope="col">Action</th>
                  @endif
                </tr>
              </thead>
              <tbody>
                @foreach ($getRecord as $value)
                <tr>
                    <th scope="row">{{$value->id}}</th>
                    <td>{{$value->title}}</td>
                    <td>{{$value->date}}</td>
                    <td>{{$value->time}}</td>
                    <td>{{$value->image}}</td>
                    <td>
                      @if (!empty($permissionEdit)) 
                        <a href="{{route('eventsedit',$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        @endif
                        @if (!empty($permissionDelete)) 
                        <a href="{{route('eventsdelete',$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        @endif
                      </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>


      </div>
    </div>
  </section>
@endsection



  