<?php
namespace App\Controller;

use App\Controller\AppController;

class AdminbookingsController extends AppController
{
    public function index()
    {
       

        $keyword = $this->request->getQuery('search');

        $query = $this->Adminbookings->find()
            ->contain([
                'Bookings' => ['Halls', 'Packages',]
            ]);

        if (!empty($keyword)) {
            $query->matching('Bookings', function ($q) use ($keyword) {
                return $q->where([
                    'OR' => [
                        'Bookings.name LIKE' => '%' . $keyword . '%',
                        'Bookings.email LIKE' => '%' . $keyword . '%',
                        'Bookings.phone LIKE' => '%' . $keyword . '%',
                    ]
                ]);
            });
        }

        $adminbookings = $query->all();

        $this->set(compact('adminbookings', 'keyword'));
    }
}






