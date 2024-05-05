<?php

namespace App\Controllers;

use App\Models\SignalModel;
use App\Models\SignalIntervalModel;

class Signal extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query('select * from signal_light');
        $data['pageTitle'] = 'Signal Lights';
        $data['signals'] = $query->getResult('array');
        return view('signals',$data);
    }

    public function save()
    {
        if ($this->request->getMethod() == "post") {
            $rules = [
				"sequence" => "required|max_length[1]|is_natural_no_zero",
			];

            if (!$this->validate($rules)) {

				$response = [
					'success' => false,
					'msg' => "There are some validation errors",
				];

				return $this->response->setJSON($response);
			} else {

				$signalModel = new SignalModel();

                echo "<pre>";
                print_r($this->request->getPost());
				die();

				if ($userModel->insert($data)) {

					$response = [
						'success' => true,
						'msg' => "Signal data saved successfully",
					];
				} else {
					$response = [
						'success' => true,
						'msg' => "Failed to save signal data",
					];
				}

				return $this->response->setJSON($response);
			}
        }
    }
}