<?php

namespace App\Http\Controllers;

use App\Models\RecipesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;
use Illuminate\Support\Facades\File;



class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = RecipesModel::latest()->paginate(5);
        return view('index',compact('recipes'))->with(request()->input('page'));

    }
    public function displaybyuserid()
{
    // Fetch recipes associated with the authenticated user's ID
    $recipes = RecipesModel::where('user_id', auth()->id())->latest()->paginate(5);
    return view('Dashboard.dashboard', compact('recipes'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();

        return view('Dashboard.create', compact('categories'));
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'ingredients' => 'required',
            'category_id' => 'nullable',
        ]);
    
        $data['user_id'] = Auth::id();
        if ($request->hasFile('image')) {
            $uploadedImage = $request->file('image');
            
            // Generate a unique filename for the image
            $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
        
            // Store the image in the storage directory
            $imagePath = $uploadedImage->storeAs('public/images', $imageName);
        
            // Move the image from storage to public/images
            File::move(storage_path('app/' . $imagePath), public_path('images/' . $imageName));
        
            // Update the image path to store the correct URL in the database
            $data['image'] = 'images/' . $imageName;
        }
    
        $newrecipes = RecipesModel::create($data);
    
        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(RecipesModel $RecipesModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RecipesModel $RecipesModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RecipesModel $RecipesModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecipesModel $RecipesModel)
    {
        //
    }
}
