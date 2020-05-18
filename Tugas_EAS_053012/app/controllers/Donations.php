<?php

namespace App\Controllers;

use App\Models\Donation;
use Core\View;

class Donations extends \Core\Controller {

  public function indexDonation(){
    $donations = donation::getAll();

    View::renderTemplate('donation/index.html', [
      ]);
    }

  public function indexRekap(){
    $donations = donation::getAll();

    View::renderTemplate('rekap/index.html', [
      ]);
    }
  public function getDonation(){
    $nama_donatur = $_POST['nama_donatur'];
    $uang_tunai = $_POST['uang_tunai'];
    $bahan_makanan = $_POST['bahan_makanan'];
    $obat = $_POST['obat'];
}


}
