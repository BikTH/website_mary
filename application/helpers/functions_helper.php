<?php


function assets($dir){
    return base_url()."public/assets/".$dir;
}


function linkto($page = null){
    if( is_null($page) ) { return ""; }
    
    $pages = array("privacy"=> "legal/privacy/",
        "terms"=> "legal/terms"
    );
    
    if( array_key_exists($page, $pages) ){
        return base_url().$pages[$page];
    }
    
    return "";
}




if ( ! function_exists('config'))
{
	function config($item, $for = '', $attributes = array())
	{
		$item = get_instance()->config->item($item);

		if ($for !== '')
		{
			$item = '<label for="'.$for.'"'._stringify_attributes($attributes).'>'.$item.'</label>';
		}

		return $item;
	}
}




function _textarea( $str, $maxCharacter = null ){
    return is_null($maxCharacter) ? json_encode( trim( strip_tags( $str ) ) ) : json_encode( character_limiter( trim( strip_tags( $str ) ), $maxCharacter ) );
}




function _name($str, $maxCharacter = 14){
    return character_limiter( trim( str_clean( ( $str ) ) ), $maxCharacter );
}



function str_clean($string, $keepSpaces = true) {
   if( !$keepSpaces ){
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   }
   $str = preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
   return trim($str);
}
