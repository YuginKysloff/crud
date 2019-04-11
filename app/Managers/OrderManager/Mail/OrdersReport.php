<?php

    namespace App\Managers\OrderManager\Mail;

    use Illuminate\Bus\Queueable;
    use Illuminate\Mail\Mailable;
    use Illuminate\Queue\SerializesModels;
    use Illuminate\Contracts\Queue\ShouldQueue;

    class OrdersReport extends Mailable {
        use Queueable, SerializesModels;

        public $pdf;

        /**
         * Create a new message instance.
         *
         * @return void
         */
        public function __construct($pdf) {
            $this->pdf = $pdf;
        }

        /**
         * Build the message.
         *
         * @return $this
         */
        public function build() {
            return $this->view('emails.orders.report')
                ->attachData($this->pdf->stream(), 'report.pdf', [
                    'mime' => 'application/pdf',
                ]);
        }
    }
