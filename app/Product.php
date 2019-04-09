<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Product extends Model {
        protected $fillable = ['product'];

        public $timestamps = false;

        public function orders() {
            return $this->hasMany(Order::class);
        }
    }
