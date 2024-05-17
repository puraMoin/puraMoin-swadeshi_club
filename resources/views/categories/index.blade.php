@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')

     <div class="right-mob-left">
<!--         <a href="{{ route('countries.index') }}">
        <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Import</button> 
        </a> -->
        <a href="{{ route('categories.create') }}">
        <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
        </a>
    </div>
     
    <!--Add new section start here-->
<div class="card-style mt-20">
<div class="row">
<div class="col-sm-12">

</div>

<!-- <div class="col-sm-4 rowmargin10">
<div class="right-mob-left"><button type="button" class="main-btn dark-btn btn-hover btn-xs">Export</button></div>
</div> -->  
</div>
<hr>    
<div class="table-wrapper table-responsive mt-10">
<table class="table striped-table">
<thead>
<tr>
<th class="col-sm-2"><h6>Small Image</h6></th>
<th class="col-sm-3"><h6>Name</h6></th>    
<th class="col-sm-2"><h6>Status</h6></th>  
<th class="col-sm-2"><h6>Disp Home</h6></th>
<th class="text-center"><h6>Action</h6></th>
</tr>
<!-- end table row-->
</thead>
<tbody>
                @php $class = '';
                      $data = '';
                @endphp


                @foreach ($categories as $category) 
                <tr>  
                  <td><p> @php
                                $firstImage = $category->smal_image;
                                $id = $category->id;
                                $imagePath = $firstImage ? asset("images/category/smal_image/{$id}/{$firstImage}") : null;
                            @endphp

                            @if(!empty($imagePath))
                                <img src="{{ $imagePath }}" height="70px">
                 @endif </p></td>
                  <td><p>{{ $category->name }} </p></td>
                  <td class=""> 
                      @php if($category->active == '1'){
                            $class = 'activelabel';
                            $data = 'Active';
                            }
                            else{
                            $class = 'inactivelabel';
                            $data = 'Inactive';
                            } @endphp
                   <div class="{{ $class; }}">{{ $data }}</div>         
                   </td>
                   <td class=""> 
                      @php if($category->display_home_page == '1'){
                            $class = 'activelabel';
                            $data = 'Active';
                            }
                            else{
                            $class = 'inactivelabel';
                            $data = 'Inactive';
                            } @endphp
                   <div class="{{ $class; }}">{{ $data }}</div>         
                   </td>
                  <td class="text-center"><a href="{{ route('categories.edit',$category->id) }}"><i class="lni lni-pencil-alt"></i></a>
                  <a href="{{ route('categories.show',$category->id) }}"><i class="lni lni-list"></i></a>
                  </td>

                 </tr> 
                 @endforeach
</tbody> 

</table>
<!-- end table -->
</div>
</div>
<!-- Pagination Start Here -->

<!-- Pagination End here -->   
<!--Add new section end here-->
	</div>
</section>	
@endsection



