<?php

namespace App\Exports;

use App\student;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::select('nik','name','address')->get();
    }
    public function headings(): array
    {
        return [
            'NIK',
            'Name',
            'Address'
        ];
    }
}
