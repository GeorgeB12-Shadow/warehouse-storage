<?php

namespace App\Http\Controllers;

use App\Models\StorageLocation;
use App\Models\Project;
use Illuminate\Http\Request;

class StorageLocationController extends Controller
{
    public function index()
    {
        $locations = StorageLocation::with('project')
            ->latest()
            ->get();

        return view('storage_locations.index', compact('locations'));
    }

    public function create()
    {
        $projects = Project::orderBy('name')->get();

        return view('storage_locations.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'warehouse' => 'required|string|max:100',
            'zone' => 'nullable|string|max:50',
            'rack' => 'nullable|string|max:50',
            'location_code' => 'required|string|max:100',
            'capacity' => 'nullable|numeric|min:0',
            'occupied' => 'nullable|numeric|min:0',
            'unit' => 'required|string|max:50',
            'status' => 'required|string|max:30',
            'notes' => 'nullable|string',
        ]);

        StorageLocation::create($validated);

        return redirect()
            ->route('storage-locations.index')
            ->with('success', 'Storage location created successfully.');
    }
}
