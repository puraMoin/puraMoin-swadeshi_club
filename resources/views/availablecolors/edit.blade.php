@extends('layouts.app')

@section('content')

<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('availablecolors.update', ['availablecolor' => $availablecolor->id]) }}" enctype="multipart/form-data">
  <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
       @method('PUT')
       @csrf
      <div class="row mt-15">
          <!-- Id -->  
         <input type="hidden" name="id" value="{{ $availablecolor->id }}"  />

          
           <div class="row mt-15"> 
           <!-- Role Name -->  
             <div class="col-sm-4">
                <div class="input-style-1">
                <label>Name<span class="mandatory">*</span></label>
                <input type="text"  name="name" placeholder="Name" value="{{ $availablecolor->name }}"  />
                </div>   
             </div>

             <div class="col-sm-4">
                <div class="input-style-1">
                <label>Color Code<span class="mandatory">*</span></label>
                <input type="text"  name="color_code" placeholder="Color Code" value="{{ $availablecolor->color_code }}"  />
                </div>   
             </div>


           <!-- Active Code --> 
         <div class="col-sm-4">
             <label>Active</label><br> 
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1" {{ $availablecolor->active == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" {{ $availablecolor->active == 0 ? 'checked' : '' }}> No
            </label>
         </div>

      </div> 
      <div class="row mt-15">
       <div class="col-sm-3">  
        <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Save</button>
        <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
        </div>
      </div>  

	</div>
</form>
</section>	
@endsection



