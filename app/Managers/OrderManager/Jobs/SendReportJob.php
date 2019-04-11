<?php

    namespace App\Managers\OrderManager\Jobs;

    use App\Managers\OrderManager\Mail\OrdersReport;
    use App\Managers\OrderManager\OrderManager;
    use Illuminate\Bus\Queueable;
    use Illuminate\Http\Request;
    use Illuminate\Queue\SerializesModels;
    use Illuminate\Queue\InteractsWithQueue;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Foundation\Bus\Dispatchable;
    use Illuminate\Support\Facades\Mail;

    class SendReportJob implements ShouldQueue {
        use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

        /**
         * @var Request
         */
        protected $request;

        /**
         * Create a new job instance.
         *
         * @return void
         */
        public function __construct(Request $request) {
            $this->request = $request;
        }

        /**
         * Execute the job.
         *
         * @return void
         */
        public function handle() {
            $data = app(OrderManager::class)->getOrdersList($this->request);

            $pdf = \PDF::loadView('orders.report', $data);

            Mail::send(new OrdersReport($pdf));
        }
    }
