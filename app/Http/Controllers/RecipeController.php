<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::latest()->get();
        return view('recipes.index', compact('recipes'));
    }

    public function browse()
    {
        $recipes = Recipe::latest()->paginate(12);

        return view('recipes.browse', compact('recipes'));
    }   

    public function adminIndex()
    {
        $recipes = Recipe::latest()->paginate(20);

        return view('admin.recipes', compact('recipes'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'ingredients' => 'required',
            'steps' => 'required',
            'image' => 'required|image',
        ]);

        // Upload image
        $path = $request->file('image')->store('recipes', 'public');

        // Create recipe
        $recipe = $request->user()->recipes()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'ingredients' => $data['ingredients'],
            'steps' => $data['steps'],
            'image_path' => $path,
        ]);

        return redirect('/')->with('success', 'Recipe created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        $this->authorize('update', $recipe);

        return view('recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        $this->authorize('update', $recipe);

        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'ingredients' => 'required',
            'steps' => 'required',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('recipes', 'public');
            $data['image_path'] = $path;
        }

        $recipe->update($data);

        return redirect()->route('recipes.show', $recipe)
            ->with('success', 'Recipe updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        $this->authorize('delete', $recipe);

        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Recipe deleted.');
    }
}
