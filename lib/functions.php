<?php

// get and set $_REQUEST and def
function get($name,$def=''){
    return $_REQUEST[$name] ?? $def;
}

// Show list
function get_list(){
    $default_file = file_get_contents(LIST_SRC);
    return file(DATA_PATH.$default_file);
}

// Get doc list
function get_doc_list(){
    $doc = scandir(DATA_PATH);
    for($i=0;$i<count($doc);$i++){
        if ($doc[$i]=="."){
            unset($doc[$i]);
        }elseif($doc[$i]=="..") {
            unset($doc[$i]);
        }
    }
    return array_values($doc);
}

// update list -> save data
function update_list($id): array // Added return type ": array" here
{

    
    $lists = get_list();
    foreach ($lists as $key => $list) {
        list($_id,$_code,$_type,$_duedate,$_duetime,$_status) = explode(",",$list);
        if($_id == $id)
        {
            if(trim($_status)=="Current"){
                $_status = "Completed";
            }elseif (trim($_status)=="Completed"){
                $_status = "Current";

            }
            $lists[$key] = "$id,$_code,$_type,$_duedate,$_duetime,$_status" . PHP_EOL;
        }
    }
    return $lists;
}

// save data
function save_data($id)
{
   $list_to_save = update_list($id);

   $default_file = file_get_contents(LIST_SRC);
   file_put_contents(DATA_PATH.DIRECTORY_SEPARATOR.$default_file,implode("",$list_to_save));
}
