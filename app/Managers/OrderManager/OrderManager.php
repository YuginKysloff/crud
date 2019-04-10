<?php
    /**
     * Created by PhpStorm.
     * User: TPL
     * Date: 10.04.2019
     * Time: 15:28
     */

    namespace App\Managers\OrderManager;

    use App\Managers\OrderManager\Dto\RequestDto;
    use App\Managers\OrderManager\Repositories\OrderRepository;
    use Illuminate\Http\Request;

    class OrderManager {

        /**
         * Prepare data for index page
         *
         * @param Request $request
         * @return array
         */
        public function getList(Request $request): array {
            $result['orders'] = app(OrderRepository::class)->getFilteredList(new RequestDto($request)) ?? collect();
            $result['params'] = $request->except('page');

            return $result;
        }
    }
