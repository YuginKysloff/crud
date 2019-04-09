<?php

    use Illuminate\Database\Seeder;
    use Carbon\Carbon;
    use App\Client;
    use App\Product;
    use App\Order;
    use Illuminate\Database\Eloquent\Collection;

    class OrdersTableSeeder extends Seeder {
        /**
         * @var Collection $clients
         */
        private $clients;

        /**
         * @var Collection $products
         */
        private $products;

        /**
         * @var array $data
         */
        private $orderData;

        public function __construct() {
            $this->init();
        }

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            foreach ($this->orderData as $item) {
                $client_id = $this->getClientId($item[0]);
                $product_id = $this->getProductId($item[1]);

                if ($client_id && $product_id) {
                    Order::firstOrCreate([
                        'client_id'  => $client_id,
                        'product_id' => $product_id,
                        'total'      => $item[2],
                        'date'       => Carbon::createFromFormat('m-d-y', $item[3])->startOfDay(),
                    ]);
                }
            }
        }

        private function init(): void {
            $this->clients = Client::all();
            $this->products = Product::all();
            $this->orderData = [
                [
                    'Acme',
                    'The Matrix Trilogy 1',
                    '30',
                    '02-01-15'
                ],
                [
                    'Acme',
                    'The Matrix Trilogy 2',
                    '31',
                    '02-02-15'
                ],
                [
                    'Acme',
                    'The Matrix Trilogy 3',
                    '32',
                    '02-03-15'
                ],
                [
                    'Acme',
                    'The Matrix Trilogy 4',
                    '33',
                    '02-04-15'
                ],
                [
                    'Acme',
                    'The Matrix Trilogy 5',
                    '34',
                    '02-05-15'
                ],
                [
                    'Acme',
                    'The Matrix Trilogy 6',
                    '35',
                    '02-06-15'
                ],
                [
                    'Acme',
                    'The Matrix Trilogy 7',
                    '36',
                    '02-07-15'
                ],
                [
                    'Acme',
                    'The Matrix Trilogy 8',
                    '37',
                    '02-08-15'
                ],
                [
                    'Acme',
                    'The Matrix Trilogy 9',
                    '38',
                    '02-09-15'
                ],
                [
                    'Acme',
                    'The Matrix Trilogy 10',
                    '39',
                    '02-10-15'
                ],
                [
                    'Acme',
                    'The Matrix Trilogy 11',
                    '40',
                    '02-11-15'
                ],
                [
                    'Acme',
                    'The Matrix Trilogy 12',
                    '41',
                    '02-12-15'
                ],
                [
                    'Acme',
                    'The Matrix Trilogy 13',
                    '42',
                    '02-13-15'
                ],
                [
                    'Acme',
                    'The Matrix Trilogy 14',
                    '43',
                    '02-14-15'
                ],
                [
                    'Acme',
                    'The Matrix Trilogy 15',
                    '44',
                    '02-15-15'
                ],
                [
                    'Acme',
                    'The Matrix Trilogy 16',
                    '45',
                    '02-16-15'
                ],
                [
                    'Acme',
                    'The Matrix Trilogy 17',
                    '46',
                    '02-17-15'
                ],
                [
                    'Acme',
                    'The Matrix Trilogy 18',
                    '47',
                    '02-18-15'
                ],
                [
                    'Acme',
                    'The Matrix Trilogy 19',
                    '48',
                    '02-19-15'
                ],
                [
                    'Microsoft',
                    'Macbook Air 1',
                    '1200',
                    '02-19-15'
                ],
                [
                    'Microsoft',
                    'Macbook Air 2',
                    '1201',
                    '02-20-15'
                ],
                [
                    'Microsoft',
                    'Macbook Air 3',
                    '1202',
                    '02-21-15'
                ],
                [
                    'Microsoft',
                    'Macbook Air 4',
                    '1203',
                    '02-22-15'
                ],
                [
                    'Microsoft',
                    'Macbook Air 5',
                    '1204',
                    '02-23-15'
                ],
                [
                    'Microsoft',
                    'Macbook Air 6',
                    '1205',
                    '02-24-15'
                ],
                [
                    'Microsoft',
                    'Macbook Air 7',
                    '1206',
                    '02-25-15'
                ],
                [
                    'Microsoft',
                    'Macbook Air 8',
                    '1207',
                    '02-26-15'
                ],
                [
                    'Microsoft',
                    'Macbook Air 9',
                    '1208',
                    '02-27-15'
                ],
                [
                    'Microsoft',
                    'Macbook Air 10',
                    '1209',
                    '02-28-15'
                ],
                [
                    'Microsoft',
                    'Macbook Air 11',
                    '1210',
                    '03-01-15'
                ],
                [
                    'Microsoft',
                    'Macbook Air 12',
                    '1211',
                    '03-02-15'
                ],
                [
                    'Microsoft',
                    'Macbook Air 13',
                    '1212',
                    '03-03-15'
                ],
                [
                    'Microsoft',
                    'Macbook Air 14',
                    '1213',
                    '03-04-15'
                ],
                [
                    'Microsoft',
                    'Macbook Air 15',
                    '1214',
                    '03-05-15'
                ],
                [
                    'Microsoft',
                    'Macbook Air 16',
                    '1215',
                    '03-06-15'
                ],
                [
                    'Microsoft',
                    'Macbook Air 17',
                    '1216',
                    '03-07-15'
                ],
                [
                    'Microsoft',
                    'Macbook Air 18',
                    '1217',
                    '03-08-15'
                ],
                [
                    'Microsoft',
                    'Macbook Air 19',
                    '1218',
                    '03-09-15'
                ],
                [
                    'Apple',
                    'Server Rack',
                    '10000',
                    '02-10-15'
                ],
                [
                    'Apple',
                    'Server Farm',
                    '100000',
                    '02-28-15'
                ],
                [
                    'Apple',
                    'Watch',
                    '399',
                    '03-09-15'
                ]
            ];
        }

        /**
         * @param string $clientName
         * @return int|null
         */
        private function getClientId(string $clientName): ?int {
            return $this->clients->where('client', '=', $clientName)->first()->id ?? null;
        }

        /**
         * @param string $productName
         * @return int|null
         */
        private function getProductId(string $productName): ?int {
            return $this->products->where('product', '=', $productName)->first()->id ?? null;
        }
    }
