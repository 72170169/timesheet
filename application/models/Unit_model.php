<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Unit_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Unit_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function ambil()
  {
   return $this->db->get('unit');
  
  }
  public function tambah ($data)
  {
    $tabel  = 'unit';
    $this->db->insert($tabel, $data);
  
  }
  public function ubah_data($id, $data)
  {
    $this->db->where('id_unit', $id);
		$this->db->update('unit', $data);
    
  }
  public function hapus_data($id)
  {
    $this->db->where('id_unit', $id);
    $this->db->delete('unit');
  }




  // ------------------------------------------------------------------------

}

/* End of file Unit_model.php */
/* Location: ./application/models/Unit_model.php */