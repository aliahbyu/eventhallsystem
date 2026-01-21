<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;

class HallsController extends AppController
{
    public function index()
    {
        $search = $this->request->getQuery('search');

        $query = $this->Halls->find();

        if (!empty($search)) {
            $query->where([
                'OR' => [
                    'Halls.name LIKE' => '%' . $search . '%',
                    'CAST(Halls.capacity AS CHAR) LIKE' => '%' . $search . '%'
                ]
            ]);
        }

        $halls = $this->paginate($query);
        $this->set(compact('halls', 'search'));
    }

    public function view($id = null)
    {
        $hall = $this->Halls->get($id);
        $this->set(compact('hall'));
    }

    public function add()
    {
        $hall = $this->Halls->newEmptyEntity();
        if ($this->request->is('post')) {
            $hall = $this->Halls->patchEntity($hall, $this->request->getData());
            if ($this->Halls->save($hall)) {
                $this->Flash->success(__('The hall has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hall could not be saved. Please, try again.'));
        }
        $this->set(compact('hall'));
    }

    public function edit($id = null)
    {
        $hall = $this->Halls->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hall = $this->Halls->patchEntity($hall, $this->request->getData());
            if ($this->Halls->save($hall)) {
                $this->Flash->success(__('The hall has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hall could not be updated. Please, try again.'));
        }
        $this->set(compact('hall'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hall = $this->Halls->get($id);
        if ($this->Halls->delete($hall)) {
            $this->Flash->success(__('The hall has been deleted.'));
        } else {
            $this->Flash->error(__('The hall could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}