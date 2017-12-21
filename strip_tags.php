<?php

$allowed_tags = Array("a", "b", "br", "em", "i", "li", "ol", "s", "u", "ul", "spoiler", "small", "sup", "sub");
$allowed_attr = Array("href");
function replace_open_tag($tag){
    global $allowed_tags;
    global $allowed_attr;
    $tsp = explode(" ",$tag[1]);
    if(!in_array($tsp[0],$allowed_tags)){return "";}
    $out = "<".$tsp[0];
    foreach($tsp as $i=>$attr){if($i>0){
        $attr_s = explode("=",$attr);
        if(in_array($attr_s[0],$allowed_attr) && strpos($attr,"javascript:")===false){
            $out .= " ".$attr;
        }
    }}
    $out .= ">";
    return $out;
}

function replace_close_tag($tag){
    global $allowed_tags;
    $tsp = explode(" ",$tag[1]);
    if(!in_array($tsp[0],$allowed_tags)){return "";}
    return "</".$tsp[0].">";
}

function strip_comment_tags($txt){

    $txt = preg_replace_callback("/<([^\/][^>]*)>/","replace_open_tag",$txt);
    $txt = preg_replace_callback("/<\/([^>]+)>/","replace_close_tag",$txt);

    return $txt;
}

?>
