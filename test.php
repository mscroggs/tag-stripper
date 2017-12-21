<?php

$RED = "\033[31m";
$DEFAULT = "\033[0m";

include("strip_tags.php");

function test($a,$b){
    global $RED;
    global $DEFAULT;
    if(strip_comment_tags($a)!=$b){echo($RED);}
    echo($a." -> ".strip_comment_tags($a));
    if(strip_comment_tags($a)!=$b){echo(" fail".$DEFAULT);}
    echo("\n\n");
}

test("<b>hello</b>","<b>hello</b>");
test("<b onmouseover='alert(\"hello\")'>hello</b>","<b>hello</b>");
test("<script>hello</script>","hello");
test("","");
test("<a href='javascript:alert(\"lol\")'>link</a>","<a>link</a>");
?>
