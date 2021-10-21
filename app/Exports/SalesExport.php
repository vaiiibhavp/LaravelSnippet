<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalesExport implements FromArray, WithHeadings
{
    protected $sales;

    public function headings(): array
    {
        return [
            'Month',
            'Date',
            'Amount',
            'Order No',
            'Commission',
        ];
    }

    public function __construct(array $sales)
    {
        $this->sales = $sales;
    }

    public function array(): array
    {
        return $this->sales;
    }
}
