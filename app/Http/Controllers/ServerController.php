<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Models\Vendor;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $servers = Server::with('vendor')->latest()->paginate(10);
        return view('servers.index', compact('servers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $vendors = Vendor::all();
        return view('servers.create', compact('vendors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'hostname' => 'required|string',
            'ip_address' => 'required|ip',
            'zone' => 'required',
            'vendor_id' => 'required|exists:vendors,id',
            'os' => 'nullable|string',
            'location' => 'required',
            'environment' => 'required'
        ]);

        Server::create($request->all());
        return redirect()->route('server.index')->with('success', 'Server added successfully.');
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
    public function edit(Server $server)
    {
        //
        $vendors = Vendor::all();
        return view('servers.edit', compact('server', 'vendors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Server $server)
    {
        //
        $request->validate([
            'hostname' => 'required|string',
            'ip_address' => 'required|ip',
            'zone' => 'required',
            'vendor_id' => 'required|exists:vendors,id',
            'os' => 'nullable|string',
            'location' => 'required',
            'environment' => 'required'
        ]);

        $server->update($request->all());
        return redirect()->route('server.index')->with('success', 'Server updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Server $server)
    {
        //
        $server->delete();
        return redirect()->route('server.index')->with('success', 'Server deleted successfully.');
    }
}
