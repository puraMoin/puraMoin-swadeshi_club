@extends('layouts.app')

@section('content')  
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">  
   <div class="card-style mt-20">
      <!-- Form Start Here -->
       @csrf
      <div class="row mt-15">
        <!-- Name -->
        <div class="col-sm-4">
            <div class="input-style-1">
            <label>Name<span class="mandatory">*</span></label>
            <input type="text" id="name"  name="name" placeholder="Name" required="true" />
            </div>   
         </div>
         <!-- Product Code -->
        <div class="col-sm-4">
            <div class="input-style-1">
            <label>Product Code<span class="mandatory">*</span></label>
            <input type="text"  name="product_code" placeholder="Product Code" required="true" />
            </div>   
         </div>
         <!-- Category -->
         <div class="col-sm-4">
         <div class="select-style-1">
               <label>Category</label>
               <div class="select-position select-sm">
               <select class="jSelectbox" id="actionDropdown" name="category_id" required>
                  <option value="">Select</option>  
                      @foreach ($categories as $category)
                     <option value="{{ $category->name }}">{{ $category->name }}</option>
                      @endforeach
               </select>
               </div>
            </div>
         </div>
         <!--Sub Category -->
          <div class="col-sm-4">
         <div class="select-style-1">
               <label>SubCategory</label>
               <div class="select-position select-sm">
               <select class="jSelectbox" id="actionDropdown" name="sub_category_id" required>
                  <option value="">Select</option>  
                      @foreach ($subcategories as $subcategory)
                     <option value="{{ $subcategory->name }}">{{ $subcategory->name }}</option>
                      @endforeach
               </select>
               </div>
            </div>
         </div>
         <!--Product Type -->
         <div class="col-sm-4">
         <div class="select-style-1">
               <label>Product Type</label>
               <div class="select-position select-sm">
               <select class="jSelectbox" id="actionDropdown" name="product_type_id" required>
                  <option value="">Select</option>  
                      @foreach ($producttypes as $producttype)
                     <option value="{{ $producttype->name }}">{{ $producttype->name }}</option>
                      @endforeach
               </select>
               </div>
            </div>
         </div>
         <!--Brand -->
         <div class="col-sm-4">
         <div class="select-style-1">
               <label>Brand</label>
               <div class="select-position select-sm">
               <select class="jSelectbox" id="actionDropdown" name="brand_id" required>
                  <option value="">Select</option>  
                      @foreach ($brands as $brand)
                     <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                      @endforeach
               </select>
               </div>
            </div>
         </div>
      </div>  
      <hr>
      <div class="row mt-15">
      <div class="col-sm-4">
            <div class="input-style-1">
            <label>Page Title</label>
            <input type="text"  name="page_title" placeholder="Page Title"/>
            </div>   
         </div>
         
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Page Slug <span class="mandatory">*</span></label>
            <input type="text" id="page_slug" name="page_slug" placeholder="Page Slug"  required/>
            </div>   
         </div>

         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Canonical Url</label>
            <input type="url"  name="canonical_url" placeholder="Canonical Url"  readonly/>
            </div>   
         </div>
      </div>
      <hr>
      <!-- Description -->
      <div class="row mt-15">
        <div class="col-sm-12">
            <div class="input-style-1">
               <label>Description <span class="mandatory">*</span></label>
               <textarea name="description" rows="3" class="rich-editor"></textarea>
            </div>   
         </div>
     </div>
     <hr>
    <!-- Specification -->
     <div class="row mt-15">
        <div class="col-sm-12">
            <div class="input-style-1">
               <label>Specification <span class="mandatory">*</span></label>
               <textarea name="spefication" rows="3"></textarea>
            </div>   
         </div>
     </div>
     <hr>

      <div class="row mt-15">

          <!-- Apply Tax --> 
         <div class="col-sm-3">
               <label>Apply Tax</label><br> 
               <label class="radio-inline">
               <input type="radio" name="apply_tax" class="radio-inline" value="1"> Yes
               </label>
               <label class="radio-inline">
               <input type="radio" name="apply_tax" class="radio-inline" value="0" checked> No
               </label>
         </div>

         <div class="col-sm-3">
               <label>In Stock</label><br> 
               <label class="radio-inline">
               <input type="radio" name="in_stock" class="radio-inline" value="1"> Yes
               </label>
               <label class="radio-inline">
               <input type="radio" name="in_stock" class="radio-inline" value="0" checked> No
               </label>
         </div>

         <div class="col-sm-3">
               <label>Is Offer Applicable</label><br> 
               <label class="radio-inline">
               <input type="radio" name="is_offer_applicable" class="radio-inline" value="1"> Yes
               </label>
               <label class="radio-inline">
               <input type="radio" name="is_offer_applicable" class="radio-inline" value="0" checked> No
               </label>
         </div>

         <!-- Display Code --> 
         <div class="col-sm-3">
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
         <!-- Active Code --> 
         <div class="col-sm-3">
               <label>Active</label><br> 
               <label class="radio-inline">
               <input type="radio" name="active" class="radio-inline" value="1"> Yes
               </label>
               <label class="radio-inline">
               <input type="radio" name="active" class="radio-inline" value="0" checked> No
               </label>
         </div>

         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Price</label>
            <input type="text"  name="price" placeholder="Price"/>
            </div>   
         </div>

         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Tax Value</label>
            <input type="text"  name="tax_value" placeholder="Tax Value"/>
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
       <!-- Image -->
       <div class="col-sm-4">
            <label>Image</label>
             <div id="imageBox"><img id="selectedImage" src="{{ asset('images/no-image.png') }}" alt="Selected Image"></div>
             <input type="file" name="image_file" id="imgupload" onchange="displayImage(this)">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Listen for changes in the name field
        $('#name').on('input', function() {
            //alert("hie");
            var nameValue = $(this).val();
            $.ajax({
               type: 'GET',
                url: '{{ route("products.generate-slug") }}',
                data: { name: nameValue },
                dataType: 'json',
                success: function(response) {
                    $('#page_slug').val(response.slug);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });
        });
    });
</script>
@endsection

