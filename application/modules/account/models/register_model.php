<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

  public function getRecords(){
    $query = $this->db->get("Users");
    return $query->result();
  }

  public function save_noconfirmed($nombres,$apellidos,$email,$pass,$ale){
    $data = array(
      'fnameUsers' => $nombres,
      'lnameUsers' => $apellidos,
      'emailUsers' => $email,
      'nickUsers' => $nombres,
      'passUsers' => $pass,
      'stateUsers' => "NO CONFIRMADO",
      'dateUsers' => date("Y-m-d H:i:s"),
      'auxUsers'=> $ale,
      'Prolifes_idProlifes' => 1
     );
    return $this->db->insert("Users",$data);
 	}

  public function save_confirmed($aemail){
    $data = array(
      'stateUsers' => "CONFIRMADO",
      'auxUsers' => "0"
    );

    $this->db->where('emailUsers', $aemail);
    return $this->db->update('Users', $data);
  }
  /*
  public function lastRecordUserId($table){
    $this->db->select('MAX(idUsers)');
    return $this->db->get('Users');
  }
  */

  public function nueva_wallet_btc($email,$data){    
    $data['email']=$email;
    return $this->db->insert('WBlockchain', $data);
  }
}
