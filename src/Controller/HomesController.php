<?php
declare(strict_types=1);

namespace App\Controller;

class HomesController extends AppController
{
    public function index()
    {
        $halls = $this->fetchTable('Halls')->find('all')->toArray();
        $packages = $this->fetchTable('Packages')->find('all')->toArray();
        $bankDetails = $this->fetchTable('Homes')->find()->first();

        $this->set(compact('halls', 'packages', 'bankDetails'));
    }
}




