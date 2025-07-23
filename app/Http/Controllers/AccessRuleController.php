<?php

namespace App\Http\Controllers;

use App\Models\AccessRule;
use Illuminate\Http\Request;

class AccessRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $accessRules = AccessRule::all();
        return view('access-rules.index', compact('accessRules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('access-rules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'source_ip' => 'required|ip',
            'destination_ip' => 'required|ip',
            'port' => 'required|integer',
            'protocol' => 'required|string',
            'is_allowed' => 'required|boolean',
            'remarks' => 'nullable|string',
        ]);

        AccessRule::create($validated);
        return redirect()->route('access-rules.index')->with('success', 'Access Rule created successfully.');
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
    public function edit(AccessRule  $accessRule)
    {
        //
        return view('access-rules.edit', compact('accessRule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccessRule $accessRule)
    {
        //
        $validated = $request->validate([
            'source_ip' => 'required|ip',
            'destination_ip' => 'required|ip',
            'port' => 'required|integer',
            'protocol' => 'required|string',
            'is_allowed' => 'required|boolean',
            'remarks' => 'nullable|string',
        ]);

        $accessRule->update($validated);
        return redirect()->route('access-rules.index')->with('success', 'Access Rule updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccessRule $accessRule)
    {
        //
        $accessRule->delete();
        return redirect()->route('access-rules.index')->with('success', 'Access Rule deleted successfully.');
    }
}
