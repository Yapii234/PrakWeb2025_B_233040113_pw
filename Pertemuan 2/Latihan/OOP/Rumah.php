<?php
    class Rumah {
        public $warna;
        public $jumlahKamar;
        public $jumlahJendela;

        public function __construct($warna, $jumlahKamar, $jumlahJendela) {
            $this->warna = $warna;
            $this->jumlahKamar = $jumlahKamar;
            $this->jumlahJendela = $jumlahJendela;
        }
        public function kunciPintu() {
            return "Pintu rumah dikunci!";
        }
    }

    $rumahSaya     = new Rumah("Biru", 5, 3);
    $rumahTetangga = new Rumah("Kuning", 2, 6);

    echo "Warna Rumah Saya: " . $rumahSaya->warna;
    echo "<br>";
    echo "Jumlah Kamar Rumah Tetangga: " . $rumahSaya->jumlahKamar;
    echo "<br>";
    echo "Jumlah Jendela Rumah Saya: " . $rumahSaya->jumlahJendela;
    echo "<br>";
    echo $rumahSaya->kunciPintu();
?>