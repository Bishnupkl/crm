<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function invoice()
    {
        $this->data('title', $this->title('Invoices'));
        $invoices = [];

        return view(
            'back.pages.accounts.invoice.invoice',
            $this->data, compact('invoices')
        );
    }

    public function payment()
    {
        $this->data('title', $this->title('Invoices'));
        $invoices = [];

        return view(
            'back.pages.accounts.payment.payment',
            $this->data, compact('invoices')
        );
    }
}
