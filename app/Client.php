<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Client extends Model {
        protected $fillable = ['client'];

        public $timestamps = false;

        public function orders() {
            return $this->hasMany(Order::class);
        }
    }
