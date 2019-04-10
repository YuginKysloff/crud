<?php
    /**
     * Created by PhpStorm.
     * User: TPL
     * Date: 10.04.2019
     * Time: 15:32
     */

    namespace App\Managers\BaseEntities;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Builder;

    class BaseRepository {
        /**
         * @var string
         */
        protected $model;

        /**
         * Create model instance
         *
         * @return Model
         */
        protected function make(): Model {
            return new $this->model;
        }

        /**
         * Create new query
         *
         * @return Builder
         */
        protected function query(): Builder {
            return $this->make()->newQuery();
        }
    }
