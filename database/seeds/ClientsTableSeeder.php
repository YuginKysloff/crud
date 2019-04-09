<?php

    use Illuminate\Database\Seeder;
    use App\Client;

    class ClientsTableSeeder extends Seeder {
        private $clients = [
            'Acme',
            'Apple',
            'Microsoft',
        ];

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            foreach ($this->clients as $client) {
                Client::firstOrCreate([
                    'client' => $client,
                ]);
            }
        }
    }
