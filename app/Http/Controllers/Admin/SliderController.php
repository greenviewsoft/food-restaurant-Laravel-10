<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\SliderDataTable;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use PhpParser\Node\Stmt\TryCatch;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( )
    {

        $slider = Slider::latest()->get();

        return view('admin.slider.index',compact('slider'));
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
    public function store(SliderRequest $request)
    {
        // // Validate the request data
        // $request->validate([
        //     'title' => 'required|string',
        //     'sub_title' => 'required|string',
        //     'short_description' => 'required|string',
        //     'button_link' => 'required|url',
        //     'offer' => 'required|numeric',
        //     'status' => 'required|in:0,1',
        //     'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming max size is 2MB
        // ]);

        // Create a new slider instance
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->short_description = $request->short_description;
        $slider->button_link = $request->button_link;
        $slider->offer = $request->offer;
        $slider->status = $request->status;

        // Save the slider
        $slider->save();

        // Handle the uploaded images
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $uploadedImage) {
                // Delete old image if exists
                if ($slider->image) {
                    @unlink(public_path('uploads/slider_images/' . $slider->image));
                }

                // Generate new image name
                $imageName = date('YmdHi') . '_' . $uploadedImage->getClientOriginalName();

                // Move the uploaded image to storage
                $uploadedImage->move(public_path('uploads/slider_images'), $imageName);

                // Save the image path to the slider
                $slider->image = $imageName;
                $slider->save();
            }
        }

        // Redirect back or to any desired route
        toastr('Slider added successfully', 'success');
        return redirect()->route('admin.slider.index');
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
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the slider by ID
        $slider = Slider::findOrFail($id);

        // Update slider fields
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->short_description = $request->short_description;
        $slider->button_link = $request->button_link;
        $slider->offer = $request->offer;
        $slider->status = $request->status;

        // Handle uploaded images
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $uploadedImage) {
                // Delete old image if exists
                if ($slider->image) {
                    @unlink(public_path('uploads/slider_images/' . $slider->image));
                }

                // Generate new image name
                $imageName = date('YmdHi') . '_' . $uploadedImage->getClientOriginalName();

                // Move the uploaded image to storage
                $uploadedImage->move(public_path('uploads/slider_images'), $imageName);

                // Save the image path to the slider
                $slider->image = $imageName;
            }
        }

        // Save the updated slider
        $slider->save();

        // Redirect back or to any desired route
        toastr('Slider updated successfully', 'success');
        return redirect()->route('admin.slider.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $slider = Slider::findOrFail($id);
            $slider->delete();

            return response(['status' => 'success', 'message' => 'Slider deleted successfully']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
