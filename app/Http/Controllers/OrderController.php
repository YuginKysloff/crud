<?php

    namespace App\Http\Controllers;

    use App\Managers\OrderManager\OrderManager;
    use App\Order;
    use Illuminate\Http\Request;

    class OrderController extends Controller {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(Request $request) {
            $result = app(OrderManager::class)->getList($request);

            return view('orders', $result);
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Order $order
         * @return \Illuminate\Http\Response
         */
        public function edit(Order $order) {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  \App\Order $order
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Order $order) {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Order $order
         * @return \Illuminate\Http\Response
         */
        public function destroy(Order $order) {
            //
        }
    }
