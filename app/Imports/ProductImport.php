<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'id' => $row[0],
            'name' => $row[1],
            'slug' => $row[2],
            'price' => $row[3],
            'quantity' => $row[4],
            'category_id' => $row[5],
            'status' => $row[6],

        ]);
    }
}
