<?php

namespace App\Models;

use Core\Model;
use PDO;
use PDOException;

class Donation extends Model {

    public static function getAll(){
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT `id_donasi`, `uang_tunai`, `bahan_makanan`, `obat` FROM `stockpile` ORDER BY `id_donasi`');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;

          }catch (PDOException $e){
            echo $e->getMessage();
          }
        }

    public static function setInfo($nama_donatur){
        try {
            $db = static::getDB();
            $tanggal_donasi = date('Y-m-d H:i:s');
            $stmt = $db->query(" INSERT INTO `donasi`(`tanggal_donasi`, `nama_donatur`, `id_donasi`) VALUES ('". $tanggal_donasi ."', '". $nama_donatur ."', DEFAULT) ");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $db->lastinsertId();
          }catch (PDOException $e){
                echo $e->getMessage();
          }
        }

    public static function setDonasi($uang_tunai,$bahan_makanan,$obat){
        try {
            $db = static::getDB();
            $stmt = $db->query(" INSERT INTO `stockpile`(`id_donasi`, `uang_tunai`, `bahan_makanan`, `obat`) VALUES (DEFAULT, '". $uang_tunai ."', '". $bahan_makanan ."', '". $obat ."'') ");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $db->lastinsertId();
          }catch (PDOException $e){
                echo $e->getMessage();
          }
        }



}
