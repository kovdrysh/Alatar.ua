<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 09.01.2016
 * Time: 11:37
 */

include_once 'Recordset.php';
class Page{
    public static $db;
    public static $languagePrefix, $local_const;
    private $code,$caption,$content,$parentCode,$isContainer,$aliasOf,$productCode;
    private $pcaption,$ptype,$pmeasure,$pprice,$pinfo,$pimage;
    private $view='main', $filename, $title = 'ТОВ "АЛАТАР" купить пиломатериалы недорого Киев';
    public $productCategories = array(), $products = array();
    private $data = array(), $data1 = array(), $product_types = array();
    public $contacts = array(), $deliveries = array(), $payments = array();
    public $notFound=false;

    public function __construct($code){
        $this->view = $code;
        if(is_array($code)){
            $this->field = $code;
        }else {
            $this->code = $code;
            $sql = "SELECT * FROM pages".self::$languagePrefix." WHERE code = '".$this->code."'";
            self::$db->SQL($sql);
            $this->field = self::$db->nextRow();
            if(!$this->field){
                $this->notFound = true;
                $this->view = '404';
            }
        }
        $this->content = $this->field['content'];
        $this->caption = $this->field['caption'];
        $this->isContainer = $this->field['isContainer'];
        $this->title = $this->caption;
    }

    public function getContent(){
        if(!$this->notFound) {
            if ($this->isContainer === '1') {
                if ($this->code == 'contacts') {
                    self::$db->SQL("SELECT * FROM map");
                    array_push($this->data1, self::$db->nextRow());
                } elseif ($this->code === 'product') {
                    $sql = "SELECT caption FROM menu".self::$languagePrefix." ORDER BY id;";
                    self::$db->SQL($sql);
                    while ($row = self::$db->nextRow()) {
                        array_push($this->data, $row);
                    }
                    foreach ($this->data as $row) {
                        $ar = array();
                        $sql = "SELECT * FROM products".self::$languagePrefix." WHERE menu_type = '". $row['caption']."' ORDER BY id";
                        self::$db->SQL($sql);
                        while ($row1 = self::$db->nextRow()) {
                            array_push($ar, $row1);
                        }
                        array_push($this->products, $ar);
                    }
                } elseif ($this->code === 'vacancy') {
                    $sql = "SELECT * FROM vacancies".self::$languagePrefix;
                    self::$db->SQL($sql);
                    while ($row = self::$db->nextRow())
                        array_push($this->data, $row);
                } elseif ($this->code === 'orders') {
                    self::$db->SQL("SELECT * FROM orders");
                    while ($row = self::$db->nextRow())
                        array_push($this->data, $row);

                }
            } else {
                $sql = "SELECT * FROM products".self::$languagePrefix." where code = '" . $this->code . "'";
                self::$db->SQL($sql);
                $pr = self::$db->nextRow();
                if (!$pr) {
                    $this->view = '404';
                } else {
                    $this->view = 'product';
                    $this->pcaption = $pr['caption'];
                    $this->ptype = $pr['type'];
                    $this->pprice = $pr['price'];
                    $this->pmeasure = $pr['measure'];
                    $this->pinfo = $pr['info'];
                    $this->pimage = $pr['image'];
                    $this->title = $this->pcaption . ' - купуйте кращі пиломатеріали в Києві';
                }
            }
        }else
            $this->view = '404';
        $this->filename = 'views/'.$this->view.'_view.php';
    }

    public function publish(){
        if(file_exists($this->filename)) {
            include $this->filename;
        }
        else{
            include 'views/404_view.php';
        }
    }

    public function getTitle(){
        return $this->title;
    }




}