<?php
    /**
     * Created by PhpStorm.
     * User: TPL
     * Date: 10.04.2019
     * Time: 16:03
     */

    namespace App\Managers\OrderManager\Dto;

    use App\Managers\BaseEntities\AbstractDto;
    use Illuminate\Http\Request;

    class RequestDto extends AbstractDto {
        /**
         * @var Request
         */
        protected $request;

        public function __construct(Request $request) {
            $this->request = $request;
        }

        /**
         * Prepare array of params
         *
         * @return array
         */
        public function toArray() {
            $order = $this->request->get('order', []);

            return [
                'searchField'    => $this->request->search['field'] ?? 'all',
                'searchKeyword'  => $this->request->search['keyword'] ?? null,
                'OrderField'     => key($order) ?? 'date',
                'OrderDirection' => array_shift($order) ?? 'asc',
            ];
        }
    }
