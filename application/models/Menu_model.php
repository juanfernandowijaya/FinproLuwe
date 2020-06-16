<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = " SELECT `user_sub_menu`.*,`user_menu`.`menu` 
                FROM `user_sub_menu` JOIN `user_menu` 
                ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }
    public function getUserName()
    {
        $query = "SELECT `user`.`name`,`user_order`.*
                    FROM `user` JOIN `user_order`
                    ON `user`.`id` = `user_order`.id_user ";
        return $this->db->query($query)->result_array();
    }
    public function getMerchantOrder()
    {
        $query = "SELECT `luwe_tradisional`.`id`,`user_order`.*
                    FROM `luwe_tradisional` JOIN `user_order`
                    ON `luwe_tradisional`.`id` = `user_order`.`merchant_id` ";
        return $this->db->query($query)->result_array();
    }
    public function DeleteSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*,`user_menu`.`menu` 
        FROM `user_sub_menu` JOIN `user_menu` 
        ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }
    public function getRekomendasi()
    {
        $query = "SELECT `luwe_rekomendasi`.* 
                    FROM  `luwe_rekomendasi` ";
        return $this->db->query($query)->result_array();
    }
    public function getPromo()
    {
        $query = "SELECT `luwe_promo`.* 
                    FROM `luwe_promo` ";
        return $this->db->query($query)->result_array();
    }
    public function getKodePromo()
    {
        $query = " SELECT `luwe_kode_promo`.*
                    FROM `luwe_kode_promo` JOIN `luwe_promo`
                    ON `luwe_kode_promo`.`id_kode_promo` = `luwe_promo`.id  
                     ";
        return $this->db->query($query)->result_array();
    }
    public function matchKode()
    {
        $query = " SELECT `luwe_kode_promo`.*
        FROM `luwe_kode_promo` JOIN `luwe_promo`
        ON `luwe_kode_promo`.`id_kode_promo` = `luwe_promo`.id  
         ";
        return $this->db->query($query)->result_array();
    }

    public function getGaleri()
    {
        $query = "SELECT `luwe_galleri`.*  
                    FROM  `luwe_galleri` ";
        return $this->db->query($query)->result_array();
    }

    public function getArtikel()
    {
        $query = " SELECT `luwe_artikel`.* 
                    FROM `luwe_artikel`";
        return $this->db->query($query)->result_array();
    }
    public function tambahRekomendasi()
    {
        $query = "INSERT INTO luwe_rekomendasi 
                    VALUES ('',:gambar_produk,:nama_produk,:deskripsi_produk,:link_produk )";
    }
    public function deleteReko($id)
    {
        $this->db->delete('luwe_rekomendasi', ['id' => $id]);
    }
    public function deletePro($id)
    {
        $this->db->delete('luwe_promo', ['id' => $id]);
        $this->db->delete('luwe_kode_promo', ['id_kode_promo' => $id]);
    }
    public function deleteSubPro($id)
    {
        $this->db->delete('luwe_kode_promo', ['id' => $id]);
    }
    public function deleteGal($id)
    {
        $this->db->delete('luwe_galleri', ['id' => $id]);
    }
    public function deleteArt($id)
    {
        $this->db->delete('luwe_artikel', ['id' => $id]);
    }

    public function deleteOrder1($id)
    {
        $this->db->delete('user_order', ['id_order' => $id]);
    }

    public function getTradisional()
    {
        $query = "SELECT `luwe_tradisional`.*
                    FROM `luwe_tradisional`  ";
        return $this->db->query($query)->result_array();
    }
    public function getTradisionalGalleri()
    {
        $query = " SELECT `luwe_tradisional_gambar`.* 
                    FROM `luwe_tradisional_gambar` ";
        return $this->db->query($query)->result_array();
    }

    public function deleteMakananTradisional($id)
    {
        $this->db->delete('luwe_tradisional', ['id' => $id]);
        $this->db->delete('luwe_makanan_item', ['makanan_id' => $id]);
        $this->db->delete('luwe_tradisional_gambar', ['id_kode_tradisional' => $id]);
    }
    public function deleteTradisionalMenu($id)
    {
        $this->db->delete('luwe_makanan_item', ['id' => $id]);
    }
    public function deleteTradisionalGalleri($id)
    {
        $this->db->delete('luwe_tradisional_gambar', ['id' => $id]);
    }

    public function deleteMinuman($id)
    {
        $this->db->delete('luwe_minuman', ['id' => $id]);
        $this->db->delete('luwe_oleholeh_item', ['oleholeh_id' => $id]);
        $this->db->delete('luwe_oleholeh_gambar', ['id_oleh' => $id]);
    }
    public function deleteMenuMinuman($id)
    {
        $this->db->delete('luwe_oleholeh_item', ['id' => $id]);
    }
    public function deleteMinumanGallery($id)
    {
        $this->db->delete('luwe_oleholeh_gambar', ['id' => $id]);
    }

    public function deleteOleh($id)
    {
        $this->db->delete('luwe_oleholeh', ['id' => $id]);
        $this->db->delete('luwe_oleholeh_item', ['oleholeh_id' => $id]);
        $this->db->delete('luwe_oleholeh_gambar', ['id_oleh' => $id]);
    }
    public function deleteOlehMenu($id)
    {
        $this->db->delete('luwe_oleholeh_item', ['id' => $id]);
    }
    public function deleteOlehGallery($id)
    {
        $this->db->delete('luwe_oleholeh_gambar', ['id' => $id]);
    }
    public function deleteOrder($id)
    {
        $this->db->delete('user_order', ['id_order' => $id]);
    }
}
