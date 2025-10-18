<?php

namespace App\Http\Controllers;

use App\Models\Jobsite;
use App\Models\User;
use Illuminate\Http\Request;

class JobsiteController extends Controller
{
    public function index()
    {
        $jobsites = Jobsite::with('technician')->get();
        return view('jobsites.index', compact('jobsites'));
    }

    public function create()
    {
        $technicians = User::where('role', 'technician')->get(); // Assuming you use a role system
        return view('jobsites.create', compact('technicians'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:100',
            'location' => 'nullable|string|max:255',
            'stories' => 'required|integer|min:1',
            'roof_size' => 'required|numeric|min:1',
            'roof_type' => 'required|string|max:100',
            'roof_material' => 'required|string|max:100',
            'roof_condition' => 'required|string|max:100',
            'technician_id' => 'nullable|exists:users,id',
        ]);

        Jobsite::create($validated);

        return redirect()->route('jobsites.index')->with('success', 'Jobsite created successfully!');
    }

    public function edit(Jobsite $jobsite)
    {
        $technicians = User::where('role', 'technician')->get();
        return view('jobsites.edit', compact('jobsite', 'technicians'));
    }

    public function update(Request $request, Jobsite $jobsite)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'stories' => 'required|integer|min:1',
            'roof_size' => 'required|numeric|min:1',
            'roof_type' => 'required|string|max:100',
            'roof_material' => 'required|string|max:100',
            'roof_condition' => 'required|string|max:100',
            'technician_id' => 'nullable|exists:users,id',
        ]);

        $jobsite->update($validated);

        return redirect()->route('jobsites.index')->with('success', 'Jobsite updated successfully!');
    }

    public function destroy(Jobsite $jobsite)
    {
        $jobsite->delete();

        return redirect()->route('jobsites.index')->with('success', 'Jobsite deleted successfully.');
    }
}
