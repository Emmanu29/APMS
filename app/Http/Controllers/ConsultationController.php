<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ConsultationController extends Controller
{
    //
    public function showReview(string $id){
        // Retrieve the animal details along with its species
        $animal = Animal::with('species')->findOrFail($id);
    
        // Retrieve the consultation details associated with the provided animal ID
        $consultation = Consultation::where('animal_id', $id)->select('name', 'diagnosis', 'recommendation')->first();
    
        // If no consultation is found, create a new consultation with the provided animal ID
        if (!$consultation) {
            $consultation = new Consultation(['animal_id' => $id]); // Create a new consultation instance with the provided ID
        }
    
        // Return the view with the animal and consultation details
        return view('animals.consultation', compact('animal', 'consultation'));
    }

    //Store Second Opinion
    public function storeExpertReview(Request $request){
        $validatedData = $request->validate([
            "name"           => 'required',
            "diagnosis"      => 'nullable',
            "recommendation" => 'nullable',
            "animal_id"      => 'required|exists:animals,id',
        ]);
    
        $existingConsultation = Consultation::where('animal_id', $validatedData['animal_id'])->first();
    
        if ($existingConsultation) {
            $this->updateConsultation($existingConsultation, $validatedData);
        } else {
            $this->createConsultation($validatedData);
        }
    
        return redirect('/patients')->with('message', 'Consultation successfully concluded');
    }
    
    private function updateConsultation($consultation, $validatedData) {
        $consultation->update([
            'name'           => $validatedData['name'],
            'diagnosis'      => $validatedData['diagnosis'],
            'recommendation' => $validatedData['recommendation'],
        ]);
    }
    
    private function createConsultation($validatedData) {
        Consultation::create([
            'animal_id'      => $validatedData['animal_id'],
            'name'           => $validatedData['name'],
            'diagnosis'      => $validatedData['diagnosis'],
            'recommendation' => $validatedData['recommendation'],
        ]);
    }

}
