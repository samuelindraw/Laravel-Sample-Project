<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class teskecilController extends Controller
{
    public function cekabjad()
    {
		return view('teskecil/hitungabjad', 
        [
            'title' => 'Cek abjad',
            "active" =>'abjad',
        ]);
    }
    public function hitungabjad(Request $request)
    {

        $request->validate([
            'bilangan' => 'required',
            'abj' => 'required'
        ]);

        if (isset($_POST['cek'])) {
            $hasilnya = 0;
            $bilangan = null;
            $abj = null;
            if($request->bilangan == '')
            {
                $bilangan = '';
            }
            else
            {
                $bilangan = strtoupper($request->bilangan);
            }
            if($request->abj == '')
            {
                $abj = 'A';
            }
            else
            {
                $abj = $request->abj;
            }
            $arrgabung = str_replace(' ', '', $bilangan);
            //$arraykata = (explode(" ", $arrgabung));
            $array = str_split($arrgabung);

            foreach ($array as $model) {
                if ($model == $abj) {
                    $hasilnya++;
                }
            }
            $result = array(
                'title' => 'Cek Abjad',
                'bilangan' => $request->bilangan,
                'abj' => $abj,
                'hasil' => $hasilnya,
                
            );
        } else if (isset($_POST['reset'])) {
            $result = array(
                'title' => 'Cek Abjad',
                'bilangan' => $request->bilangan,
                'abj' => $abj,
                'hasil' => $hasilnya,
            );
        }
        return view('/teskecil/hitungabjad')->with($result);
    }
    public function cekkalender()
    {
		return view('teskecil/cekkalender', 
        [
            'title' => 'Cek Kalender',
            "active" =>'kalender',
        ]);
    }
    public function validkalender(Request $request)
    {
        $request->validate([
            'bulan' => 'numeric|integer',
            'tanggal' => 'numeric|integer',
            'tahun' => 'numeric|integer'
        ]);
		if (isset($_POST["cekkalender"])) {
            $bulan = 0;
            $tanggal = 0;
            $tahun = 0;

            if ($request->tanggal == 0 || $request->tanggal < 0) {
                
                return redirect('/teskecil/cekkalender')->with('error','Maksimal Input tidak boleh 0 atau kurang dari 0');
            }

            if ($request->bulan == 0 || $request->bulan < 0) {
                return redirect('/teskecil/cekkalender')->with('error','Maksimal Input tidak boleh 0 atau kurang dari 0');
            }
            if ($request->tahun == 0 || $request->tahun < 0) {
                return redirect('/teskecil/cekkalender')->with('error','Maksimal Input tidak boleh 0 atau kurang dari 0');
            }
            if ($request->tanggal > 31 || $request->tanggal > "31" || $request->tanggal == '') {

                return redirect('/teskecil/cekkalender')->with('error','Hanya sampai tanggal 31');
            }
            if ($request->bulan > 12 || $request->bulan > "12" || $request->bulan == '') {

                return redirect('/teskecil/cekkalender')->with('error','Hanya sampai bulan 12');
            }
            $checkdate = checkdate($request->bulan,  $request->tanggal,  $request->tahun);
            if (!$checkdate) {

                if ($request->bulan == 02 || $request->bulan == 2 ) {
                    return redirect('/teskecil/cekkalender')->with('ERROR : Bulan ' . $request->bulan . 'hanya sampe tanggal 28');
                }

                return redirect('/teskecil/cekkalender')->with('ERROR : Bulan ' . $request->bulan . 'hanya sampe tanggal' . $request->tanggal - 1);
            } else {
                $hasilnya = 'VALID : TANGGAL ANDA VALID';
                $result = array(
                    'title' => 'Cek kalender',
                    'hasil' => $hasilnya,
                );
                return view('/teskecil/cekkalender')->with($result);
            }
        }
    }
    public function pisahstr()
    {
		return view('teskecil/pisahstr', 
        [
            'title' => 'Pisah String',
            "active" =>'pisahstr',
        ]);
    }
    public function cekstr(Request $request)
    {
        $request->validate([
            'kalimat' => 'required',
        ]);
        $pisahstr = explode(" ", $request->kalimat);
        $str = "";
        for ($i = 0; $i < count($pisahstr); $i++) {
            $str = $str . $pisahstr[$i] . "\n";
        }
		return view('teskecil/pisahstr', 
        [
            'title' => 'Pisahstr',
            'kalimat' => $request->kalimat,
            "hasil" => $str,
        ]);
    }
    public static function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", " ");
        $temp = "";

        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = penyebut($nilai - 10) . " belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = "";
            $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }
    public static function konversiBlkgKoma($nilai)
    {
        $hasil = "";
        $huruf = array("Nol", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan");

        for ($j = 0; $j < strlen($nilai); $j++) {
            $hasil .= $huruf[$nilai[$j]];
            if ($j != strlen($nilai) - 1) {
                $hasil .= " ";
            }
        }
        return $hasil;
    }
    public function fibonaci_proses(Request $request)
    {
        if (isset($_POST["cekiterasi"])) {
            $iterasi = $request->iterasi;
    
            $f1 = 0;
            $f2 = 1;
            $f3 = 0;
            $hasil = "";
    
            for ($i = 0; $i < $iterasi; $i++) {
                if ($i == 0) {
                    $hasil = $hasil . " " . $f2;
                } else {
                    $f3 = $f1 + $f2;
                    $hasil = $hasil . " " . $f3;
                    $f1 = $f2;
                    $f2 = $f3;
                }
            }
    
            $result = array(
                'title' => 'Deret Fibonaci',
                'iterasi' => $request->iterasi,
                'hasil' => $hasil,
            );
    
            return view('teskecil/fibonaci')->with($result);
            
        }
    }
    public function fibonaci()
    {
        return view('teskecil/fibonaci', 
        [
            'title' => 'Deret Fibonaci',
            "active" =>'fibonaci',
        ]);
    }
    public function deretangka()
    {
        return view('teskecil/deretangka', 
        [
            'title' => 'Deret Angka',
            "active" =>'deret',
        ]);
    }
    public function deretangka_proses(Request $request)
    {
        $request->validate([
            'angka' => 'numeric|integer|required'
        ]);

        $deret = "";
        $count = 1;
        for ($i = 0; $i < $request->angka; $i++) {
            for ($j = 0; $j < $request->angka; $j++) {
                $deret = $deret . $count . " ";

                if ($i % 2 == 0) {
                    if ($count != $request->angka) {
                        $count += 1;
                    }
                } else {
                    if ($count != 1) {
                        $count -= 1;
                    }
                }
            }
            $deret = $deret . "\n";
        }

        $result = array(
            'title' => 'Deret Angka',
            'angka' => $request->angka,
            'hasil' => $deret,
        );
        return view('teskecil/deretangka')->with($result);
    }
    public function counter4digit()
    {
        return view('teskecil/counter', 
        [
            'title' => 'Counter 4digit',
            "active" =>'counter',
        ]);
    }
    public function counter_proses(Request $request)
    {
        $request->validate([
            'counter' => 'numeric|integer|required',
            'nilaiawal' => 'required'
        ]);
        $counter = $request->counter;
        $nilaiawal = $request->nilaiawal;
        $deret = '';
        for ($i = 1; $i <= $counter; $i++) {
            $tampung = $deret.$nilaiawal;
            for ($j = strlen($nilaiawal) - 1; $j >= 0; $j--) {
                
                $ascii = ord($nilaiawal[$j]);// NILAI AWAL KE J YANG AKAN DI AMBIL, MISAL 0001 KLO LOOP PERTAMA JADI ANGKA 1 SAJA YANG DI AMBIL

                if ($ascii >= 48 && $ascii <= 57) {
                    if ($ascii == 57) {
                        $nilaiawal = substr_replace($nilaiawal, "A", $j, 1); // INI TERJADI KL ASCI 57 ATAU 9 NANTI DI REPLACE SESUAI J KLO LOOP KE2 BRARTI ANGKA KE 2 DARI BELAKANG
                        // YANG PERTAMA PASTI A KARENA SETELAH 9 SELANJUTNYA NILAI AWAL AKAN BERUBAH DAN I AKAN LANJUT LAGI DAN MENGULANG FOR J DARI AWAL
                        break;
                    } else {    

                        $temp = chr($ascii);
                        $temp++; // ke ++
                        $nilaiawal = substr_replace($nilaiawal, $temp, $j, 1); // SAMA AJA TAPI DIA 0 - 8 TERGANTUNG J NYA 
                        break;
                    }
                } else if ($ascii >= 65 && $ascii <= 90) { // KLO HURUF A - Z ASCII 65 - 90 
                    if ($ascii == 90) { 

                        $nilaiawal = substr_replace($nilaiawal, "0", $j, 1);

                        continue; // J ATAU LOOP KE 2 AKAN DI LANJUT KE ATAS
                    } else {
                        $ascii++;
                        $temp = chr($ascii);
                        $nilaiawal = substr_replace($nilaiawal, $temp, $j, 1); // SAMA AJA TERGANTUNG J YANG DI RUBAH TAPI YANG INI KHUSUS ANGKA
                        break;
                    }
                }
                // var_dump($initial);
               
            }
            $deret = $tampung."\n";
        }
        $result = array(
            'title' => 'Counter 4 Angka',
            'counter' => $request->counter,
            'nilaiawal' => $request->nilaiawal,
            'hasil' => $deret,
        );
        return view('teskecil/counter')->with($result);
    }
    public function bintang()
    {
        return view('teskecil/bintang', 
        [
            'title' => 'bintang pyramid',
            "active" =>'bintang',
        ]);
    }
    public function bintang_proses(Request $request)
    {
        $request->validate([
            'angka' => 'numeric|integer|required'
        ]);

        $angka = "";
        for ($i = 1; $i <= $request->angka; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                 $angka = $angka . "*";
            }
            $angka = $angka . "\n";
        }
        $angka = $angka . "\n";
 
                // // Segitiga 2
        for ($i = $request->angka - 1; $i >= 0; $i--) {
            for ($j = 0; $j < $request->angka; $j++) {
                if ($j >= $i) {
                    $angka = $angka . "*";
                } else {
                    $angka = $angka . " ";
                }
            }
            $angka = $angka . "\n";
        }
        $angka = $angka . "\n";
        // Segitiga 3
        for ($i = $request->angka - 1; $i >= 0; $i--) {
            for ($j = 0; $j < $request->angka; $j++) {
                if ($j <= $i) {
                    $angka = $angka . "*";
                } else {
                    $angka = $angka . " ";
                }
            }
            $angka = $angka . "\n";
        }
        $angka = $angka . "\n";

        // Segitiga 4
        for ($i = 0; $i < $request->angka; $i++) {
            for ($j = 0; $j < $request->angka; $j++) {
                if ($j >= $i) {
                    $angka = $angka . "*";
                } else {
                    $angka = $angka . " ";
                }
            }
            $angka = $angka . "\n";
        }
        $angka = $angka . "\n";
        $result = array(
            'title' => 'bintang pyramid',
            "active" =>'bintang',
            'angka' => $request->angka,
            'hasil' => $angka,
        );
        return view('teskecil/bintang')->with($result);
    }
    public function separator()
    {
        return view('teskecil/separator', 
        [
            'title' => 'Separator',
            "active" =>'separator',
        ]);
    }
    public function separator_proses(Request $request)
    {
        $request->validate([
            'angka' => 'numeric|integer|required'
        ]);
        $val = 0;
        $val = $request->angka;
        $hasil = self::separatorKu($val);
        $result = array(
            'title' => 'Separator',
            "active" =>'Separator',
            'angka' => $request->angka,
            'hasil' => $hasil,
        );
        return view('teskecil/separator')->with($result);
    }
    public static function separatorKu($val, $decimalPlace = 2 , $thousandSeparator=".", $decimalSeparator=",")
    {
        //masi gtw aku
        $return = "";
        $isNegative = false ;

        if(substr($val,0,1) == "-") 
        {
            $isNegative = true; // klo ada true
        }

        $val0 = str_replace("-","", $val); // cmn replace - di depan aja
        //echo $val0;
        $arr = explode(".",$val0); //memisahkan bilangan val0 kedalam array ambil data di belakang titik
        //var_dump($arr);
        //echo $arr; //haruse isine di belakang . 20121 bentuk array
        $decimal = "";
        // $crot = count($arr);
        // echo $crot;
        if(count($arr) > 1) // klo arr lebih dari 1
        {
        //arr[1] adalah decimal isi
            $decimal = substr($arr[1], 0, $decimalPlace);
        //echo $decimal; // ngambil angka di belakang titik
        }
        //var_dump($arr[0]);
        $val0 = $arr[0];
        if(strlen($val) >= 4 )
        {
            $sisa = substr($val0, 0 ,-3); // ngambil dari depan 19
            //echo $sisa."<br>";
            $return = self::separatorKu($sisa,$decimalPlace,$thousandSeparator,$decimalSeparator);
            //echo $return."<br>";
            //echo $return."<br>";
            $val1 = substr($val0, -3); // 2000
            //echo $val1;
            $return = $return. $thousandSeparator.$val1; // 19.220.200
            //echo $return;
        }
        else
        {
            $return = $val0;
        }
        //echo $isNegative.'<br>'; //true jika
        if($isNegative)
        {
         $return = "-".$return;
        }
        if($decimal > 0)
        {
            $return = $return . $decimalSeparator.$decimal;
        }
        return $return;
        //echo $return;
    }
    public function jamtambah()
    {
        return view('teskecil/jamtambah', 
        [
            'title' => 'jamtambah',
            "active" =>'jamtambah',
        ]);
    }
    public function jamtambah_proses(Request $request)
    {       
        $hariawal = $request->hari;
        $jamawal = $request->jamawal;
        $jamtambah = $request->jamtambah;
        $total = $jamawal + $jamtambah;
        //mencari total hari dari jam
        $jumhari = 0;
        $hari = 0;
        if($total >= 24)
        {
            $jumhari = round($total/24); //setelah dapet hari ne di cek sisa
            $total = $total % 24;
        
            $hariawal = $hariawal + $jumhari;
            if($hariawal >= 6)
            {
                $hariawal %= 6;
            }
        }
        if($hariawal == 0)
        {
            $harinya = "Senin";
        }
        else if($hariawal == 1)
        {
            $harinya = "Selasa";
        }
        else if($hariawal == 2)
        {
            $harinya = "Rabu";
        }
        else if($hariawal == 3)
        {
            $harinya = "Kamis";
        }
        else if($hariawal == 4)
        {
            $harinya = "Jumat";
        }
        else if($hariawal == 5)
        {
            $harinya = "Sabtu";
        }
        else if($hariawal == 6)
        {
            $harinya = "Minggu";
        }
        
        if($jumhari == 0)
        {
            if($total <= 12)
            {
               $hasil = "Menjadi hari ". $harinya. " jam ". $total . ""; 
            }else{
                $hasil  = "Menjadi hari ". $harinya. " jam ". ($total - 12) . ""; 
            }
        }
        else {
            if ($total <= 12) {
                $hasil = "Menuju hari ". $harinya. " jam ". $total . ""; 
                         
            } else {
                $hasil = "Menuju hari: " . $harinya . "  Jam: " . $jumlah_jam . " Jam: " . ($total - 12) . "";
            }
        }
        $result = array(
            'title' => 'Jam',
            "active" =>'Jam',
            'hari' =>  $request->hari,
            'jamawal' =>  $request->jamawal,
            'jamtambah' =>  $request->jamtambah,
            'hasil' => $hasil,
        );
        return view('teskecil/jamtambah')->with($result);
    }
}
