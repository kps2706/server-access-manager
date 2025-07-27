<?php

namespace App\Exports;

use App\Models\Server;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FilteredServerExport implements FromView
{
    protected $zone;
    protected $vendor_id;
    protected $environment;

    public function __construct($zone = null, $vendor_id = null, $environment = null)
    {
        $this->zone = $zone;
        $this->vendor_id = $vendor_id;
        $this->environment = $environment;
    }

    public function view(): View
    {
        $query = Server::with('vendor');

        if ($this->zone) {
            $query->where('zone', $this->zone);
        }

        if ($this->vendor_id) {
            $query->where('vendor_id', $this->vendor_id);
        }

        if ($this->environment) {
            $query->where('environment', $this->environment);
        }

        $servers = $query->get();

        return view('servers.export-view', [
            'servers' => $servers
        ]);
    }
}
