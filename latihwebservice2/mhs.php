<?php
require_once "koneksi.php";

class MhsWebService
{
    protected $name;
    protected $umur;

    //Misal Kode API yang dikasih utk clinet
    protected $API = 'khss8363621';

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setUmur($umur)
    {
        $this->umur = $umur;
    }
    public function getUmur()
    {
        return $this->umur;
    }
    public function validateAPI($api)
    {
        if ($this->API !== $api)
            return false;
        return true;
    }
    
    public function getMhs()
    {
        $objAr = new ActiveRecord();
        /*Query*/
        $sql = "SELECT * FROM tbl_webservice WHERE 1=1";
        if ($this->getname()) {
            $sql .= " AND nmmhs LIKE '%{$this->getName()}%'";
        }
        if ($this->getumur()) {
            $sql .= " AND usiamhs LIKE '%{$this->getUmur()}%'";
        }
        return $objAr->fetchobject($sql);
    }
}
