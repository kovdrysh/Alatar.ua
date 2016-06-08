<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 09.01.2016
 * Time: 11:37
 */

//  include_once 'table.php';
include_once 'Recordset.php';
class Page{
    public static $host = "localhost";
    public static $dbname = "AlatarDB";
    public static $user = "root";
    public static $pass = "";
    public static $db;
    private $code,$caption,$content,$parentCode,$isContainer,$aliasOf,$productCode;
    private $pcaption,$ptype,$pmeasure,$pprice,$pinfo,$pimage;
    private $view='main', $filename, $title = 'ТОВ "АЛАТАР" купить пиломатериалы недорого Киев';
    public $productCategories = array(), $products = array(array());
    private $data = array(), $data1 = array(), $product_types = array();
    public $contacts = array(), $deliveries = array(), $payments = array();

    public function __construct($code, $light){
        $this->view = $code;

        if(is_array($code)){
            $this->field = $code;
        }else {
            $this->code = $code;
            // Light version of the page
            if($this->light)
                self::$db->SQL("SELECT code,caption,aliasOf FROM pages WHERE code = ?", $this->code);
            else
                self::$db->SQL("SELECT * FROM pages WHERE code = ?", $this->code);
            $this->field = self::$db->nextRow();

        }
        $this->content = $this->field['content'];
        $this->caption = $this->field['caption'];
        $this->parentCode = $this->field['parentCode'];
        $this->isContainer = $this->field['isContainer'];
        $this->aliasOf = $this->field['aliasOf'];
        $this->productCode = $this->field['productCode'];
        $this->title = $this->caption;
    }

    public function getContent(){

    if($this->isContainer === '1' ){
            if ($this->code=='contacts'){
                self::$db->SQL("SELECT * FROM map");
                array_push($this->data1, self::$db->nextRow());
            }
            elseif($this->code === 'product'){


                self::$db->SQL("SELECT caption FROM menu ORDER BY id;");
                while($row = self::$db->nextRow()) {
                    array_push($this->data, $row);

                }

                $counterX = -1;
               foreach($this->data as $row) {
                   $counterX++;
                   self::$db->SQL("SELECT * FROM products WHERE menu_type = ? ORDER BY id", $row['caption']);
                   while($row1 = self::$db->nextRow()) {
                        array_push($this->products[$counterX], $row1);
                    }
                }

            }
            elseif ($this->code === 'vacancy') {
                self::$db->SQL("SELECT * FROM vacancies");
                while($row = self::$db->nextRow())
                    array_push($this->data, $row);
            }
            elseif($this->code === 'add-product'){

                self::$db->SQL("SELECT type FROM productsTypes");
                while($row=self::$db->nextRow())
                    array_push($this->product_types, $row['type']);
            }
            elseif($this->code === 'orders'){
                self::$db->SQL("SELECT * FROM orders");
                while($row=self::$db->nextRow())
                    array_push($this->data, $row);
            }
            elseif($this->code === 'product-change'){
                if(isset($_GET['product'])){
                    self::$db->SQL("SELECT * FROM products WHERE code=?",$_GET['product']);
                    array_push($this->data, self::$db->nextRow());
                    self::$db->SQL("SELECT type FROM productsTypes");
                    while($row=self::$db->nextRow())
                        array_push($this->product_types, $row['type']);
                }
            }
        }
        else{
            $sql = "SELECT * FROM products where code = '" . $this->code . "'";
            self::$db->SQL($sql);
            $pr = self::$db->nextRow();
            if(!$pr){
                $this->view = '404';
            }
            else{
                $this->view = 'product';
                $this->pcaption = $pr['caption'];
                $this->ptype = $pr['type'];
                $this->pprice = $pr['price'];
                $this->pmeasure = $pr['measure'];
                $this->pinfo = $pr['info'];
                $this->pimage = $pr['image'];
                $this->title = $this->pcaption.' - купуйте кращі пиломатеріали в Києві';
            }
        }
        $this->filename = 'views/'.$this->view.'_view.php';
    }

    public function publish(){
        if(file_exists($this->filename)) {
            include $this->filename;
        }
    }

    public function getTitle(){
        return $this->title;
    }




}