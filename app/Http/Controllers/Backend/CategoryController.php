<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        //business logic app/Services/CategoryService 
        $data = $this->categoryService->index();

        return view('backend.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {

        $request->validated();
        //business logic inside app/Services/CategoryService
        $this->categoryService->store($request);
        toastr()->addSuccess('', 'Category Created Successfully.');

        return redirect()->back();
    }

    public function change_status(Request $request)
    {
         //business logic inside app/Services/CategoryService
        $this->categoryService->change_status($request);

        return response()->json([
            'code' => '200',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //business logic app/Services/CategoryService 
        $data = $this->categoryService->edit($id);

        return view('backend.category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryFormRequest $request, $id)
    {
        $request->validated();
         //business logic app/Services/CategoryService 
        $this->categoryService->update($request, $id);
        toastr()->addSuccess('', 'Category Updated Successfully.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //business logic app/Services/CategoryService 
        $this->categoryService->remove($id);
        toastr()->addInfo('', 'Category Removed Successfully.');

        return redirect()->back();
    }
}
