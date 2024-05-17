@extends('layouts.app')

@section('content')  
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">  
   <div class="card-style mt-20">
      <!-- Form Start Here -->
       @csrf
      <div class="row mt-15">
        <!-- Name -->
        <div class="col-sm-4">
            <div class="input-style-1">
            <label>Name<span class="mandatory">*</span></label>
            <input type="text"  name="name" placeholder="Name" required="true" />
            </div>   
         </div>
         <!-- Alias -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Alias<span class="mandatory">*</span></label>
            <input type="text"  name="alias" placeholder="Alias" required="true" />
            </div>   
         </div>
       <!-- Active Code --> 
         <div class="col-sm-2">
               <label>Active</label><br> 
               <label class="radio-inline">
               <input type="radio" name="active" class="radio-inline" value="1"> Yes
               </label>
               <label class="radio-inline">
               <input type="radio" name="active" class="radio-inline" value="0" checked> No
               </label>
         </div>
             <!-- Display Code --> 
         <div class="col-sm-2">
               <label>DispHome*</label><br> 
               <label class="radio-inline">
               <input type="radio" name="display_home_page" class="radio-inline" value="1"> Yes
               </label>
               <label class="radio-inline">
               <input type="radio" name="display_home_page" class="radio-inline" value="0" checked> No
               </label>
         </div>
      </div>  
      <hr>
      <div class="row mt-15">
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Title <span class="mandatory">*</span></label>
            <input type="text"  name="title" placeholder="Title"  required/>
            </div>   
         </div>
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Page Slug <span class="mandatory">*</span></label>
            <input type="text"  name="page_slug" placeholder="Page Slug"  required/>
            </div>   
         </div>
          <div class="col-sm-6">
            <div class="input-style-1">
            <label>Page Title</label>
            <input type="text"  name="page_title" placeholder="Page Title"/>
            </div>   
         </div>
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Page Url</label>
            <input type="url"  name="page_url" placeholder="Page URL"  readonly/>
            </div>   
         </div>
      </div>
      <hr>
      <div class="row mt-15">
        <div class="col-sm-12">
           <div class="input-style-1">
               <label>Description</label>
               <!-- <input type="text"  name="header_text" placeholder="Header Text" /> -->
               <textarea name="description" rows="10" class="rich-editor"></textarea>
            </div>  
        </div>
     </div>
     <hr>
     <div class="row mt-15">
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Meta Title <span class="mandatory">*</span></label>
            <input type="text"  name="meta_title" placeholder="Meta Title" />
            </div>   
         </div>
        <div class="col-sm-8">
            <div class="input-style-1">
               <label>Meta Description <span class="mandatory">*</span></label>
               <!-- <input type="text"  name="header_text" placeholder="Header Text" /> -->
               <textarea name="meta_description" rows="3"></textarea>
            </div>   
         </div>
     </div>
     <hr>

     <div class="row mt-15">
      <!-- Small Image -->
       <div class="col-sm-3">
         <label>Small Image</label>
          <div id="iconBox">
         <img id="selectedIcon" src="{{ asset('images/no-image.png') }}" alt="Selected Image">
         </div>
         <input type="file" name="smal_image" id="imageInput" onchange="displayIcon(this)">
      </div> 
       <!-- Big Image -->
       <div class="col-sm-4">
            <label>Big Image</label>
             <div id="imageBox"><img id="selectedImage" src="{{ asset('images/no-image.png') }}" alt="Selected Image"></div>
             <input type="file" name="big_image" id="imgupload" onchange="displayImage(this)">
        </div>
     </div>

     <hr>
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

