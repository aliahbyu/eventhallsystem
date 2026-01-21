<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Homes Table
 */
class HomesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('homes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('bank_name')
            ->maxLength('bank_name', 255)
            ->requirePresence('bank_name', 'create')
            ->notEmptyString('bank_name', 'Please enter the bank name.');

        $validator
            ->scalar('bank_account_name')
            ->maxLength('bank_account_name', 255)
            ->requirePresence('bank_account_name', 'create')
            ->notEmptyString('bank_account_name', 'Please enter the account holder name.');

        $validator
            ->scalar('bank_account_number')
            ->maxLength('bank_account_number', 50)
            ->requirePresence('bank_account_number', 'create')
            ->notEmptyString('bank_account_number', 'Please enter the account number.');

        return $validator;
    }
}

