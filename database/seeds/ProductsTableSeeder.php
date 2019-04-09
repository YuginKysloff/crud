<?php

    use Illuminate\Database\Seeder;
    use App\Product;

    class ProductsTableSeeder extends Seeder {
        private $acme = 'The Matrix Trilogy ';

        private $microsoft = 'Macbook Air ';

        private $apple = [
            'Server Rack',
            'Server Farm',
            'Watch',
        ];

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            for ($i = 1; $i < 20; $i++) {
                Product::firstOrCreate([
                    'product' => $this->acme . $i,
                ]);
            }

            for ($i = 1; $i < 20; $i++) {
                Product::firstOrCreate([
                    'product' => $this->microsoft . $i,
                ]);
            }

            foreach ($this->apple as $product) {
                Product::firstOrCreate([
                    'product' => $product,
                ]);
            }
        }
    }
