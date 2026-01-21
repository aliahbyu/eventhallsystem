<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;

class PackagesController extends AppController
{
    public function index()
    {
        $search = $this->request->getQuery('search');

        $query = $this->Packages->find();

        if (!empty($search)) {
            $query->where([
                'OR' => [
                    'Packages.name LIKE' => '%' . $search . '%',
                    'Packages.includes LIKE' => '%' . $search . '%'
                ]
            ]);
        }

        $packages = $this->paginate($query);
        $this->set(compact('packages', 'search'));
    }

    public function view($id = null)
    {
        $package = $this->Packages->get($id);
        $this->set(compact('package'));
    }

    public function add()
    {
        $package = $this->Packages->newEmptyEntity();
        if ($this->request->is('post')) {
            $package = $this->Packages->patchEntity($package, $this->request->getData());
            if ($this->Packages->save($package)) {
                $this->Flash->success(__('The package has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The package could not be saved. Please, try again.'));
        }
        $this->set(compact('package'));
    }

    public function edit($id = null)
    {
        $package = $this->Packages->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $package = $this->Packages->patchEntity($package, $this->request->getData());
            if ($this->Packages->save($package)) {
                $this->Flash->success(__('The package has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The package could not be updated. Please, try again.'));
        }
        $this->set(compact('package'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $package = $this->Packages->get($id);
        if ($this->Packages->delete($package)) {
            $this->Flash->success(__('The package has been deleted.'));
        } else {
            $this->Flash->error(__('The package could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

