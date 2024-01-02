<?php

namespace App\Http\Controllers\Backend;

use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Imports\ProductImport;
use App\Jobs\SendNewProductNotification;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function create()
    {
         //business logic inside app/Services/ProductService 
        $data = $this->productService->create();

        return view('backend.product.create', $data);
    }

    public function store(ProductFormRequest $request)
    {
        $request->validated();
         //business logic inside app/Services/ProductService 
        $product = $this->productService->store($request);

        SendNewProductNotification::dispatch($product);
        toastr()->addSuccess('', 'Product Created Successfully');

        return redirect()->back();
    }

    public function index(Request $request)
    {
         //business logic inside app/Services/ProductService 
        $data = $this->productService->index($request);

        return view('backend.product.index', $data);
    }

    public function change_status(Request $request)
    {
         //business logic inside app/Services/ProductService 
        $this->productService->change_status($request);

        return response()->json([
            'code' => '200',
        ]);
    }

    public function edit($id)
    {
        $data = $this->productService->edit($id);

        return view('backend.product.edit', $data);
    }

    public function update(Request $request, $id)
    {

         //business logic inside app/Services/ProductService 
        $this->productService->update($request, $id);
        toastr()->addSuccess('', 'Product Updated Successfully.');

        return redirect()->back();
    }

    public function remove($id)
    {
         //business logic inside app/Services/ProductService 
        $this->productService->remove($id);
        toastr()->addInfo('', 'Product Removed Successfully.');

        return redirect()->back();
    }

    public function export()
    {
        //for export file
        return Excel::download(new ProductExport, 'product.xlsx');

    }

    public function import(Request $request)
    {
        //bulk product upload
        Excel::import(new ProductImport, request()->file('file'), \Maatwebsite\Excel\Excel::XLSX);
        toastr()->addInfo('', 'Product Imported Successfully.');

        return redirect()->back();
    }
}
