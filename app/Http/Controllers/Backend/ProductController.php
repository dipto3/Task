<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function create(){
        $data = $this->productService->create();
        return view('backend.product.create',$data);
    }

    public function store(ProductFormRequest $request){
        $request->validated();
        $this->productService->store($request);
        toastr()->addSuccess('', 'Product Created Successfully');
        return redirect()->back();
    }

    public function index(Request $request){
        $data = $this->productService->index( $request);
        return view('backend.product.index',$data);
    }

    

    public function change_status(Request $request)
    {
        $this->productService->change_status($request);
        return response()->json([
            'code' => '200',
        ]);
    }

    public function edit($id)
    {
      $data = $this->productService->edit($id);
      return view('backend.product.edit',$data);
    }

    public function update(ProductFormRequest $request, $id)
    {
        $request->validated();
        $this->productService->update( $request, $id);
        toastr()->addSuccess('', 'Product Updated Successfully.');
        return redirect()->back();
    }

    public function remove($id){
        $this->productService->remove($id);
        toastr()->addInfo('', 'Product Removed Successfully.');
        return redirect()->back();
    }
}
