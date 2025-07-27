<?php

namespace App\Http\Controllers;

use file;
use Exception;
use App\Models\Server;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Imports\ServerImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Crypt;
use App\Exports\FilteredServerExport;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = Server::with('vendor');

    // Decrypt and apply filters only if they are present
        if ($request->filled('zone')) {
            try {
                $zone = Crypt::decrypt($request->zone);
                $query->where('zone', $zone);
            } catch (Exception $e) {
                // Log error or ignore invalid decryption
            }
        }

        if ($request->filled('vendor_id')) {
            try {
                $vendor_id = Crypt::decrypt($request->vendor_id);
                $query->where('vendor_id', $vendor_id);
            } catch (\Exception $e) {
                //
            }
        }

        if ($request->filled('environment')) {
            try {
                $environment = Crypt::decrypt($request->environment);
                // Assuming environment is stored as a string in the database
                $query->where('environment', $environment);
            } catch (Exception $e) {
                // Log error or ignore invalid decryption
            }
        }

        $servers = $query->get(); // No pagination for DataTables
        $vendors = Vendor::all(); // for dropdown

        return view('servers.index', compact('servers','vendors'));
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
    public function upload()
    {
        //
        return view('servers.upload.create');
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

    public function import(Request $request)
    {
        $request->validate([
            'excel' => 'required|file|mimes:xlsx,csv,xls',
            'license_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'invoice_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        // Store license and invoice files
        $licensePath = $request->file('license_file')?->store('uploads/licenses', 'public');
        $invoicePath = $request->file('invoice_file')?->store('uploads/invoices', 'public');

        // Handle Excel import
        Excel::import(new ServerImport($licensePath, $invoicePath), $request->file('excel'));
        //  dd('Import complete');

        return redirect()->route('server.index')->with('success', 'Servers imported successfully.');
    }

        public function export(Request $request)
        {
            $zone = $request->zone ;
            $vendor_id = $request->vendor_id;
            $environment = $request->environment;

            // dd($zone, $vendor_id, $environment);

            return Excel::download(new FilteredServerExport($zone, $vendor_id, $environment), 'servers_export.xlsx');
        }
}
