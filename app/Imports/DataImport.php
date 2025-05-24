<?php
namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Modules\Contact\Entities\Contact;

class DataImport implements ToModel
{

    public function model(array $row)
    {
        return $row;
    }

}
