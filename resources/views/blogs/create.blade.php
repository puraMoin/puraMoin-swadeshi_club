@extends('layouts.app')

@section('content')  
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">  
   <div class="card-style mt-20">
      <!-- Form Start Here -->
       @csrf
      <div class="row mt-15">
         <!-- Blog Date -->
         <div  class="col-sm-3">
            <div class="input-style-1">
            <label>Date <span class="mandatory">*</span></label>
            <!-- <input type="text" name="Date" class="date" placeholder="Date"  /> -->
             <input type="text" name="blog_date" id="datepicker" class="date">
            </div>   
         </div>
         <!-- Categories -->
         <div  class="col-sm-3">
            <div class="select-style-1">
            <label for="BlogCategory">Category <span class="mandatory"> *</span></label>
            <div class="select-position select-sm">
             <select class="jSelectbox" id="BlogCategory" name="blog_category_id" required>
                <option value="">Select Category</option>  
                 <?php 
                    foreach ($blogCategoryList as $blogCategoryId => $blogCategory){
                     
                 ?>  
                   <option value="{{ $blogCategoryId }}" >{{ $blogCategory }}</option>
                 <?php } ?>   
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
                <option value="">Select Author</option>  
                 <?php 
                    foreach ($blogAuthorList as $blogAuthorId => $blogAuthor){
                     
                 ?>  
                   <option value="{{ $blogAuthorId }}" >{{ $blogAuthor }}</option>
                 <?php } ?>   
             </select>
             </div>
            </div>   
         </div>
          <!-- Blog Author -->
         <div  class="col-sm-3">
            <div class="select-style-1">
            <label>Tags</label>
            <div class="select-position select-sm">
             <select class="jSelectbox" id="actionDropdown" name="blogtags[]" multiple="true">
                <option value="">Select Blog</option>  
                 <?php 
                    foreach ($blogTagList as $blogTagId => $blogTag){
                     
                 ?>  
                   <option value="{{ $blogTagId }}" >{{ $blogTag }}</option>
                 <?php } ?>   
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
            <input type="text"  name="title" placeholder="Title" id="BlogTitle" required/>
            </div>   
         </div>
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Page Slug <span class="mandatory">*</span></label>
            <input type="text"  name="page_slug" placeholder="Page Slug" id="BlogPageSlug" required/>
            </div>   
         </div>
          <div class="col-sm-5">
            <div class="input-style-1">
            <label>Page Title</label>
            <input type="text"  name="page_title" placeholder="Page Title"/>
            </div>   
         </div>
         <div class="col-sm-7">
            <div class="input-style-1">
            <label>Page Url</label>
            <input type="text"  name="page_url" placeholder="Page URL" id="BlogPageUrl"  readonly/>
            </div>   
         </div>
      </div>
      <hr>
     <div class="row mt-15">
        <div class="col-sm-12">
            <div class="input-style-1">
               <label>Header Text <span class="mandatory">*</span></label>
               <!-- <input type="text"  name="header_text" placeholder="Header Text" /> -->
               <textarea name="header_text" rows="3"></textarea>
            </div>   
         </div>
     </div>
     <hr>
     <div class="row mt-15">
         <div class="col-sm-4">
            <label>Image</label>
             <div id="bannerBox"><img id="selectedImage" src="{{ asset('images/no-image.png') }}" alt="Selected Image"></div>
             <input type="file" name="image_file" id="imgupload" onchange="displayImage(this)">
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
       <div class="col-sm-3">  
        <button class="btn btn-info" type="submit">Save</button>
        <button class="btn btn-warning" type="reset">Reset</button>
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