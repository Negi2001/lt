<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Packet extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/index');
        $this->load->view('common/footer');
    }

    public function user()
    {
        $this->load->view('common/header');
        $this->load->view('Packet/user');
        $this->load->view('common/footer');
    }

    public function users()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mobile = $this->input->post('mobile_number');
            $market = $this->input->post('market_name');

            $data = array(
                'market_name' => $market,
            );

            $this->session->set_userdata('mobile_number', $mobile);
            $this->session->set_userdata('market_name', $market);

            redirect(base_url('Packet/userdetail'));
        }
    }


    public function details_user()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user_name = $this->input->post('user_name');
            $age = $this->input->post('age');
            $gender = $this->input->post('gender');
            $outlet_area_shop = $this->input->post('outlet_area_shop');
            $city = $this->input->post('city');

            $mobile_number = $this->session->userdata('mobile_number');
            $market_name = $this->session->userdata('market_name');  // Get market_name from session

            $data = array(
                'user_name' => $user_name,
                'age' => $age,
                'gender' => $gender,
                'outlet_area_shop' => $outlet_area_shop,
                'city' => $city,
                'mobile_number' => $mobile_number,
                'market_name' => $market_name  // Add market_name here
            );

            if ($this->db->insert('userdetails', $data)) {
                redirect(base_url('Packet/qrscan'));
            } else {
                redirect(base_url('userdetails'));
            }
        }
    }


    public function userdetail()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/userdetail');
        $this->load->view('common/footer');
    }

    public function info()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/info');
        $this->load->view('common/footer');
    }

    public function info2()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/info2');
        $this->load->view('common/footer');
    }

    public function info3()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/info3');
        $this->load->view('common/footer');
    }

    public function qrscan()
    {
        $total_amount = $this->session->userdata('total_amount') ?? 0;
        $data['total_amount'] = $total_amount;

        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/qrscan', $data);
        $this->load->view('common/footer');
    }

    public function upiid()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/upiid');
        $this->load->view('common/footer');
    }

    public function history()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/history');
        $this->load->view('common/footer');
    }

    public function qps()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/qps');
        $this->load->view('common/footer');
    }

    public function qrerror()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/qrerror');
        $this->load->view('common/footer');
    }
    public function thankyou()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/thankyou');
        $this->load->view('common/footer');
    }

    public function claimupi()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/claimupi');
        $this->load->view('common/footer');
    }


    public function check_qr_code()
    {
        $qr_code = $this->input->post('qr_code');
        $mobile_number = $this->session->userdata('mobile_number'); // Get the mobile number from the session

        // Check if QR code exists
        $this->db->select('amount, status');
        $this->db->from('qrscan');
        $this->db->where('specific_qr', $qr_code);
        $query = $this->db->get();

        header('Content-Type: application/json');

        if ($query->num_rows() > 0) {
            $result = $query->row();
            if ($result->status == 0) {
                // Update status to 1
                $this->db->set('status', 1);
                $this->db->where('specific_qr', $qr_code);
                $this->db->update('qrscan');

                // Format amount to remove leading zeros
                $amount = ltrim($result->amount, '0');
                $amount = $amount === '' ? '0' : $amount;

                // Update the session with the new total amount
                $current_amount = $this->session->userdata('total_amount') ?? 0;
                $new_total_amount = $current_amount + $amount;
                $this->session->set_userdata('total_amount', $new_total_amount);

                echo json_encode([
                    'match' => true,
                    'amount' => $amount,
                    'new_total_amount' => $new_total_amount // Include the new total amount in the response
                ]);
            } else {
                // Return a response indicating that the QR code has already been used
                echo json_encode(['match' => false, 'redirect' => true]);
            }
        } else {
            echo json_encode(['match' => false]);
        }
    }



    public function withdraw()
    {
        $total_amount = $this->input->post('total_amount');
        $mobile_number = $this->session->userdata('mobile_number');

        if ($mobile_number) {
            // Prepare data for insertain   
            $data = array(
                'mobile_number' => $mobile_number,
                'total_amount' => $total_amount
            );

            // Insert the data into the 'user_data' table
            if ($this->db->insert('user_data', $data)) {
                // Redirect to success page
                redirect(base_url('Packet/upiid'));
            } else {
                // Redirect to failure page
                redirect(base_url('Packet/failure'));
            }
        }
    }

    public function redeem_amount()
    {
        // Fetch total_amount from the session
        $data['total_amount'] = $this->session->userdata('total_amount') ?? 0;

        // Check if form is submitted
        if ($this->input->post('upi')) {
            // Form has been submitted
            $upi_id = $this->input->post('upi');
            $mobile_number = $this->session->userdata('mobile_number');

            if ($mobile_number) {
                // Prepare data for updating the 'user_data' table
                $update_data = array(
                    'upi_id' => $upi_id,
                    'status' => 1,
                    'total_amount' => $data['total_amount'] // Ensure the total amount is updated
                );

                // Update the user's UPI ID and status in the 'user_data' table
                $this->db->where('mobile_number', $mobile_number);
                if ($this->db->update('user_data', $update_data)) {
                    // Clear the session variable
                    $this->session->unset_userdata('total_amount');

                    // Redirect to the history page
                    redirect(base_url('Packet/history'));
                } else {
                    // Redirect to failure page
                    redirect(base_url('Packet/upiid')); // Redirect to a failure page
                }
            } else {
                // Handle the case where mobile_number is not found in session
                redirect(base_url('Packet/upiid')); // Redirect to a failure page
            }
        } else {
            // Form not submitted, load the redeem page
            $this->load->view('redeem_amount_view', $data);
        }
    }
}
