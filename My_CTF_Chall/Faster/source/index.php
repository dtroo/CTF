<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

class exploit_me
{
    public $cmd;
    public function __destruct(){
        if(strlen($this->cmd)<20){  
            if (preg_match('/[`~!@#\$%^&*\-=+,;?\'\"\[\]\{\}\\\\]|cat|ls|nl|head|less|more|tail|mv|base|grep|dir|\*|strings|sort|txt|find|print|tac|awk|\'|\"|\$|\./is',$this->cmd)){
                die('Try hard boo!!');
            }
            else {
                system($this->cmd);
            }
        }
        else {
            die('Too long!!!');
        }
    }
}

if (isset($_GET['payload'])) {
    ob_start();
    $a = unserialize($_GET['payload']);
    if ($a === False) {
        ob_end_clean();
    }
    throw new Exception('Faster faster faster');
}
else {
    show_source(__FILE__);
}

?>
