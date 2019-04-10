<?php
    /**
     * Created by PhpStorm.
     * User: TPL
     * Date: 10.04.2019
     * Time: 15:28
     */

    namespace App\Managers\OrderManager\Repositories;

    use App\Http\Controllers\Controller;
    use App\Managers\BaseEntities\BaseRepository;
    use App\Managers\OrderManager\Dto\RequestDto;
    use App\Order;

    class OrderRepository extends BaseRepository {
        /**
         * @var string
         */
        protected $model = Order::class;

        /**
         * Get filtered and ordered list of orders
         *
         * @param RequestDto $dto
         * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
         */
        public function getFilteredList(RequestDto $dto) {
            $data = $dto->toArray();

            return $this->query()
                ->join('clients', 'clients.id', '=', 'orders.client_id')
                ->join('products', 'products.id', '=', 'orders.product_id')
                ->select('orders.id', 'clients.client', 'products.product', 'orders.total', 'orders.date')
                ->when($data['searchKeyword'], function ($query) use ($data) {
                    $keyword = '%' . $data['searchKeyword'] . '%';

                    return $query->when($data['searchField'] == 'all', function ($query) use ($data, $keyword) {
                        return $query
                            ->where('client', 'like', $keyword)
                            ->orWhere('product', 'like', $keyword)
                            ->orWhere('total', '=', $data['searchKeyword'])
                            ->orWhere('date', 'like', $keyword);
                    }, function ($query) use ($data, $keyword) {
                        return $query->where($data['searchField'], 'like', $keyword);
                    });
                })
                ->orderBy($data['OrderField'], $data['OrderDirection'])
                ->paginate(Controller::PER_PAGE);
        }
    }
