<?php

namespace App\Repositories;

use App\Models\Invoice;
use App\Repositories\Interfaces\InvoiceRepositoryInterface;

class InvoiceRepository implements InvoiceRepositoryInterface
{

    public function create(array $data): Invoice
    {
        return Invoice::create($data);
    }
}
