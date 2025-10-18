<?php

namespace App\Http\Controllers;

use App\Models\OnGridPackage;
use App\Models\InventoryItem;
use Illuminate\Http\Request;

class OnGridPackageController extends Controller
{
    public function index()
    {
        $packages = OnGridPackage::with([
            'solarPanel', 'inverter', 'pvProductionMeter', 'mainPanel', 'electricityMeter'
        ])->get();

        return view('packages.index', compact('packages'));
    }

    public function show(OnGridPackage $package)
    {
        return view('packages.show', compact('package'));
    }

    public function create()
    {
        $solarPanels = InventoryItem::whereHas('type', fn($q) => $q->where('name', 'Solar Panel'))->get();
        $inverters = InventoryItem::whereHas('type', fn($q) => $q->where('name', 'Inverter'))->get();
        $pvProductionMeters = InventoryItem::whereHas('type', fn($q) => $q->where('name', 'PV Production Meter'))->get();
        $mainPanels = InventoryItem::whereHas('type', fn($q) => $q->where('name', 'Main Panel'))->get();
        $electricityMeters = InventoryItem::whereHas('type', fn($q) => $q->where('name', 'Electricity Meter'))->get();

        return view('packages.create', compact(
            'solarPanels', 'inverters', 'pvProductionMeters', 'mainPanels', 'electricityMeters'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'solar_panel_id' => 'required|exists:inventory_items,id',
            'inverter_id' => 'required|exists:inventory_items,id',
            'pv_production_meter_id' => 'required|exists:inventory_items,id',
            'main_panel_id' => 'required|exists:inventory_items,id',
            'electricity_meter_id' => 'required|exists:inventory_items,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        OnGridPackage::create($validated);

        return redirect()->route('packages.manage')->with('success', 'Package created successfully!');
    }

    public function edit(OnGridPackage $package)
    {
        $solarPanels = InventoryItem::whereHas('type', fn($q) => $q->where('name', 'Solar Panel'))->get();
        $inverters = InventoryItem::whereHas('type', fn($q) => $q->where('name', 'Inverter'))->get();
        $pvProductionMeters = InventoryItem::whereHas('type', fn($q) => $q->where('name', 'PV Production Meter'))->get();
        $mainPanels = InventoryItem::whereHas('type', fn($q) => $q->where('name', 'Main Panel'))->get();
        $electricityMeters = InventoryItem::whereHas('type', fn($q) => $q->where('name', 'Electricity Meter'))->get();

        return view('packages.edit', compact(
            'package', 'solarPanels', 'inverters', 'pvProductionMeters', 'mainPanels', 'electricityMeters'
        ));
    }

    public function update(Request $request, OnGridPackage $package)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'solar_panel_id' => 'required|exists:inventory_items,id',
            'inverter_id' => 'required|exists:inventory_items,id',
            'pv_production_meter_id' => 'required|exists:inventory_items,id',
            'main_panel_id' => 'required|exists:inventory_items,id',
            'electricity_meter_id' => 'required|exists:inventory_items,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $package->update($validated);

        return redirect()->route('packages.manage')->with('success', 'Package updated successfully!');
    }

    public function destroy(OnGridPackage $package)
    {
        $package->delete();

        return redirect()->route('packages.manage')->with('success', 'Package deleted successfully.');
    }

    public function manage()
    {
        $packages = OnGridPackage::with([
            'solarPanel', 'inverter', 'pvProductionMeter', 'mainPanel', 'electricityMeter'
        ])->get();

        return view('packages.manage', compact('packages'));
    }
}
