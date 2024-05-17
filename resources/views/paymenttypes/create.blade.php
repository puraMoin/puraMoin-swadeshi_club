@extends('layouts.app')

@section('content')   
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('paymenttypes.store') }}" enctype="multipart/form-data">  
  <div class="card-style mt-20">
      <!-- Form Start Here -->
       @csrf
      <div class="row mt-15">      
         <!-- Name -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Name<span class="mandatory">*</span></label>
            <input type="text"  name="name" placeholder="Enter Name" required="true" />
            </div>   
         </div>
         <!-- Active Code -->
         <div class="col-sm-4"> 
             <label>Active</label><br> 
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1"> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" checked> No
            </label>
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
<script>
   
</script>

