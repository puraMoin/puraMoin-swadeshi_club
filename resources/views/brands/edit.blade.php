@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('brands.update', ['brand' => $brand->id]) }}" enctype="multipart/form-data">  
  <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
       @method('PUT')
       @csrf
      <div class="row mt-15">
          <!-- Id -->  
         <input type="hidden"  name="id" value="{{ $brand->id }}"  />
        <!-- Role -->
      <div class="row mt-15">      
         <!-- Name -->
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Name<span class="mandatory">*</span></label>
            <input type="text"  name="name" placeholder="Enter Name" required="true" value="{{ $brand->name }}" />
            </div>   
         </div>
         <div class="col-sm-6">
            <!-- Active Code --> 
             <label>Active</label><br> 
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1" {{ $brand->active == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" {{ $brand->active == 0 ? 'checked' : '' }}> No
            </label>
         </div>
        </div>   
       <div class="row mt-15">
        <!-- Image -->
         <div class="col-sm-6">
           <label>Image</label>
            <div id="imageBox">
           <img id="selectedIcon" src="{{ $brand->image_file ? asset('images/brands/image_file/' . $brand->id . '/' . $brand->image_file) : asset('images/no-image.png') }}" alt="Selected Image">
           </div>
           <input type="file" name="image_file" id="imageInput" onchange="displayIcon(this)" > 
            <span id="iconImage">{{ $brand->image_file }}</span>
          </div> 

       </div>  
       
      <div class="row mt-15">
       <div class="col-sm-3">  
        <button class="btn btn-info" type="submit">Save</button>
        <button class="btn btn-warning" type="reset">Reset</button>
        </div>
      </div>  

	</div>
</form>
</section>	
@endsection

