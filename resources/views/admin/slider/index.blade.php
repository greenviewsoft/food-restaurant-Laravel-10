@extends('admin.master')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Slider </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.slider.create') }}" class="btn btn-primary px-5">Create Slider </a>

                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        
            <hr/>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                       
           <form action="" method="POST">
            @csrf
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                  
                                    <th width="50px">Sl</th>
                                    <th>Title</th> 
                                    <th>Image</th> 
                                    <th>SubTitle</th>
                                    <th>Short Description</th>
                                    <th>Offer</th>
                                    <th>Button_link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($slider as $key=> $item ) 
                                <tr>
                                   
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td> <img src="{{ asset($item->image) }}" alt="" style="width:70px; height:40px;" > </td>
                                    <td>{{ $item->sub_title }}</td>
                                    <td>{{ $item->short_description }}</td>
                                    <td>{{ $item->offer }}</td>
                                    <td>{{ $item->button_link }}</td>
                                   <td> 
            <a href="" class="btn btn-warning px-3 radius-30"> Edit</a>
            <a href="" class="btn btn-danger px-3 radius-30" id="delete"> Delete</a>
        
                                    </td>
                                </tr>
                                @endforeach 
    
                            </tbody>
                        </table>

                    </form>     
                    </div>
                </div>
            </div>
        
            <hr/>
        
        </div>
        
        
        
        
        @endsection