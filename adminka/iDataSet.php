<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 03.03.2016
 * Time: 13:29
 */
defined('_INDEX') or die;
include_once 'Recordset.php';

class Tables
{
    public $table_name, $fields = array(), $caption, $order;
    public $result, $db, $values, $fk, $subTable=null, $browseTitle;
    public static $action, $page_code, $searchValue;
    public $searchField, $searchFieldPlaceholder;

    public function __construct($name, $title, $foreignKey, $order, $db, $browseTitle)
    {
        $this->table_name = $name;
        $this->caption = $title;
        $this->fk = $foreignKey;
        $this->order = $order;
        $this->db = $db;
        $this->browseTitle = $browseTitle;
    }

    public function addField($fieldName, $fieldType, $fieldTitle, $autoincrement, $displayedit, $displayBrowse, $booleanTitle)
    {
        $this->fields[$fieldName] = new Field($fieldName, $fieldType, $fieldTitle, $autoincrement, $displayedit, $displayBrowse, $booleanTitle);
    }

    public function addLookupField($fieldName, $lookupTableName, $lookupKeyName, $lookupCaptionName)
    {
        $this->fields[$fieldName]->isLookup = true;
        $this->fields[$fieldName]->lookupTable = $lookupTableName;
        $this->fields[$fieldName]->lookupFieldName = $lookupKeyName;
        $this->fields[$fieldName]->lookupCaptionName = $lookupCaptionName;
        $this->getLookupData($fieldName);
    }

    public function addSearchField($searchField, $placeholder)
    {
        $this->searchField = $searchField;
        $this->searchFieldPlaceholder = $placeholder;
    }

    public function addDetailTable($subTable)
    {
        $this->subTable = $subTable;
    }

    public function handle()
    {
        switch (self::$action) {
            case 'browse':
                return $this->displayBrowse();
                break;
            case 'edit':
                $method = $_SERVER['REQUEST_METHOD'];
                switch ($method) {
                    case 'POST':
                        switch($_POST['_method']){
                            case 'put':
                                $this->execEdit();
                                break;
                        }
                        return '';
                        break;
                    case 'GET':
                        //echo self::$page_code;
                        if (self::$page_code) {
                            return $this->displayEdit(self::$page_code);
                        } else {
                            return '<div class="cont admin-browse-view" style="width: 960px; margin-left: auto; margin-right: auto;"><H1>404 Not Found(</H1></div>';
                        }
                }
                break;
            case 'add':
                $method = $_SERVER['REQUEST_METHOD'];
                switch ($method) {
                    case 'POST':
                        $this->execAdd();
                        break;
                    case 'GET':
                        return $this->displayEdit(false);
                }
                break;
            case 'delete':
                if (self::$page_code) {
                    return $this->execDelete(self::$page_code);
                } else {
                    return '<div class="cont admin-browse-view" style="width: 960px; margin-left: auto; margin-right: auto;"><H1>404 Not Found(</H1></div>';
                }
            default:
                return '<div class="cont admin-browse-view" style="width: 960px; margin-left: auto; margin-right: auto;"><H1>404 Not Found(</H1></div>';
        }
    }

    public function parseUrl()
    {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($url);
        if ($_GET) {
            $v1 = explode('?', $url[1]);
            $v2 = explode('=', $v1[1]);
            if ($v2[0] == $this->searchField) {
                self::$action = $v1[0];
                self::$searchValue = $v2[1];
            }
        } else
            self::$action = $url[1];

        if ($url[2]) {
            self::$page_code = $url[2];
        }
        return self::$action;
    }


    public function displayBrowse()
    {
        if (self::$searchValue)
            $this->db->SQL($this->searchBrowseSQL());
        else
            $this->db->SQL($this->browseSql($this->table_name));
        if ($this->searchField) {
            $this->result .= '<div class="search-field-div">
                    <input name="'.$this->searchField.'" class="search-input" type="text" placeholder="'.$this->searchFieldPlaceholder.'">
                    <button id="search" class="search-btn">Пошук</button>
                    </div>';
        }
        if (self::$searchValue) {
            //$this->result .= '<h3>Поточне поняття</h3>';
        }
        $this->result .= '<table class="admin-view-table"><tr><th></th>';
        if ($this->subTable) {
            $this->result .= '<th></th>';
        }
        foreach ($this->fields as $row) {
            if ($row->displayBrowse) {
                $this->result .= '<th>' . $row->title . '</th>';
            }
        }

        while ($row = $this->db->nextRow()) {
            $i = 0;
            $this->result .= '<tr><td><a href="/'.$this->table_name.'/edit/'.$row[$this->fk].'" title="Редагувати"><img src="/images/edit.gif" </a></td>';
            if ($this->subTable) {
                $this->result .= '<td><a href="/'.$this->subTable->table_name.'/browse/?master='.$row['code'].'">'.$this->subTable->caption.'</a></td>';
            }
            foreach ($this->fields as $fld) {
                if ($fld->displayBrowse) {
                    $this->result .= "<td>" . $fld->displayBrowse($row[$i]) . "</td>";
                    $i++;
                }
            }
            $this->result .= '</tr>';
        }
        $this->result .= '</table></div></div>';
        return $this->result;
    }


    public function displayEdit($page_code)
    {
        $i = 0;
        $action = $this->table_name.'/edit/';
        $text = 'Редагувати';
        if ($page_code === false) {
            $action = $this->table_name.'/add';
            $text = 'Додати';
        }
        if ($page_code) {
            $sql = "SELECT ";
            $com = false;
            foreach ($this->fields as $fld) {
                if ($fld->displayEdit) {
                    if ($com)
                        $sql .= ',';
                    $sql .= $fld->name;
                    $com = true;
                }
            }
            $sql .= " FROM ".$this->table_name." WHERE ".$this->fk."='".$page_code."'";
            $this->db->SQL($sql);
            //$this->db->SQL("SELECT id,code,caption,intro,content,date,image,main,parentCode,isContainer,aliasOf FROM pages WHERE code=?", $page_code);//$this->editSql($page_code));
            $this->values = $this->db->nextRow();
        }
        if (!$this->values && $page_code != false) {
            return '<div class="cont admin-browse-view" style="width: 960px; margin-left: auto; margin-right: auto;"><H1>404 Not Found(</H1></div>';
        }
        $this->result .= '<div class="cont" style="width: 960px; margin-left: auto; margin-right: auto;">
                            <H1 class="page-title">'.$text.' '.$this->caption.'</H1>
                            <span id="delete-news-icon" title="Видалити сторінку"><input type="hidden" id="delete-href"
                                    value="/'.$this->table_name.'/delete/'.$page_code.'"><i class="fa fa-trash-o fa-2x" id="delete-icon"></i></span>
                            <form action="/'.$action.$page_code.'" method="post">
                            <div class="form-div"><input type="hidden" name="_method" value="put">';

        foreach ($this->fields as $row) {
            if ($row->displayEdit) {
                if ($row->isLookup) {
                    $this->getLookupData($row->name);
                }
                $this->result .= '<div class="field"><div class="label-div"><label for="' . $row->name . '">' . $row->title .
                                '</label></div><div class="field-div">' . $row->displayEdit($this->values[$i]) . '</div></div>';
                $i++;
            }
        }
        $this->result .= '<input id="exec" type="submit" value="'.$text.'"></div></form></div>';
        return $this->result;
    }

    public function execEdit()
    {
        $com = false;
        $val = 'UPDATE '.$this->table_name.' SET ';
        foreach ($this->fields as $field) {
            if ($field->displayEdit) {
                $val .= ($com) ? ',' : '';
                $val .= $field->name.'=';
                switch ($field->type) {
                    case 'boolean':
                        if($_POST[$field->name]){
                            $_POST[$field->name] = 1;
                        }else{
                            $_POST[$field->name] = 0;
                        }
                        break;
                    case 'datetime':
                        $_POST[$field->name] = date('Y-m-d H:i', strtotime($_POST[$field->name]));
                        break;
                }
                if ($_POST[$field->name] === '') {
                    $val .= 'NULL';
                } else {
                    $val .= '\''./*htmlspecialchars*/$_POST[$field->name].'\'';
                }
                $com = true;
            }
        }
        $val .= ' WHERE '.$this->fk.'=\''.self::$page_code.'\'';
        Page::$db->SQL($val);
        echo '<script>location.href = "/'.$this->table_name.'/browse"</script>';
    }

    public function execAdd()
    {
        $sql = "INSERT INTO $this->table_name(";
        $flds = '';
        $val = '';
        $com = false;
        foreach ($this->fields as $field) {
            if (!$field->autoincrement) {
                if (!$field->displayEdit) {
                    $_POST[$field->name] = self::translit($_POST['caption']);
                }
                if ($com) {
                    $flds .= ',';
                    $val .= ',';
                }
                $flds .= $field->name;
                switch ($field->type) {
                    case 'boolean':
                        if ($_POST[$field->name]) {
                            $_POST[$field->name] = 1;
                        } else {
                            $_POST[$field->name] = 0;
                        }
                        break;
                    case 'datetime':
                        $_POST[$field->name] = date('Y-m-d H:i', strtotime($_POST[$field->name]));
                        break;
                }
                if ($_POST[$field->name] === '') {
                    $val .= 'NULL';
                } else {
                    $val .= '\''./*htmlspecialchars*/$_POST[$field->name].'\'';
                }
                $com = true;
            }
        }
        $sql .= $flds.') VALUES ('.$val.')';
        $this->db->SQL($sql);
        echo '<script>location.href = "/'.$this->table_name.'/browse"</script>';
    }

    public function execDelete($page_code)
    {
        Page::$db->SQL("DELETE FROM $this->table_name WHERE $this->fk='$page_code'");
        echo '<script>location.href = "/'.$this->table_name.'/browse"</script>';
    }

    public static function translit($str) {
        $ukr = array('А', 'Б', 'В', 'Г', 'Ґ', 'Д', 'Е', 'Є', 'Ж', 'З', 'И', 'І', 'Ї', 'Й', 'К', 'Л', 'М', 'Н', 'О',
            'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ь', 'Ы', 'Э', 'Ё', 'Ъ', 'Ю', 'Я', 'а', 'б', 'в',
            'г', 'ґ', 'д', 'е', 'є', 'ж', 'з', 'и','і', 'ї', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у',
            'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ь', 'ы', 'э', 'ё', 'ъ', 'ю', 'я', '\'', ' ', '"', ':', ',', '.', '!', '?',
            '%', ')', '(', '$', '/','«','»',';','+','#','@','&','*','|','\\','~','`','{','}','[',']');
        $lat = array('a', 'b', 'v', 'h', 'g', 'd', 'e', 'ye', 'zh', 'z', 'y', 'i', 'yi', 'y', 'k', 'l', 'm', 'n',
            'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'shch', '', 'y', 'e', 'e', 'ie', 'yu', 'ya',
            'a', 'b', 'v', 'h','g', 'd', 'e', 'ye', 'zh', 'z', 'y', 'i', 'yi', 'y', 'k', 'l', 'm', 'n', 'o', 'p',
            'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'shch', '', 'y', 'e', 'e', 'ie', 'yu', 'ya', '', '-',
            '', '', '', '','','','', '','','','','','','','','','','','','','','','','','','','');
        return strtolower(str_replace($ukr, $lat, $str));
    }

    private function editSql($page)
    {
        return "SELECT id,code,caption,intro,content,date,image,main,parentCode,isContainer,aliasOf FROM pages WHERE code=".$page;
    }

    private function browseSql($table)
    {
        $flds = '';
        $comma=false;
        foreach ($this->fields as $fld) {
            if ($fld->displayBrowse) {
                if ($comma)
                    $flds.=',';
                $flds .= $fld->name;
                $comma=true;
            }
        }
        $sql = "SELECT $flds FROM $table ORDER BY $this->order desc";
        return $sql;
    }

    private function searchBrowseSQL()
    {
        $flds = '';
        $comma=false;
        foreach ($this->fields as $fld) {
            if ($fld->displayBrowse) {
                if ($comma)
                    $flds.=',';
                $flds .= $fld->name;
                $comma=true;
            }
        }
        $sql = "SELECT $flds FROM $this->table_name WHERE $this->searchField=".self::$searchValue." ORDER BY $this->order LIMIT 50";
        return $sql;
    }

    public function getLookupData($fieldName)
    {
        $sql = "SELECT ".$this->fields[$fieldName]->lookupFieldName.", ". $this->fields[$fieldName]->lookupCaptionName." FROM ".$this->fields[$fieldName]->lookupTable."";//.$this->fields[$fieldName]->lookupTable;
        $this->db->SQL($sql);
        while ($row = $this->db->nextRow()) {
            $this->fields[$fieldName]->lookupValue[$row[$this->fields[$fieldName]->lookupFieldName]] = $row;
        }
    }

    private function tableInfo($tableName)
    {
        return "SHOW COLUMNS FORM $tableName";
    }
}


class SubTable extends Tables
{
    public $table_name, $fk, $masterTable;
    public $caption, $db, $ratioField;

    public function __construct($masterTable, $tableName, $tableTitle, $foreignKey, $ratioField, $db)
    {
        $this->table_name = $tableName;
        $this->masterTable = $masterTable;
        $this->caption = $tableTitle;
        $this->fk = $foreignKey;
        $this->ratioField = $ratioField;
        $this->db = $db;
        $this->masterTable->addDetailTable($this);
    }

    public function displayBrowse()
    {
        $sql = "SELECT * FROM ".$this->table_name." WHERE ".$this->ratioField."='".$_GET['master']."'";
        $this->db->SQL($sql);

        $result = '<div class="cont admin-browse-view" style="width: 960px; margin-left: auto; margin-right: auto;">
                <span id="back-icon" title="Повернутися до всіх сторінок" style="border:1px solid black;padding:5px;border-radius:2px;display:inline-block; margin-bottom: 10px;"><a href="/'.$this->masterTable->table_name.'/browse">
                <i class="fa fa-arrow-left fa-lg"></i> </a></span>
                <br><h2>'.$this->caption.'</h2><span id="add-news-icon" title="Додати коментар"><a href="/'.$this->table_name.'/add/?master='.$_GET['master'].'">
                <i class="fa fa-plus fa-2x"></i> </a></span>
                <div class="admin-view-tabel-div"><table class="admin-view-table"><tr><th></th>';
        foreach ($this->fields as $row) {
            if ($row->displayBrowse) {
                $result .= '<th>' . $row->title . '</th>';
            }
        }
        while ($row = $this->db->nextRow()) {
            $i = 0;
            $result .= '<tr><td><a href="/'.$this->table_name.'/edit/'.$row[$this->fk].'" title="Редагувати"><img src="/images/edit.gif" </a></td>';
            foreach ($this->fields as $fld) {
                if ($fld->displayBrowse) {
                    $result .= "<td>" . $fld->displayBrowse($row[$i]) . "</td>";
                }
                $i++;
            }
            $result .= '</tr>';
        }
        $result .= '</table></div></div>';
        return $result;
    }

    public function displayEdit($page_code)
    {
        $i = 0;
        $action = $this->table_name.'/edit/';
        $text = 'Редагувати';
        if ($_GET['master']) {
            $action = $this->table_name.'/add/?master='.$_GET['master'];
            $text = 'Додати';
            $master[0] = $_GET['master'];
        } elseif ($page_code) {
            $sql = "SELECT ";
            $com = false;
            foreach ($this->fields as $fld) {
                if ($fld->displayEdit) {
                    if ($com)
                        $sql .= ',';
                    $sql .= $fld->name;
                    $com = true;
                }
            }
            $sql .= " FROM ".$this->table_name." WHERE ".$this->fk."='".$page_code."'";
            $this->db->SQL($sql);
            $this->values = $this->db->nextRow();
            $this->db->SQL("SELECT $this->ratioField FROM $this->table_name WHERE $this->fk=$page_code");
            $master = $this->db->nextRow();
        }
        if (!$this->values && $page_code != false) {
            return '<div class="cont admin-browse-view" style="width: 960px; margin-left: auto; margin-right: auto;"><H1>404 Not Found(</H1></div>';
        }
        $this->result .= '<div class="cont" style="width: 960px; margin-left: auto; margin-right: auto;">
                        <span id="back-icon" title="Повернутися до всіх сторінок" style="border:1px solid black;padding:5px;border-radius:2px;display:inline-block; margin-bottom: 10px;">
                        <a href="/'.$this->table_name.'/browse/?master='.$master[0].'"><i class="fa fa-arrow-left fa-lg"></i> </a></span>
                        <br>
                            <H1 class="page-title">'.$text.' '.$this->caption.'</H1>
                            <span id="delete-news-icon" title="Видалити сторінку"><input type="hidden" id="delete-href" value="/'.$this->table_name.'/delete/'.$page_code.'">
                            <i class="fa fa-trash-o fa-2x"></i></span>
                            <form action="/'.$action.$page_code.'" method="post">
                            <div class="form-div"><input type="hidden" name="_method" value="put">';

        if ($_GET['master']) {
            $this->result .= '<input type="hidden" name="'.$this->ratioField.'" class="edit-input" value="'.$_GET['master'].'">';
        }
        foreach ($this->fields as $row) {
            if ($row->displayEdit) {
                if ($row->isLookup) {
                    $this->getLookupData($row->name);
                }
                $this->result .= '<div class="field"><div class="label-div"><label for="' . $row->name . '">' . $row->title .
                                '</label></div><div class="field-div">' . $row->displayEdit($this->values[$i]) . '</div></div>';
                $i++;
            }

        }
        $this->result .= '<input id="exec" type="submit" value="'.$text.'"></div></form></div>';
        return $this->result;
    }


    public function execEdit()
    {
        $com = false;
        $val = 'UPDATE '.$this->table_name.' SET ';
        foreach ($this->fields as $field) {
            if ($field->displayEdit) {
                $val .= ($com) ? ',' : '';
                $val .= $field->name.'=';
                switch ($field->type) {
                    case 'boolean':
                        if ($_POST[$field->name]) {
                            $_POST[$field->name] = 1;
                        } else {
                            $_POST[$field->name] = 0;
                        }
                        break;
                    case 'datetime':
                        $_POST[$field->name] = date('Y-m-d H:i', strtotime($_POST[$field->name]));
                        break;
                }
                if ($_POST[$field->name] === '') {
                    $val .= 'NULL';
                } else {
                    $val .= '\''./*htmlspecialchars(*/$_POST[$field->name].'\'';
                }
                $com = true;
            }
        }
        $val .= ' WHERE '.$this->fk.'=\''.self::$page_code.'\'';
        Page::$db->SQL($val);
        $this->db->SQL("SELECT $this->ratioField FROM $this->table_name WHERE $this->fk=?",self::$page_code);
        $master = $this->db->nextRow();
        echo '<script>location.href = "/'.$this->table_name.'/browse/?master='.$master[0].'"</script>';
    }


    public function execAdd()
    {
        $sql = "INSERT INTO $this->table_name(";
        $flds = '';
        $val = '';
        $com = false;
        foreach ($this->fields as $field) {
            if (!$field->autoincrement) {
                if ($com) {
                    $flds .= ',';
                    $val .= ',';
                }
                $flds .= $field->name;
                switch ($field->type) {
                    case 'boolean':
                        if ($_POST[$field->name]) {
                            $_POST[$field->name] = 1;
                        } else {
                            $_POST[$field->name] = 0;
                        }
                        break;
                    case 'datetime':
                        $_POST[$field->name] = date('Y-m-d H:i', strtotime($_POST[$field->name]));
                        break;
                }
                if ($_POST[$field->name] === '') {
                    $val .= 'NULL';
                } else {
                    if ($field->name === $this->fk) {
                        $val .= $_GET['master'];
                    } else
                        $val .= '\''./*htmlspecialchars*/$_POST[$field->name].'\'';
                }
                $com = true;
            }
        }
        $sql .= $flds.') VALUES ('.$val.')';
        Page::$db->SQL($sql);
        echo '<script>location.href = "/'.$this->table_name.'/browse/?master='.$_GET['master'].'"</script>';
    }

    public function execDelete($page_code)
    {
        $this->db->SQL("SELECT $this->ratioField FROM $this->table_name WHERE $this->fk=?",$page_code);
        $master = $this->db->nextRow();
        Page::$db->SQL("DELETE FROM $this->table_name WHERE $this->fk='$page_code'");
        echo '<script>location.href = "/'.$this->table_name.'/browse/?master='.$master[0].'"</script>';
    }

}



class Field
{
    public $name, $type, $title, $autoincrement=false, $element, $displayEdit, $displayBrowse, $booleanTitle;
    public $isLookup=false, $lookupTable, $lookupFieldName, $lookupCaptionName, $lookupValue = array();

    public function __construct($name, $type, $title, $autoincrement, $displayEdit, $displayBrowse, $booleanTitle)
    {
        $this->name = $name;
        $this->type = $type;
        $this->title = $title;
        $this->autoincrement = $autoincrement;
        $this->displayEdit = $displayEdit;
        $this->displayBrowse = $displayBrowse;
        $this->booleanTitle = $booleanTitle;
    }

    public function displayBrowse($value)
    {
        switch ($this->type) {
            case 'boolean':
                if ($this->booleanTitle == 'image') {
                    if ($value == 1)
                        $this->element = '<img src="/adminka/images/green.png">';
                    else
                        $this->element = '<img src="/adminka/images/red.png">';
                } else {
                    $check = ($value == 1) ? 'checked' : "";
                    $this->element = '<input type="checkbox" disabled title="' . $this->title . '" id="browse_' . $this->name . '" ' . $check . '>';
                }
                break;
            case 'varchar':
                $this->element = '<textarea id="browse_'.$this->name.'" disabled title="'.$this->title.'">'.strip_tags(html_entity_decode($value)).'</textarea>';
                break;
            case 'text':
                //$this->element = '<div class="browse-div-text" title="'.$this->title.'">'.$value.'</div>';
                $this->element = '<span class="browse-div-text" title="'.$this->title.'">'.$value.'</span>';
                break;
            case 'lookup':
                //var_dump($this->lookupValue);
                //var_dump($this->lookupValue);
                $this->element = '<div class="browse-div-text" title="'.$this->title.'">'.$this->lookupValue[$value][$this->lookupCaptionName].'</div>';
                break;
            case 'int':
                $this->element = '<div title="'.$this->title.'">'.$value.'</div>';
                break;
            case 'datetime':
                $this->element = '<div title="'.$this->title.'">'.$this->parseDate($value).'</div>';
                break;
            case 'image':
                $this->element = '<div title="'.$this->title.'">'.$value.'</div>';
                break;
        }
        return $this->element;
    }

    public function displayEdit($value)
    {
        switch ($this->type) {
            case 'boolean':
                $check = ($value == 1) ? 'checked' : "";
                $this->element = '<input type="checkbox" name="'.$this->name.'" id="edit_'.$this->name.'" '.$check.'>';
                break;
            case 'varchar':
                $this->element = '<textarea class="ckeditor" name="'.$this->name.'" id="edit_'.$this->name.'" >'.$value.'</textarea>';
                break;
            case 'text':
                $this->element = '<input type="text" name="'.$this->name.'" class="edit-input" value="'.htmlspecialchars($value).'">';
                break;
            case 'int':
                $this->element = '<input type="number" name="'.$this->name.'" class="edit-input" value="'.$value.'">';
                break;
            case 'datetime':
                $this->element = '<input type="text" name="'.$this->name.'" id="edit_date" class="edit-input" value="'.$value.'">';
                break;
            case 'lookup':
                $this->element = '<select name="'.$this->name.'"><option selected value="'.$this->lookupValue[$value][$this->lookupFieldName].'">'
                                .$this->lookupValue[$value][$this->lookupCaptionName].'</option>';
                foreach ($this->lookupValue as $fld) {
                    if ($fld[$this->lookupCaptionName] != $this->lookupValue[$value][$this->lookupCaptionName]) {
                        $this->element .= '<option value="'.$fld[$this->lookupFieldName].'">'.$fld[$this->lookupCaptionName].'</option>';
                    }
                }
                $this->element.='</select>';
                break;
            case 'image':
                //<form action="/fileUpload.php" method="post" id="upload-form" enctype="multipart/form-data">
                $this->element = '
                                        <div class="fileform">
                                            <input type="hidden" id="hidden-image" name="'.$this->name.'" value="'.$value.'">
                                            <div id="fileformlabel">'.$value.'</div>
                                            <div class="selectbutton" >Обзор</div>
                                            <input type="file" class="add add-text form-control" accept="image/*" name="image-input" id="image">
                                        </div>';
                break;
        }
        return $this->element;
    }

    private function parseDate($inputDate)
    {
        $date = date_parse(date('Y:m:d H:i:s', strtotime($inputDate)));
        $now = date_parse(date('Y:m:d H:i:s'));
        /*echo $t = strtotime(date('Y:m:d H:i:s')) - strtotime($inputDate).'<br>';
        echo strtotime($now['year'].'-'.$now['month'].'-'.$now['day'].' 0:00:00').'<br>';
        echo strtotime($now['year'].'-'.$now['month'].'-'.$now['day'].' 0:00:00')-strtotime(date('Y:m:d H:i:s'))*(-1).'<br>';*/
        //echo strtotime($inputDate).'   -   '.strtotime(date('Y:m:d H:i:s')).'          '.strtotime('-2 days').'<br>';
        if ($date['year'] == $now['year'] && $date['month'] == $now['month'] && $date['day'] == $now['day']) {
            return "Сегодня - ".(($date['hour'] < 10)? '0'.$date['hour']:$date['hour']).':'.(($date['minute'] < 10)? '0'.$date['minute']:$date['minute']);
        } elseif ($date['year'] == $now['year'] && $date['month'] == $now['month'] && $date['day'] + 1 == $now['day']) {
            return "Вчера - ".(($date['hour'] < 10)? '0'.$date['hour']:$date['hour']).':'.(($date['minute'] < 10)? '0'.$date['minute']:$date['minute']);
        } elseif ($date['year'] == $now['year'] && $date['month'] + 1 == $now['month']) {
        } else {
            return $inputDate;
        }
    }
}