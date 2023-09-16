<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasModel extends CI_Model {
        public function hapusp($id)
        {
          $this->db->where('id_user',$id);
          $this->db->delete('user');
        }
        public function tambahp($data)
        {
          $this->db->insert('user',$data);
        }
        public function editp($where,$data,$table)
        {
          $this->db->where($where);
          $this->db->update($table,$data);        
        }
        public function hapusc($id)
        {
          $this->db->where('id_user',$id);
          $this->db->delete('user');
        }
        public function tambahc($data)
        {
          $this->db->insert('user',$data);
        }
        public function editc($where,$data,$table)
        {
          $this->db->where($where);
          $this->db->update($table,$data);        
        }
        public function hapuspak($id)
        {
          $this->db->where('id',$id);
          $this->db->delete('pakaian');
        }
        public function tambahpak($data)
        {
          $this->db->insert('pakaian',$data);
        }
        public function editpak($where,$data,$table)
        {
          $this->db->where($where);
          $this->db->update($table,$data);        
        }
        public function search($perpage,$startdata,$keyword)
        {
          $this->db->select('user_petugas.id_user AS id_petugas, user_petugas.nama_petugas AS nama_petugas_petugas, customer.nama_petugas AS nama_petugas_customer, pakaian.id, nama_pakaian, transaksi.tanggal_input, transaksi.id, transaksi.jumlah, (transaksi.jumlah * harga) as total, pakaian.status, dateline, pakaian.image, transaksi.status');
          $this->db->from('transaksi');
          $this->db->join('user AS user_petugas', 'user_petugas.id_user = transaksi.user_idp AND user_petugas.role_id = 1', 'left');
          $this->db->join('user AS customer', 'customer.id_user = transaksi.user_id AND customer.role_id = 2', 'left');
          $this->db->join('pakaian', 'pakaian.id = transaksi.pakaian_id');
          $this->db->order_by('transaksi.tanggal_input', 'DESC');
          $this->db->like('user_petugas.nama_petugas',$keyword);
          $this->db->or_like('customer.nama_petugas',$keyword);
          $this->db->or_like('pakaian.nama_pakaian',$keyword);
          $this->db->limit($perpage, $startdata); // Menambahkan batasan jumlah dan data awal
          return $this->db->get()->result_array();
        }
        public function rekap($perpage,$start,$keyword)
        {
          $this->db->select('MIN(tanggal_input) AS tanggal_awal, MAX(tanggal_input) AS tanggal_akhir');
          $dateRange=$this->db->get('transaksi')->row();
          $this->db->SELECT('p.id, p.nama_pakaian, p.image, p.harga,SUM(jumlah) AS totalj, SUM(total) AS totalh');
          $this->db->from('transaksi');
          $this->db->join('pakaian as p', 'transaksi.pakaian_id = p.id');
          $this->db->where('transaksi.tanggal_input >=', $dateRange->tanggal_awal);
          $this->db->where('transaksi.tanggal_input <=', $dateRange->tanggal_akhir);
          $this->db->group_by('p.id');
          $this->db->order_by('transaksi.tanggal_input DESC');
          $this->db->like('p.nama_pakaian',$keyword);
          $this->db->limit($perpage, $start);
          return $this->db->get()->result_array();
        }
}