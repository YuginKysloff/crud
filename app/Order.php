<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Order extends Model {
        protected $fillable = [
            'client_id',
            'product_id',
            'total',
            'date',
        ];

        public $timestamps = false;

        public function client() {
            return $this->belongsTo(Client::class);
        }

        public function product() {
            return $this->belongsTo(Product::class);
        }
    }
