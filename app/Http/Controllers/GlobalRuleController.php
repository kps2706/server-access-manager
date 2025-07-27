<?php

namespace App\Http\Controllers;

use App\Models\GlobalRule;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGlobalRuleRequest;

class GlobalRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rules = GlobalRule::latest()->paginate(10);
        return view('globalRules.index', compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('globalRules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGlobalRuleRequest $request)
    {
        //
        GlobalRule::create($request->validated());
        return redirect()->route('global-rules.index')->with('success', 'Rule added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(GlobalRule $globalRule)
    {
        //
        return view('globalRules.show', compact('globalRule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
