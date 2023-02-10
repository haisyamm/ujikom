<?php

namespace App\Exports;

use App\Models\Petugas;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPetugas implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $from_date;
    protected $to_date;

    function __construct($from_date,$to_date) {
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }
    public function query()
    {
        $data =Petugas::whereBetween('created_at',[ $this->from_date,$this->to_date])
        ->select('nama_petugas','username','id_level')
        ->orderBy('id_petugas');

        return $data;
    }

    public function headings(): array
    {
        return [
            'Nama Petugas',
            'Username',
            'Level',
        ];
    }
}
