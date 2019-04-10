<?php
    /**
     * Created by PhpStorm.
     * User: TPL
     * Date: 10.04.2019
     * Time: 16:02
     */

    namespace App\Managers\BaseEntities;

    abstract class AbstractDto {
        /**
         * Transform data to array
         *
         * @return array
         */
        public function toArray() {
            return collect($this)->toArray();
        }

        /**
         * Transform data to json
         *
         * @return string
         */
        public function toJson() {
            return collect($this)->toJson();
        }
    }
