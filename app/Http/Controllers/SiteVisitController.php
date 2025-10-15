<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteVisit;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SiteVisitController extends Controller
{
    public function index(): View
    {
        $visits = SiteVisit::where('user_id', Auth::id())->get();
        return view('siteVisits.index', compact('visits'));
    }

    public function create(): View
    {
        return view('siteVisits.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'preferred_date' => 'required|date|after_or_equal:today',
            'preferred_time' => 'required',
            'address' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:500',
        ]);

        SiteVisit::create([
            'user_id' => Auth::id(),
            'preferred_date' => $request->preferred_date,
            'preferred_time' => $request->preferred_time,
            'address' => $request->address,
            'notes' => $request->notes,
        ]);

        return redirect()->route('siteVisits.index')->with('success', 'Your site visit has been scheduled successfully!');
    }

    public function update(Request $request, $id)
{
    $request->validate(['status' => 'required|string']);
    $visit = SiteVisit::findOrFail($id);

    if (Auth::user()->role !== 'SalesClerk') {
        abort(403, 'Unauthorized');
    }

    $visit->update(['status' => $request->status]);

    return redirect()->route('siteVisits.manage')->with('success', 'Visit status updated.');
}

public function assigned(): View
{
    if (Auth::user()->role !== 'Technician') {
        abort(403, 'Unauthorized');
    }

    $visits = SiteVisit::where('status', 'confirmed')
        ->orderBy('preferred_date', 'asc')
        ->get();

    return view('siteVisits.assigned', compact('visits'));

}
}