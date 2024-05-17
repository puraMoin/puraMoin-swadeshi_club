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
                            <p>{{ $category->name }}</p>
                        </td>
                    </tr> 
                    <tr>
                        <th class='col-md-2'><h6>Alias</h6></th>
                        <td class=''>
                            <p>{{ $category->alias }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Title</h6></th>
                        <td class=''>
                            <p>{{ $category->title }}</p>
                        </td>
                    </tr> 
                    <tr>
                       <th><h6>Page Title</h6></th>
                       <td>
                           <p>{{ $category->page_title }}</p>
                       </td>
                    </tr>
                    <tr>
                       <th><h6>Page Slug</h6></th>
                       <td>
                           <p>{{ $category->page_slug }}</p>
                       </td>
                    </tr>
                    <tr>
                       <th><h6>Page Url</h6></th>
                       <td>
                           <p>{{ $category->page_url }}</p>
                       </td>
                    </tr>
                    <tr>
                      <th><h6>Small Image</h6></th>
                       <td>
                          <p>
                             
                            @php
                                $firstImage = $category->smal_image;
                                $id = $category->id;
                                $imagePath = $firstImage ? asset("images/category/smal_image/{$id}/{$firstImage}") : null;
                            @endphp

                            @if(!empty($imagePath))
                                <img src="{{ $imagePath }}" height="30px">
                            @endif
                             
                           </p>
                       </td>
                    </tr>
                    <tr>
                      <th><h6>Big Image</h6></th>
                       <td>
                          <p>
                             
                            @php
                                $firstImage = $category->big_image;
                                $id = $category->id;
                                $imagePath = $firstImage ? asset("images/category/big_image/{$id}/{$firstImage}") : null;
                            @endphp

                            @if(!empty($imagePath))
                                <img src="{{ $imagePath }}" height="30px">
                            @endif
                             
                           </p>
                       </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Description</h6></th>
                        <td class=''>
                            <p>{{ $category->description }}</p>
                        </td>
                    </tr> 
                    <tr>
                    <th><h6>Status</h6></th>    
                    <td>
                      @php if($category->active == '1'){
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
                      @php if($category->display_home_page == '1'){
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
                           <p>{{ $category->meta_title }}</p>
                       </td>
                    </tr> 
                    <tr>
                       <th><h6>Meta Description</h6></th>
                       <td>
                           <p>{{ $category->meta_description }}</p>
                       </td>
                    </tr> 
                    <tr>
                       <th><h6>Created</h6></th>
                       <td>
                           <p>{{ $category->created_at }}</p>
                       </td>
                    </tr>  
                    <tr>
                       <th><h6>Modified</h6></th>
                       <td>
                           <p>{{ $category->updated_at }}</p>
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

