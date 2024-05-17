@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')


     
    <!--Add new section start here-->
<div class="card-style mt-20">
            <div class="table-wrapper table-responsive mt-10">
                <table class="table striped-table">
                    <tbody>
                    <tr>
                        <th class='col-md-2'><h6>Name</h6></th>
                        <td class=''>
                            <p>{{ $producttype->name }}</p>
                        </td>
                    </tr> 
                    <tr>
                        <th class='col-md-2'><h6>Category</h6></th>
                        <td class=''>
                            <p>{{ $producttype->category->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>SubCategory</h6></th>
                        <td class=''>
                            <p>{{ $producttype->subcategory->name }}</p>
                        </td>
                    </tr>
                    <tr>
                       <th><h6>Page Title</h6></th>
                       <td>
                           <p>{{ $producttype->page_title }}</p>
                       </td>
                    </tr>
                    <tr>
                       <th><h6>Page Slug</h6></th>
                       <td>
                           <p>{{ $producttype->page_slug }}</p>
                       </td>
                    </tr>
                    <tr>
                       <th><h6>Canonical Url</h6></th>
                       <td>
                           <p>{{ $producttype->canonical_url }}</p>
                       </td>
                    </tr>
                    <tr>
                      <th><h6>Image</h6></th>
                       <td>
                          <p>
                             
                            @php
                                $firstImage = $producttype->image_file;
                                $id = $producttype->id;
                                $imagePath = $firstImage ? asset("images/producttype/image_file/{$id}/{$firstImage}") : null;
                            @endphp

                            @if(!empty($imagePath))
                                <img src="{{ $imagePath }}" height="30px">
                            @endif
                             
                           </p>
                       </td>
                    </tr>
                    <tr>
                    <th><h6>Status</h6></th>    
                    <td>
                      @php if($producttype->active == '1'){
                        $class = 'activelabel';
                        $data = 'Active';
                        }
                        else{
                        $class = 'inactivelabel';
                        $data = 'Inactive';
                        } @endphp
                        <div class="{{ $class; }}">{{ $data }}</div>
                    </td>
                    </tr> 
                    <tr>
                    <th><h6>Display Homepage</h6></th>    
                    <td>
                      @php if($producttype->display_home_page == '1'){
                        $class = 'activelabel';
                        $data = 'Active';
                        }
                        else{
                        $class = 'inactivelabel';
                        $data = 'Inactive';
                        } @endphp
                        <div class="{{ $class; }}">{{ $data }}</div>
                    </td>
                    </tr>
                    <tr>
                       <th><h6>Meta Title</h6></th>
                       <td>
                           <p>{{ $producttype->meta_title }}</p>
                       </td>
                    </tr> 
                    <tr>
                       <th><h6>Meta Description</h6></th>
                       <td>
                           <p>{{ $producttype->meta_description }}</p>
                       </td>
                    </tr> 
                    <tr>
                       <th><h6>Created</h6></th>
                       <td>
                           <p>{{ $producttype->created_at }}</p>
                       </td>
                    </tr>  
                    <tr>
                       <th><h6>Modified</h6></th>
                       <td>
                           <p>{{ $producttype->updated_at }}</p>
                       </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    

</div>


    <!--Add new section end here-->
	</div>
</section>	
@endsection

