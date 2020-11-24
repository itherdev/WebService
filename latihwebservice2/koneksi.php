<?php
class Koneksi
{
    //DB name  ; dbcoba1
    protected $dns = "mysql:host=localhost;dbname=dbcoba1";
    protected $db_user = "root";
    protected $db_pass = "";
    protected $konek = "";

    public function getKon()
    {
        try {
            $db = new PDO($this->dns, $this->db_user, $this->db_pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if ($db === false) {
                throw new Exception("Koneksi Gagal");
            } else {
                $this->konek = $db;
            }
        } catch (Exception $e) {
            echo "Error : " . $e->getMessage();
        }
        return $this->konek;
    }

    public function closeKon()
    {
        $this->konek = null; //diskonek konek
    }
}

// Kita sekalian buat class Active record simple untuk fetch data ke DB

class ActiveRecord extends Koneksi
{
    public function fetchobject($sql)
    {
        $clone = array();
        try {
            $data = $this->getKon()->prepare($sql);
            $data->setFetchMode(PDO::FETCH_INTO, $this);
            $data->execute();
            // Karena fetch inginsbg object,
            // maka kita harus clone hasilnya
            while ($result = $data->fetch()) {
                $clone[] = clone $result;
            }
            $this->closeKon();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $clone;
    }
}
