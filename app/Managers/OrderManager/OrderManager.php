<?php
    /**
     * Created by PhpStorm.
     * User: TPL
     * Date: 10.04.2019
     * Time: 15:28
     */

    namespace App\Managers\OrderManager;

    use App\Client;
    use App\Managers\OrderManager\Dto\RequestDto;
    use App\Managers\OrderManager\Repositories\OrderRepository;
    use App\Product;
    use Illuminate\Http\Request;

    class OrderManager {

        /**
         * Prepare data for index page
         *
         * @param Request $request
         * @return array
         */
        public function getOrdersList(Request $request): array {
            $result['orders'] = app(OrderRepository::class)->getFilteredList(new RequestDto($request)) ?? collect();
            $result['params'] = $request->except('page');
            $result['chartData'] = $this->setChartData($result['orders']);
            $result['queryData'] = http_build_query($request->all());

            return $result;
        }

        /**
         * Get catalogs for edit page
         *
         * @return array
         */
        public function getCatalogs() {
            $result['clients'] = Client::all();
            $result['products'] = Product::all();

            return $result;
        }

        /**
         * Set data for building a orders chart
         *
         * @param $orders
         * @return string
         */
        private function setChartData($orders) {
            $chartData = config('chart.data');

            $clients = $orders->groupBy('client');

            $counter = 0;

            foreach ($clients as $client => $orders) {
                $chartData['series'][$counter]['name'] = $client;
                foreach ($orders as $key => $order) {
                    $chartData['series'][$counter]['data'][] = [$order->date->timestamp * 1000, $order->total];
                }
                $counter++;
            }

            return json_encode($chartData);
        }
    }
