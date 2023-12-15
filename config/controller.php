<?php
include_once('cores.php');
include_once('db-config.php');
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

/**
 *
 */
class controller extends dbc
{
    public function runner($query)
    {
        $run_qry = $this->run_query($query);
        if ($run_qry == true) {
            return "success";
        } else {
            return "Invalid Command";
        }
    }

    /** function to logout a user **/
    public function logout()
    {
        // remove all session variables
        session_unset();
        // destroy the session
        session_destroy();
    }

    /** function to check if a user is logged in **/
    public function checkLogin()
    {
        if (isset($_SESSION['login_user'])) {
            return 'logged';
        } else {
            return 'nau';
        }
    }


    //validate user email
    public function validateUserEmail($email)
    {
        $query = "select * from len_members where email_addr='$email'";
        $run_qry = $this->run_query($query);
        $check_email = $this->get_number_of_row($run_qry);
        if ($check_email < 1) {
            return "success";
        } else {
            return "Email Already Exist";
        }
    }

    //validate user email
    public function validateUserHostkey($keys)
    {
        $query = "select * from len_members where user_key='$keys'";
        $run_qry = $this->run_query($query);
        $check_email = $this->get_number_of_row($run_qry);
        if ($check_email < 1) {
            return "failed";
        } else {
            return "success";
        }
    }


    //validate user account
    public function validateUserHostkey_ad($host_key, $secure_login)
    {
        $query = "select * from len_members where user_key='$host_key' and secure_login='$secure_login'";
        $run_qry = $this->run_query($query);
        $check_email = $this->get_number_of_row($run_qry);
        if ($check_email < 1) {
            return "failed";
        } else {
            return "success";
        }
    }

    //add to members
    public function add_new_member($public_key, $email, $password, $username)
    {
        $public_k = sha1($public_key);
        $query = "INSERT INTO `len_members` (`id`, `user_key`, `username`, `email_addr`, `pwd_pass`,`user_id`) VALUES (NULL, '$public_k', '$username', '$email', '$password','$public_key')";
        $run_qry = $this->run_query($query);
        if ($run_qry == true) {
            return json_encode("success");
        } else {
            return json_encode("failed");
        }
    }

    //add to members
    public function add_company($companyname, $currency, $country, $public_key, $host_key, $company_key)
    {
        $query = "INSERT INTO `company_list` (`id`, `host_key`, `company_name`, `country`, `currency`, `company_key`, `checker_id`) VALUES (NULL, '$host_key', '$companyname', '$country', '$currency', '$company_key', '$public_key')";
        $run_qry = $this->run_query($query);
        if ($run_qry == true) {
            return json_encode("success");
        } else {
            return json_encode("failed");
        }
    }

    //add to members
    public function add_branch($companyname, $address, $btype, $company_id, $host_key, $secure_login, $pid_id)
    {
        $query = "INSERT INTO `branch_list` (`id`, `branch_id`,`address`, `branch_name`, `business_id`, `host_key`,`status`) VALUES (NULL, '$company_id','$address', '$companyname', '$pid_id', '$host_key', '1')";
        $run_qry = $this->run_query($query);
        if ($run_qry == true) {
            return json_encode("success");
        } else {
            return json_encode("failed");
        }
    }
    //update to store
    public function UpdateStore($host_key, $legalname, $email_addr, $bis_number, $companyname, $tin, $tax_form, $industry, $currency, $website, $com_addr, $business_id_store,$cellphone)
    {
         $query = "UPDATE `company_list` SET `legal_name`='$legalname',`address`='$com_addr',`email_addr`='$email_addr',`tax`='$tax_form',`industry`='$industry',`tax_industry`='$tax_form',`phone`='$cellphone',`company_logo`='',`tin_number`='$tin',`website`='$website',`business_id`='$bis_number' WHERE checker_id='$business_id_store' and host_key='$host_key'";
        $run_qry = $this->run_query($query);
        if ($run_qry == true) {
            return json_encode('success');
        } else {
            return json_encode("failed");
        }
    }


    //user login
    public function auth_users($email, $password)
    {
        $query = "select * from len_members where email_addr='$email' AND pwd_pass='$password'";
        $run_query = $this->run_query($query);
        if ($this->get_number_of_row($run_query) == 1) {
            return json_encode("success");

        } else {
            return json_encode('invalid');
        }
    }

    public function secure_login($secure, $email)
    {
        $query = "update len_members set secure_login='$secure' where email_addr='$email'";
        $run_qry = $this->run_query($query);
        if ($run_qry == true) {
            return "success";
        } else {
            return "Invalid Command";
        }
    }


    //get the user information
    public function get_user_data($user_email)
    {
        $query = "select * from len_members where email_addr='$user_email'";
        $query = $this->run_query($query);
        $categories = array();
        while ($row = $this->get_result($query)) {
            $obj = new stdClass();
            $obj->id = $row['id'];
            $obj->email_addr = $row['email_addr'];
            $obj->username = $row['username'];
            $obj->user_key = $row['user_key'];
            $obj->account_activation = $row['account_activation'];
            $obj->secure_login = $row['secure_login'];


            $categories[] = $obj;
        }
        return json_encode($categories);

    }



    //get the user information
    public function get_company_list($host_key)
    {
        $query = "select * from company_list where host_key='$host_key' order by id desc";
        $query = $this->run_query($query);
        $categories = array();
        while ($row = $this->get_result($query)) {
            $obj = new stdClass();
            $obj->id = $row['id'];
            $obj->company_name = $row['company_name'];
            $obj->country = $row['country'];
            $obj->currency = $row['currency'];
            $obj->company_key = $row['company_key'];
            $obj->checker_id = $row['checker_id'];
            $obj->created_date = $row['created_date'];

            if ($obj->currency == 0) {
                $obj->currency_symbol = 'Not Assigned';
            } else {
                $get_work_cen = $this->fetch_curreny($row['currency']);
                $obj->currency_symbol = $get_work_cen->currency_symbol;
            }
            $categories[] = $obj;
        }
        return json_encode($categories);

    }


    public function edit_company_list($host_key, $company_id)
    {
        $query = "SELECT * FROM company_list WHERE host_key='$host_key' AND checker_id='$company_id' ORDER BY id DESC";
        $result = $this->run_query($query);
        if ($result) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                if ($row['currency'] == 0) {
                    $row['currency_symbol'] = 'Not Assigned';
                } else {
                    $get_work_cen = $this->fetch_curreny($row['currency']);
                    $row['currency_symbol'] = $get_work_cen->currency_symbol;
                }
                $data[] = $row;
            }
            echo json_encode($data);
        } else {
            echo json_encode(['error' => 'Database query error']);
        }
    }


    //get the user information
    public function get_branch_list($host_key, $branch_id)
    {
        $query = "select * from branch_list where host_key='$host_key' and business_id='$branch_id' order by id desc";
        $query = $this->run_query($query);
        $categories = array();
        while ($row = $this->get_result($query)) {
            $obj = new stdClass();
            $obj->id = $row['id'];
            $obj->branch_id = $row['branch_id'];
            $obj->branch_name = $row['branch_name'];
            $obj->address = $row['address'];
            $obj->business_id = $row['business_id'];
            $obj->host_key = $row['host_key'];
            $obj->created_date = $row['created_date'];
            $obj->status = $row['status'];
            $obj->acc_type = $row['acc_type'];

            // if ($obj->currency == 0) {
            //     $obj->currency_symbol = 'Not Assigned';
            // } else {
            //     $get_work_cen = $this->fetch_curreny($row['currency']);
            //     $obj->currency_symbol = $get_work_cen->currency_symbol;
            // }
            $categories[] = $obj;
        }
        return json_encode($categories);

    }




    //get the user information
    public function get_currency($user_email)
    {
        $query = "select * from currency";
        $query = $this->run_query($query);
        $categories = array();
        while ($row = $this->get_result($query)) {
            $obj = new stdClass();
            $obj->id = $row['id'];
            $obj->currency_code = $row['currency_code'];
            $obj->currency_name = $row['currency_name'];
            $obj->currency_symbol = $row['currency_symbol'];


            $categories[] = $obj;

        }
        return json_encode($categories);
    }


    //fetch currency
    public function fetch_curreny($id)
    {
        $query = "select * from currency where id='$id'";
        $row = $this->get_result($this->run_query($query));
        $obj = new stdClass();
        $obj->id = $row['id'];
        $obj->currency_code = $row['currency_code'];
        $obj->currency_symbol = $row['currency_symbol'];
        return $obj;
    }




    public function delete_company_list($host_key, $id)
    {
        $query = "delete from company_list  where checker_id='$id' and host_key='$host_key'";
        $run_qry = $this->run_query($query);
        if ($run_qry == true) {
            return json_encode("success");
        } else {
            return json_encode("Invalid Command");
        }
    }



}

