@extends('layouts.app')

@section('content')

<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('blogs.update', ['blog' => $blog->id]) }}" enctype="multipart/form-data">  
  <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
       @method('PUT')
       @csrf
      <div class="row mt-15">
          <!-- Id -->  
         <input type="hidden" name="id" value="{{ $blog->id }}"  />

          
        <div class="row mt-15"> 
           <!-- Blog Date -->
           <div  class="col-sm-3">
              <div class="input-style-1">
              <label>Date <span class="mandatory">*</span></label>
              <!-- <input type="text" name="Date" class="date" placeholder="Date"  /> -->
              <input type="text" name="blog_date" id="datepicker" class="date" value="{{ $blog->blog_date }}">
              </div>   
           </div>
          <!-- Categories -->
         <div  class="col-sm-3">
            <div class="select-style-1">
            <label for="BlogCategory">Category <span class="mandatory"> *</span></label>
            <div class="select-position select-sm">
             <select class="jSelectbox" id="BlogCategory" name="blog_category_id" required>
                <option value="{{ $blogCategory->id }}">{{ $blogCategory->name }}</option> 
                  @foreach ($blogCategories as $blogCategory)
                     <option value="{{ $blogCategory->id }}">{{ $blogCategory->name }}</option>
                  @endforeach  
             </select>
             </div>
            </div>   
         </div>
          <!-- Blog Author -->
         <div  class="col-sm-3">
            <div class="select-style-1">
            <label>Authors <span class="mandatory"> *</span></label>
            <div class="select-position select-sm">
             <select class="jSelectbox" id="actionDropdown" name="blog_author_id" required>
                <option value="{{ $blogAuthor->id }}">{{ $blogAuthor->author_name }}</option>  
                  @foreach ($blogAuthors as $blogAuthor)
                     <option value="{{ $blogAuthor->id }}">{{ $blogAuthor->author_name }}</option>
                  @endforeach   
             </select>
             </div>
            </div>   
         </div>
        <!-- Blog Tags --> 
              <div class="col-sm-3">
                  <div class="select-style-1">
                      <label>Blog Tags</label>
                      <div class="select-position select-sm">
                          <select class="jSelectbox" id="actionDropdown" name="blogtags[]" multiple="true" required>
                              @foreach ($blogtags as $blogtag)
                                  <option value="{{ $blogtag->id }}" {{ in_array($blogtag->id, $selectedBlogTags->pluck('id')->toArray()) ? 'selected' : '' }}>
                                      {{ $blogtag->name }}
                                  </option>
                              @endforeach
                          </select>
                      </div>
                  </div>
              </div>
      </div>
      <hr>
       <div class="row mt-15">
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Title <span class="mandatory">*</span></label>
            <input type="text"  name="title" placeholder="Title" value="{{ $blog->title }}" id="BlogTitle"  required/>
            </div>   
         </div>
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Page Slug <span class="mandatory">*</span></label>
            <input type="text"  name="page_slug" placeholder="Page Slug" value="{{ $blog->page_slug }}" id="BlogPageSlug"   required/>
            </div>   
         </div>
          <div class="col-sm-5">
            <div class="input-style-1">
            <label>Page Title</label>
            <input type="text"  name="page_title" placeholder="Page Title" value="{{ $blog->page_title }}" />
            </div>   
         </div>
         <div class="col-sm-7">
            <div class="input-style-1">
            <label>Page Url</label>
            <input type="url"  name="page_url" placeholder="Page URL" value="{{ $blog->page_url }}" id="BlogPageUrl"  readonly/>
            </div>   
         </div>
      </div> 
      <hr>
      <div class="row mt-15">
        <div class="col-sm-12">
            <div class="input-style-1">
               <label>Header Text <span class="mandatory">*</span></label>
               <!-- <input type="text"  name="header_text" placeholder="Header Text" /> -->
               <textarea name="header_text" rows="3"> {{ $blog->header_text }} </textarea>
            </div>   
         </div>
     </div>
     <hr>
     <div class="row mt-15">           
      <!--  Image -->
       <div class="col-sm-4">
         <label>Image</label>
          <div id="bannerBox">
         <img id="selectedImage" src="{{ $blog->image_file ? asset('images/blog/image_file/' . $blog->id . '/' . $blog->image_file) : asset('images/no-iblogmage.png') }}" alt="Selected Image">
         </div>
         <input type="file" name="image_file" id="imageInput" onchange="displayIcon(this)" > 
          <span id="iconImage">{{ $blog->image_file }}</span>
        </div> 
        <div class="col-sm-4">
             <!-- Active Code --> 
             <label>Active</label><br> 
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1" {{ $blog->active == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" {{ $blog->active == 0 ? 'checked' : '' }}> No
            </label>
         </div>
      </div> 
     <hr>
     <div class="row mt-15">
        <div class="col-sm-12">
           <div class="input-style-1">
               <label>Description</label>
               <!-- <input type="text"  name="header_text" placeholder="Header Text" /> -->
               <textarea name="description" rows="10" class="rich-editor"> {{ $blog->description }} 
               </textarea>
            </div>  
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
   $('#BlogCategory').change(function() {
   var categoryText = $('#BlogCategory').find('option:selected').text().toLowerCase();
   var catslug = categoryText.replace(/[_\s]()/g, '-');
   //alert(catslug);   
   var value = $('#BlogTitle').val();
   var result = value.replace(/[_\s()&]/g, function(match) {
    if (match === '&') {
       return 'and'; // Replace '&' with 'and'
    } else {
      return '-'; // Replace spaces, underscores, and parentheses with '-'
    }
   });

   var blogsid = "<?php echo $blogsId; ?>";

   var url = "<?php echo $baseUrl;?>" +'/'+ catslug +'/'+ result +'-'+ blogsid;

   $('#BlogPageUrl').val(url);

});

$('#BlogTitle').keyup(function(){
   var value = $(this).val().toLowerCase();
   var name = capitalizeFirstLetter(value);

   var result = value.replace(/[_\s()&]/g, function(match) {
    if (match === '&') {
       return 'and'; // Replace '&' with 'and'
    } else {
      return '-'; // Replace spaces, underscores, and parentheses with '-'
    }
   });  

   var top = $('#BlogCategory').val();
   if(top != '')
	{
	var categoryText = $('#BlogCategory').find('option:selected').text().toLowerCase();
	var catslug = categoryText.replace(/[_\s]()/g, '-');
	var blogsid = "<?php echo $blogsId; ?>";
	var url = "<?php echo $baseUrl;?>" +'/'+ catslug +'/'+ result +'-'+ blogsid;
	//alert(url);
	
	}
	else{
	var blogsid = "<?php echo $blogsId; ?>";
	var url = "<?php echo $baseUrl;?>"  +'/'+ result +'-'+ blogsid;
	//alert(url);
	}

    $('#BlogPageSlug').val(result);
	 $('#BlogPageUrl').val(url);

});

/*Update From Page Slug*/
$('#BlogPageSlug').keyup(function(){
	var value = $(this).val().toLowerCase();
	var result = value.replace(/[_\s()&]/g, function(match) {
    if (match === '&') {
      return 'and'; // Replace '&' with 'and'
    } else {
      return '-'; // Replace spaces, underscores, and parentheses with '-'
    }
  });
	$(this).val(result);
	var top = $('#BlogCategory').val();
	if(top != '')
	{
	var categoryText = $('#BlogCategory').find('option:selected').text().toLowerCase();
	var catslug = categoryText.replace(/[_\s]()/g, '-');
	var blogsid = "<?php echo $blogsId; ?>";
	var url = "<?php echo $baseUrl;?>" +'/'+ catslug +'/'+ result +'-'+ blogsid;
	//alert(url);
	
	}
	else{
	var blogsid = "<?php echo $blogsId; ?>";
	var url = "<?php echo $baseUrl;?>"  +'/'+ result +'-'+ blogsid;
	//alert(url);
	}
	$('#BlogPageUrl').val(url);
});

function capitalizeFirstLetter(text) {
    return text.replace(/^(.)|\s(.)/g, function($1) {
        return $1.toUpperCase();
    });
}
});

</script>   



