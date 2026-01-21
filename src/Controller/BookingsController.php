<?php
namespace App\Controller;

use Cake\Routing\Router;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Dompdf\Dompdf;

class BookingsController extends AppController
{
    public function add()
    {
        $booking = $this->Bookings->newEmptyEntity();
        $halls = $this->Bookings->Halls->find('list');
        $packages = $this->Bookings->Packages->find('list');

        if ($this->request->is('post')) {
            $booking = $this->Bookings->patchEntity($booking, $this->request->getData());

            // Handle receipt upload
            $file = $this->request->getData('receipt_path');
            if ($file && !$file->getError()) {
                $filename = time() . '_' . $file->getClientFilename();
                $file->moveTo(WWW_ROOT . 'receipts' . DS . $filename);
                $booking->receipt_path = 'receipts/' . $filename;
            }

            // Calculate total price based on hall + package + number of days
            $start = new \DateTime($booking->start_date);
            $end = new \DateTime($booking->end_date);
            $days = $start->diff($end)->days + 1;

            $hall = $this->Bookings->Halls->get($booking->hall_id);
            $package = $this->Bookings->Packages->get($booking->package_id);

            $isWeekend = in_array($start->format('D'), ['Sat', 'Sun']);
            $hallRate = $isWeekend ? $hall->weekend_rate : $hall->weekday_rate;

            $booking->total_price = ($hallRate * $days) + $package->price;

            if ($this->Bookings->save($booking)) {
                // ✅ Insert into Adminbookings without loadModel or TableRegistry
                $adminbooking = $this->fetchTable('Adminbookings')->newEmptyEntity();
                $adminbooking->booking_id = $booking->id;
                $this->fetchTable('Adminbookings')->save($adminbooking);

                // ✅ Redirect to invoice
                return $this->redirect(['action' => 'invoice', $booking->id]);
            }
        }

        $this->set(compact('booking', 'halls', 'packages'));
    }
    
  public function view($id = null)
{
    $booking = $this->Bookings->get($id, [
        'contain' => ['Halls', 'Packages'],
    ]);

    $this->set(compact('booking'));
    $this->set('title', 'Booking Details'); // ✅ fix for undefined variable
}

        public function edit($id = null)
    {
        $booking = $this->Bookings->get($id, [
            'contain' => [],
        ]);
        $halls = $this->Bookings->Halls->find('list');
        $packages = $this->Bookings->Packages->find('list');

        if ($this->request->is(['patch', 'post', 'put'])) {
            $booking = $this->Bookings->patchEntity($booking, $this->request->getData());

            // Optional: handle updated receipt file
            $file = $this->request->getData('receipt_path');
            if ($file && !$file->getError()) {
                $filename = time() . '_' . $file->getClientFilename();
                $file->moveTo(WWW_ROOT . 'receipts' . DS . $filename);
                $booking->receipt_path = 'receipts/' . $filename;
            }

            // Recalculate total price
            $start = new \DateTime($booking->start_date);
            $end = new \DateTime($booking->end_date);
            $days = $start->diff($end)->days + 1;
            $hall = $this->Bookings->Halls->get($booking->hall_id);
            $package = $this->Bookings->Packages->get($booking->package_id);
            $isWeekend = in_array($start->format('D'), ['Sat', 'Sun']);
            $hallRate = $isWeekend ? $hall->weekend_rate : $hall->weekday_rate;
            $booking->total_price = ($hallRate * $days) + $package->price;

            if ($this->Bookings->save($booking)) {
                $this->Flash->success(__('Booking updated successfully.'));
                return $this->redirect(['controller' => 'Adminbookings', 'action' => 'index']);
            }
            $this->Flash->error(__('Failed to update booking.'));
        }

        $this->set(compact('booking', 'halls', 'packages'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $booking = $this->Bookings->get($id);
        if ($this->Bookings->delete($booking)) {
            // Optional: delete corresponding adminbooking
            $this->fetchTable('Adminbookings')->deleteAll(['booking_id' => $id]);

            $this->Flash->success(__('The booking has been deleted.'));
        } else {
            $this->Flash->error(__('The booking could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'Adminbookings', 'action' => 'index']);
    }


    public function success($id = null)
    {
        $booking = $this->Bookings->get($id, [
            'contain' => ['Halls', 'Packages'],
        ]);
        $this->set(compact('booking'));
    }

    public function invoice($id)
    {
        $booking = $this->Bookings->get($id, [
            'contain' => ['Halls', 'Packages'],
        ]);

        $dompdf = new Dompdf();
        $html = $this->renderViewAsString('Bookings/invoice', ['booking' => $booking]);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $this->response
            ->withType('application/pdf')
            ->withHeader('Content-Disposition', 'attachment; filename="invoice_' . $booking->id . '.pdf"')
            ->withStringBody($dompdf->output());
    }

    private function renderViewAsString($template, $data)
    {
        extract($data);
        ob_start();
        include(ROOT . DS . 'templates' . DS . str_replace('/', DS, $template) . '.php');
        return ob_get_clean();
    }
}