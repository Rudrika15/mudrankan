<?php

namespace App\Mail;

use App\Models\PurchasedVouchar;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VoucherPurchased extends Mailable
{
    use Queueable, SerializesModels;
    // public $purchasedVouchar;
    public $vouchar;
    /**
     * Create a new message instance.
     */
    public function __construct($vouchar)
    {
        $this->vouchar = $vouchar;
        // $this->qrCodePath = $qrCodePath;
    }

    public function build()
    {
        return $this->view('email.voucher_purchased')
            ->with([
                'voucher_purchased' => $this->vouchar,
                'voucher_name' => $this->vouchar->vouchar_name,
            ])
            ->subject('Your Voucher has been Purchased');
    }
}