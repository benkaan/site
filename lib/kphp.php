<?php

use function PHPSTORM_META\map;

class kphp
{
    public static function br($count)
    {
        for ($i = 0; $i < $count; $i++) {
            echo "<br>";
        }
    }

    public static function checklogin($db, $username, $userpass, $tablename, $tableuser, $tablepass)
    {
        $sql = "SELECT * FROM $tablename WHERE $tableuser = :adminname AND $tablepass = :adminpass";
        $query = $db->prepare($sql);
        $query->execute(array(
            ':adminname' => $username,
            ':adminpass' => $userpass
        ));
        return(($query->rowCount()) > 0) ? true : false;
    }
    public static function swaljson($json){echo '<script>swal(' . $json . ');</script>';}
    
    public static function swalscript($title, $text, $icon, $button)
    {
        if ($title != "" && $text == '' && $icon == '' && $button == '') {
            echo '<script>swal("' . $title . '");</script>';
        } else if ($title != "" && $text != '' && $icon == '' && $button == '') {
            echo '<script>swal("' . $title . '","' . $text . '");</script>';
        } else if ($title != "" && $text != '' && $icon != '' && $button == '') {
            echo '<script>swal("' . $title . '","' . $text . '","' . $icon . '");</script>';
        } else if ($title != "" && $text != '' && $icon != '' && $button != '') {
            echo '<script>swal("' . $title . '", "' . $text . '", "' . $icon . '", { button: "' . $button . '", });</script>';
        } else {
            echo '<script>swal("' . $title . '", "' . $text . '", "' . $icon . '", { button: "' . $button . '", });</script>';
        }
    }
}
