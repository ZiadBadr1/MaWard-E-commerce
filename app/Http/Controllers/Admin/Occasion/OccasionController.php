<?php

namespace App\Http\Controllers\Admin\Occasion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Occasion\StoreRequest;
use App\Http\Requests\Admin\Occasion\UpdateRequest;
use App\Models\Occasion;
use App\Service\OccasionService;
use Illuminate\Http\Request;

class OccasionController extends Controller
{
    protected OccasionService $occasionService;

    public function __construct(OccasionService $occasionService)
    {
        $this->occasionService = $occasionService;
    }

    public function index()
    {
        $occasions = $this->occasionService->getAll();
        return view('admin.occasion.index', compact('occasions'));
    }

    public function create()
    {
        return view('admin.occasion.create');
    }

    public function store(StoreRequest $request)
    {
        $this->occasionService->create($request->validated());
        return redirect()->back()->with('success','Occasion Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Occasion $occasion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Occasion $occasion)
    {
        return view('admin.occasion.edit', compact('occasion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Occasion $occasion)
    {
        $this->occasionService->update($request->validated(), $occasion);
        return redirect()->back()->with('success', 'Occasion Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Occasion $occasion)
    {
        $this->occasionService->delete($occasion);
        return redirect()->back()->with('success', 'Occasion Deleted Successfully');
    }
}
