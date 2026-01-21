<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class HallsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('halls');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->notEmptyString('name');

        $validator
            ->integer('capacity')
            ->notEmptyString('capacity');

        $validator
            ->integer('min_booking_day')
            ->notEmptyString('min_booking_day');

        $validator
            ->numeric('weekday_rate')
            ->notEmptyString('weekday_rate');

        $validator
            ->numeric('weekend_rate')
            ->notEmptyString('weekend_rate');

        return $validator;
    }
}

