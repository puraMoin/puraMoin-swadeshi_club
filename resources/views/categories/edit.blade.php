@extends('layouts.app')

@section('content')

<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('categories.update', ['category' => $category->id]) }}" enctype="multipart/form-data">  
  <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
       @method('PUT')
       @csrf
      <div class="row mt-15">
          <!-- Id -->  
         <input type="hidden" name="id" value="{{ $category->id }}"  />

         <div class="row mt-15">
        <!-- Name -->
        <div class="col-sm-4">
            <div class="input-style-1">
            <label>Name<span class="mandatory">*</span></label>
            <input type="text"  name="name" placeholder="Name" value="{{ $category->name }}" required="true" />
            </div>   
         </div>
         <!-- Alias -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Alias<span class="mandatory">*</span></label>
            <input type="text"  name="alias" placeholder="Alias" value="{{ $category->alias }}" required="true" />
            </div>   
         </div>
       <!-- Active Code --> 
       <div class="col-sm-2">
             <!-- Active Code --> 
             <label>Active</label><br> 
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1" {{ $category->active == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" {{ $category->active == 0 ? 'checked' : '' }}> No
            </label>
         </div>
             <!-- Display Code --> 
         <div class="col-sm-2">
               <label>DispHome*</label><br> 
               <label class="radio-inline">
               <input type="radio" name="display_home_page" class="radio-inline" value="1" {{ $category->display_home_page == 1 ? 'checked' : '' }}> Yes
               </label>
               <label class="radio-inline">
               <input type="radio" name="display_home_page" class="radio-inline" value="0" {{ $category->display_home_page == 0 ? 'checked' : '' }}> No
               </label>
         </div>
      </div>  
      <hr>
       <div class="row mt-15">
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Title <span class="mandatory">*</span></label>
            <input type="text"  name="title" placeholder="Title" value="{{ $category->title }}"  required/>
            </div>   
         </div>
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Page Slug <span class="mandatory">*</span></label>
            <input type="text"  name="page_slug" placeholder="Page Slug" value="{{ $category->page_slug }}"   required/>
            </div>   
         </div>
          <div class="col-sm-6">
            <div class="input-style-1">
            <label>Page Title</label>
            <input type="text"  name="page_title" placeholder="Page Title" value="{{ $category->page_title }}" />
            </div>   
         </div>
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Page Url</label>
            <input type="url"  name="page_url" placeholder="Page URL" value="{{ $category->page_url }}"  readonly/>
            </div>   
         </div>
      </div> 
      <hr> 
      <div class="row mt-15">
        <div class="col-sm-12">
           <div class="input-style-1">
               <label>Description</label>
               <!-- <input type="text"  name="header_text" placeholder="Header Text" /> -->
               <textarea name="description" rows="10" class="rich-editor" >{{ $category->description }}</textarea>
            </div>  
        </div>
     </div>
     <hr>
     <div class="row mt-15">
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Meta Title <span class="mandatory">*</span></label>
            <input type="text"  name="meta_title" placeholder="Meta Title" value="{{ $category->meta_title }}"/>
            </div>   
         </div>
        <div class="col-sm-8">
           <div class="input-style-1">
               <label>Meta Description</label>
               <!-- <input type="text"  name="header_text" placeholder="Header Text" /> -->
               <textarea name="meta_description" rows="10">{{ $category->meta_description }}</textarea>
            </div>  
        </div>
     </div>
     <hr>
     <!--  Image -->
     <div class="row mt-15">            
       <div class="col-sm-4">
         <label>Image</label>
          <div id="iconBox">
         <img id="selectedIcon" src="{{ $category->smal_image ? asset('images/category/smal_image/' . $category->id . '/' . $category->smal_image) : asset('images/no-iblogmage.png') }}" alt="Selected Image">
         </div>
         <input type="file" name="smal_image" id="imageInput" onchange="displayIcon(this)" > 
          <span id="iconImage">{{ $category->smal_image }}</span>
        </div> 
        <div class="col-sm-4">
         <label>Image</label>
          <div id="imageBox">
         <img id="selectedImage" src="{{ $category->big_image ? asset('images/category/big_image/' . $category->id . '/' . $category->big_image) : asset('images/no-iblogmage.png') }}" alt="Selected Image">
         </div>
         <input type="file" name="big_image" id="image" onchange="displayImage(this)" > 
          <span id="iconImage">{{ $category->big_image }}</span>
        </div>
      </div> 
     <hr>
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



