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
                            <p>{{ $product->name }}</p>
                        </td>
                    </tr> 
                    <tr>
                        <th class='col-md-2'><h6>Product Code</h6></th>
                        <td class=''>
                            <p>{{ $product->product_code }}</p>
                        </td>
                    </tr> 
                    <tr>
                        <th class='col-md-2'><h6>Category</h6></th>
                        <td class=''>
                            <p>{{ $product->category->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>SubCategory</h6></th>
                        <td class=''>
                            <p>{{ $product->subcategory->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Product Type</h6></th>
                        <td class=''>
                            <p>{{ $product->producttype->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Brand</h6></th>
                        <td class=''>
                            <p>{{ $product->brand->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Price</h6></th>
                        <td class=''>
                            <p>{{ $product->price }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Tax Value</h6></th>
                        <td class=''>
                            <p>{{ $product->tax_value }}</p>
                        </td>
                    </tr>
                    <tr>
                       <th><h6>Page Title</h6></th>
                       <td>
                           <p>{{ $product->page_title }}</p>
                       </td>
                    </tr>
                    <tr>
                       <th><h6>Page Slug</h6></th>
                       <td>
                           <p>{{ $product->page_slug }}</p>
                       </td>
                    </tr>
                    <tr>
                       <th><h6>Canonical Url</h6></th>
                       <td>
                           <p>{{ $product->canonical_url }}</p>
                       </td>
                    </tr>
                    <tr>
                      <th><h6>Image</h6></th>
                       <td>
                          <p>
                             
                            @php
                                $firstImage = $product->image_file;
                                $id = $product->id;
                                $imagePath = $firstImage ? asset("images/product/image_file/{$id}/{$firstImage}") : null;
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
                      @php if($product->active == '1'){
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
                      @php if($product->display_home_page == '1'){
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
                    <th><h6>In Stock</h6></th>    
                    <td>
                      @php if($product->in_stock == '1'){
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
                    <th><h6>Is Offer Applicable</h6></th>    
                    <td>
                      @php if($product->is_offer_applicable == '1'){
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
                    <th><h6>Apply Tax</h6></th>    
                    <td>
                      @php if($product->apply_tax == '1'){
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
                       <th><h6>Description</h6></th>
                       <td>
                           <p>{{ $product->description }}</p>
                       </td>
                    </tr> 
                    <tr>
                       <th><h6>Specification</h6></th>
                       <td>
                           <p>{{ $product->spefication }}</p>
                       </td>
                    </tr> 
                    <tr>
                       <th><h6>Meta Title</h6></th>
                       <td>
                           <p>{{ $product->meta_title }}</p>
                       </td>
                    </tr> 
                    <tr>
                       <th><h6>Meta Description</h6></th>
                       <td>
                           <p>{{ $product->meta_description }}</p>
                       </td>
                    </tr> 
                    <tr>
                       <th><h6>Created</h6></th>
                       <td>
                           <p>{{ $product->created_at }}</p>
                       </td>
                    </tr>  
                    <tr>
                       <th><h6>Modified</h6></th>
                       <td>
                           <p>{{ $product->updated_at }}</p>
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

