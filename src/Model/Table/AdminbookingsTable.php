<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class AdminbookingsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('adminbookings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Adminbookings', [
            'foreignKey' => 'booking_id',
        ]);


        $this->belongsTo('Bookings', [
            'foreignKey' => 'booking_id',
            'joinType' => 'INNER',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('booking_id')
            ->requirePresence('booking_id', 'create')
            ->notEmptyString('booking_id');

        return $validator;
    }
}


