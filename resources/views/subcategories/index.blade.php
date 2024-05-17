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
        <a href="{{ route('subcategories.create') }}">
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
<th class="col-sm-2"><h6>Image</h6></th>
<th class="col-sm-3"><h6>Category Name</h6></th> 
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


                @foreach ($subcategories as $subcategory) 
                <tr>  
                  <td><p> @php
                                $firstImage = $subcategory->image_file;
                                $id = $subcategory->id;
                                $imagePath = $firstImage ? asset("images/subcategory/image_file/{$id}/{$firstImage}") : null;
                            @endphp

                            @if(!empty($imagePath))
                                <img src="{{ $imagePath }}" height="70px">
                 @endif </p></td>
                 <td><p>{{ $subcategory->category->name }} </p></td>
                  <td><p>{{ $subcategory->name }} </p></td>
                  <td class=""> 
                      @php if($subcategory->active == '1'){
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
                      @php if($subcategory->display_home_page == '1'){
                            $class = 'activelabel';
                            $data = 'Active';
                            }
                            else{
                            $class = 'inactivelabel';
                            $data = 'Inactive';
                            } @endphp
                   <div class="{{ $class; }}">{{ $data }}</div>         
                   </td>
                  <td class="text-center"><a href="{{ route('subcategories.edit',$subcategory->id) }}"><i class="lni lni-pencil-alt"></i></a>
                  <a href="{{ route('subcategories.show',$subcategory->id) }}"><i class="lni lni-list"></i></a>
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



