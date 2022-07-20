<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportUser implements FromCollection
{
    use Exportable;

    public function __construct(private $users = [])
    {
        
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::query()
            ->when(!empty($this->users), fn($query) => $query->whereIn('id', $this->users))
            ->get();
    }
}
