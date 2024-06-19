<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\StoreRequest;
use App\Http\Requests\Admin\Brand\UpdateRequest;
use App\Models\Brand;
use App\Service\BrandService;

class BrandController extends Controller
{
    protected BrandService $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }


    public function index()
    {
        $brands = $this->brandService->getAll();
        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(StoreRequest $request)
    {
        $this->brandService->create($request->validated());
        return redirect()->back()->with('success','Brand Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Brand $brand)
    {
        $this->brandService->update($request->validated(), $brand);
        return redirect()->back()->with('success', 'Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $this->brandService->delete($brand);
        return redirect()->back()->with('success', 'Brand Deleted Successfully');
    }
}
