<?php

namespace App\Http\Controllers;
use App\Models\Species;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import the DB facade

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
    // Retrieve animals data along with their associated species
    $animals = Animal::with('species') // Eager loading the 'species' relationship to avoid N+1 query issue
                    ->orderByDesc('created_at') // Order animals by their creation date in descending order
                    ->simplePaginate(10); // Paginate the results with 10 animals per page

    // Pass the animals data to the 'animals.patient' view
    return view('animals.patient', compact('animals'));
}

    public function showDashboard(){
        // Retrieve animals data along with their associated species

        // Pass the animals data to the 'animals.index' view
        return view('animals.index');
    }

    public function create(){

        $species = Species::pluck('name'); // Assuming 'name' is the column containing species names

        return view('animals.create', compact('species'))->with('title', 'Add New');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

    // Validate the incoming request data
    $validatedData = $request->validate([
        "species" => 'required',
        "name" => 'required|min:4',
        "weight" => 'required',
        "age" => 'required',
        "sex" => 'required',
        "health_history" => 'required',
        "diagnosis" => 'required',
        "owner_name" => 'required',
        "owner_number" => 'required',
    ]);

    // Fetch the species ID based on the selected species name
    $speciesName = $request->input('species');

    $speciesId = Species::where('name', $speciesName)->value('id');
    
    Animal::create([
        'species_id' => $speciesId,
        'name' => $request->input('name'),
        'weight' => $request->input('weight'),
        'age' => $request->input('age'),
        'sex' => $request->input('sex'),
        'health_history' => $request->input('health_history'),
        'diagnosis' => $request->input('diagnosis'),
        'owner_name' => $request->input('owner_name'),
        'owner_number' => $request->input('owner_number'),
    ]);

    // Redirect back with a success message
    return redirect('/patients')->with('message', 'New Animal was added successfully');
}



    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $speciesList = Species::pluck('name');
        $animal = Animal::with('species')->findOrFail($id);

        return view('animals.edit', ['animal' => $animal, 'speciesList' => $speciesList]);
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
{
    $validated = $request->validate([
        "species"        => 'required',
        "name"           => 'required|min:4',
        "weight"         => 'required',
        "age"            => 'required',
        "sex"            => 'required',
        "health_history" => 'required',
        "diagnosis"      => 'required',
        "owner_name"     => 'required',
        "owner_number"   => 'required'
    ]);

    $speciesId = Species::where('name', $request->species)->value('id');

    // Remove 'species' from the validated data
    unset($validated['species']);

    // Add 'species_id' to the validated data
    $validated['species_id'] = $speciesId;

    // Update the animal with the validated data
    $animal->update($validated);

    return back()->with('message', 'Data was successfully updated');
}
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal){
        $animal->delete();

        return redirect('/')->with('message', 'Data was successfully deleted');
    }

    public function search($name){
        return Animal::where('name', 'like', '%'.$name.'%')->get();
    }
}
