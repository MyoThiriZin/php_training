<?php

namespace App\Imports;

use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'first_name' =>$row['1'],
            'last_name' => $row['2'],
            'email' =>$row['3'],
            'phone' => $row['4'],
            'address' => $row['5'],
            'major_id' => $row['6'],
        
        ]);
    }
}
