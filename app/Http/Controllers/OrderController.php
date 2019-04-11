<?php

    namespace App\Http\Controllers;

    use App\Managers\OrderManager\Jobs\SendReportJob;
    use App\Managers\OrderManager\OrderManager;
    use App\Managers\OrderManager\Requests\OrderUpdateRequest;
    use App\Order;
    use Illuminate\Http\Request;

    class OrderController extends Controller {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(Request $request) {
            $result = app(OrderManager::class)->getOrdersList($request);

            return view('orders.index', $result);
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Order $order
         * @return \Illuminate\Http\Response
         */
        public function edit(Order $order) {
            $result = app(OrderManager::class)->getCatalogs();
            $result['order'] = $order;

            return view('orders.edit', $result);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  OrderUpdateRequest $request
         * @param  \App\Order $order
         * @return \Illuminate\Http\Response
         */
        public function update(OrderUpdateRequest $request, Order $order) {
            $order->fill($request->all());
            $order->save();

            return redirect()->route('orders.index');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Order $order
         * @return \Illuminate\Http\Response
         */
        public function destroy(Order $order) {
            $order->delete();

            return redirect()->route('orders.index');
        }

        /**
         * Generate and email orders report
         *
         * @param Request $request
         * @return \Illuminate\Http\RedirectResponse
         */
        public function report(Request $request){
            SendReportJob::dispatchNow($request);

            return redirect()->back();
        }
    }
