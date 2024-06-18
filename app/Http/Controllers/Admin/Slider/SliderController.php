<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Actions\Images\DeleteImageAction;
use App\Actions\Images\StoreImageAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Slider\StoreRequest;
use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.slider.index', [
            'sliders' => Slider::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $attributes = $request->validated();
//        var_dump($image);
        $image = (new StoreImageAction())->execute($attributes['image'], 'admin/slider');
        Slider::create([
            'image' => $image,
        ]);
        return redirect()->back()->with('success','Slider Created Successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',['slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Slider $slider)
    {
        $attributes = $request->validated();
        $image = (new StoreImageAction())->execute($attributes['image'], 'admin/slider');
        (new DeleteImageAction())->execute($slider->image);

        $slider->update([
            'image'=>$image
        ]);
        return redirect()->back()->with('success','Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $image = $slider->image;
        $slider->delete();
        (new DeleteImageAction())->execute($image);
        return redirect()->back()->with('success','Slider Deleted Successfully');
    }
}
