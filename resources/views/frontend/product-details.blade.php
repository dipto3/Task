@extends('frontend.master')
@section('frontend.content')
<div class="page-content">
    <!--start product details-->
    <form action="{{ route('purchase.product',$product->id) }}" method="post"enctype="multipart/form-data">
       @csrf 
    <section class="py-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-xl-7">
                    <div class="product-images">
                        <div class="product-zoom-images">
                                <div class="row row-cols-2 g-3">
                                    <div class="col">
                                        <div class="img-thumb-container overflow-hidden position-relative"
                                            data-fancybox="gallery" data-src="">
                                            <img src="" class="img-fluid"
                                                alt="">
                                        </div>
                                    </div>
                                </div><!--end row-->
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-5">
                    <div class="product-info">
                        <h4 class="product-title fw-bold mb-1">{{ $product->name }}</h4>
                        <p class="mb-0">{{ $product->category->name }}</p>
                        <hr>
                        <div class="product-price d-flex align-items-center gap-3">
                            <div class="h4 fw-bold"> &#2547;{{ $product->price }}</div>
                        </div>
                        <div class="size-chart mt-4">
                            <h6 class="fw-bold mb-3">Select Quantity</h6>
                            <input class="form-control" name="quantity" type="number" min="1" value="0">
                        </div>
                    </div>

                    <div class="cart-buttons mt-3">
                        <div class="buttons d-flex flex-column flex-lg-row gap-3 mt-4">
                                <button class="btn btn-lg btn-outline-dark btn-ecomm px-5 py-3" type="submit"><i
                                        class="bi bi-suit-heart me-2"></i>Purchase</button>
                        </div>
                    </div>
                    <hr class="my-3">
                    <div class="product-info">
                        <h6 class="fw-bold mb-3">{{ $product->description }}</h6>
                        {{-- {{ $products->description }} --}}
                    </div>

                </div>
            </div>
        </div><!--end row-->
</div>
</section>
</form>
</div>
@endsection