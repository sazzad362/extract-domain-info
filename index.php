<?php 

	function parse_url_all($url){

	    $url = substr($url,0,4)=='http'? $url: 'http://'.$url;
	    $d = parse_url($url);
	    $tmp = explode('.',$d['host']);
	    $n = count($tmp);
	    if ($n>=2){
	        if ($n==4 || ($n==3 && strlen($tmp[($n-2)])<=3)){
	            $d['domain'] = $tmp[($n-3)].".".$tmp[($n-2)].".".$tmp[($n-1)];
	            $d['domainX'] = $tmp[($n-3)];
	        } else {
	            $d['domain'] = $tmp[($n-2)].".".$tmp[($n-1)];
	            $d['domainX'] = $tmp[($n-2)];
	        }
	    }
	    return $d;
	}

	// $url = "https://sazzad362.com";
	// $url = "https://site.style2.sazzad362.com";
	// $url = "https://site.sazzad362.com";

	$domain = parse_url_all($url);

	if ($domain['domainX'] == 'style2') {
		$site_url = array_shift((explode('.', $domain['host'])));
	}elseif ($domain['domainX'] == 'sazzad362') {
		$site_url = array_shift((explode('.', $domain['host'])));
	}
	else{
		$site_url = str_replace('.','-', $domain['host']);
	}

	var_dump($site_url);

?>