<?php
function stringCheck( $string ){

	$len = strlen( $string );
    if( $len%2 == 1 ){
		return false;
	}
	$last = $len-1;
	for( $i=0; $i<=($len/2)-1; $i++){
        if( ($string[$i] == '(' ) && ($string[$i+1] == ')') || (($string[$i] == '{' ) && ($string[$i+1] == '}' )) || (($string[$i] == '[' ) && ($string[$i+1] == ']' ) )){
            // $last--;
            $i++;
        }
        else if( ($string[$i] == ')' ) && ($string[$i+1] == '(') || (($string[$i] == '}' ) && ($string[$i+1] == '{' ) ) || (($string[$i] == ']' ) && ($string[$i+1] == '[' ) )){
            // $last--;
            $i++;
        }
        else if( ($string[$i] == '(' ) && ($string[$last] == ')') || ($string[$i] == ')' ) && ($string[$last] == '(' ) ){
            $last--;
        }
        else if( ($string[$i] == '{' ) && ($string[$last] == '}') || ($string[$i] == '}' ) && ($string[$last] == '{' ) ){
            $last--;
            continue;
        }
        else if( ($string[$i] == '[' ) && ($string[$last] == ']') || ($string[$i] == ']' ) && ($string[$last] == '[' ) ){
            $last--;
            continue;
        }
        else{
            return false;
        }
    }
    return true;
}

$string = "(([(){[[]())(]}]))";

$result = stringCheck($string);
if($result){
    echo 'true';
}
else{
    echo 'false';
}