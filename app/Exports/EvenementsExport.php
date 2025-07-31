<?php

namespace App\Exports;

use App\Models\Evenement;
use Maatwebsite\Excel\Concerns\FromCollection;

class EvenementsExport implements FromCollection
{
    public function collection()
    {
        return Evenement::all();
    }
}
