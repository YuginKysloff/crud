<?php
    /**
     * Created by PhpStorm.
     * User: TPL
     * Date: 10.04.2019
     * Time: 15:28
     */

    namespace App\Managers\OrderManager;

    use App\Client;
    use App\Managers\OrderManager\Classes\Chart;
    use App\Managers\OrderManager\Dto\RequestDto;
    use App\Managers\OrderManager\Repositories\OrderRepository;
    use App\Product;
    use Illuminate\Http\Request;
    use Illuminate\Support\Collection;

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
            $result['graph'] = $this->buildGraph($result['orders']);

            return $result;
        }

        /**
         * Get catalogs for edit page
         *
         * @return array
         */
        public function getCatalogs(){
            $result['clients'] = Client::all();
            $result['products'] = Product::all();

            return $result;
        }

        private function buildGraph(Collection $orders){

            return $orders;
        }
    }
