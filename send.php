<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

//Declaration  ////////////////////////////////////////////////////
//Usage of Sending Mail 
define("ST_EMAIL_RECEIVE", "kwanhc@lumentech.com.hk");           //Email address of receiver
define("ST_EMAIL_SUBJECT", "Lumentech Company Limited - Customer contact information");     //Email Subject title
define("ST_SFA", "15710771" );                                //SFA no.


session_start();
$isValid = true;      //Flag to determin if the POST parameter is valid




//Start :Receive datas  ////////////////////////////////////////////////////
$returnURL = "./form.php";
$isAction =  $_POST["action"];

$data = Array();
$data["email"]                  = $_POST["email"];
$data["title"]                  = $_POST["title"];
$data["forename"]               = $_POST["forename"];
$data["surname"]                = $_POST["surname"];
$data["age"]                    = $_POST["age"];
$data["agegroup"]               = $_POST["agegroup"];
$data["gender"]                 = $_POST["gender"];
$data["channel"]                = "I";
$data["company"]                = $_POST["company"];
$data["jobTitle"]               = $_POST["jobTitle"];
$data["phoneCountryCode"]       = $_POST["phoneCountryCode"];
$data["phoneAreaCode"]          = $_POST["phoneAreaCode"];
$data["phoneNo"]                = $_POST["phoneNo"];
$data["industry"]               = $_POST["industry"];
$data["businessNature"]         = '';	//$_POST["businessNature"];
$data["companySize"]            = $_POST["companySize"];
$data["address1"]               = $_POST["address1"];
$data["address2"]               = $_POST["address2"];
$data["state"]                  = '';	//$_POST["state"];
$data["country"]                = $_POST["country"];
$data["FSA"]                    = ST_SFA; 
$data["message"]                = $_POST["message"];

$data["service"]                = $_POST["service"];
//End :Receive datas  ////////////////////////////////////////////////////



//Start :Check POST datas  ////////////////////////////////////////////////////
if( !isset( $_SESSION['tokenMaker'] ) || $_SESSION['tokenMaker'] == null || $_SESSION['tokenMaker'] == "" ) 
{
    //token is not set
    $isValid = false;
}
if(  $_POST["token"]  !=  $_SESSION['tokenMaker'] ) 
{
    //Invalid token
    $isValid = false;
}

if( !isset( $_SESSION['captcha']['code'] ) || $_SESSION['captcha']['code'] == null || $_SESSION['captcha']['code'] == "" ) 
{
    //token is not set
    $isValid = false;
}
if(  $_POST["captcha"]  !=  $_SESSION['captcha']['code'] ) 
{
    //Invalid token
    $isValid = false;
}


if(  !$isValid  )
{
    //Invalid, return back with result of email sending
    $url = $returnURL . "?s=0";
    header("Location: $url");
    exit();
}

//Reset token value to prevent from re-action to send
$_SESSION['tokenMaker'] = '';  

//Start :Check datas  ////////////////////////////////////////////////////



//Start :Send Email  ////////////////////////////////////////////////////
//Send to recipents
$from         = $data["email"];      
$to 		      = ST_EMAIL_RECEIVE;
$subject      = ST_EMAIL_SUBJECT;
$HTML = returnField("title 稱謂" , $data["title"] )
        .returnField("forename 名字" , $data["forename"] )
        .returnField("name 姓名" , $data["surname"] )
        .returnField("age 年齡" , $data["age"] )
        .returnField("agegroup 年齡組" , $data["agegroup"] )
        .returnField("gender 性別" , $data["gender"] )
        .returnField("company 公司" , $data["company"] )
        .returnField("jobTitle 職位" , $data["jobTitle"] )
        .returnField("phoneCountryCode 電話國家代碼" , $data["phoneCountryCode"] )
        .returnField("phoneAreaCode 電話區號" , $data["phoneAreaCode"] )
        .returnField("telephone 電話" , $data["phoneNo"] )
        .returnField("industry 產業" , $data["industry"] )
        .returnField("businessNature 業務範圍" , $data["businessNature"] )
        .returnField("companySize 公司規模" , $data["companySize"] )
        .returnField("address1 地址1" , $data["address1"] )
        .returnField("address2 地址2" , $data["address2"] )
        .returnField("state 州" , $data["state"] )
        .returnField("country 國家" , $data["country"] )
        .returnField("service type 服務類別" , $data["service"] )         
        ."<br><br>"
        .str_replace(    "\n",   "<br>",     returnField("message 信息" , "<br>".$data["message"] )   );

$from			= smcf_filter($from);
$isSent =  "0" ;  
if (smcf_validate_email($from)) 
{ 
		$mail_sent = sendHTMLemail(  $HTML, $from, $to, $subject  );
		$isSent = ( $mail_sent ? "1" : "0" );  
    //$isSent = "1";  
}
//End :Send Email  ////////////////////////////////////////////////////


/*
//Start :EDM  ////////////////////////////////////////////////////
$dataels = array();
foreach (array_keys($data) as $thiskey) 
{
      array_push($dataels,urlencode($thiskey) ."=". urlencode($data[$thiskey]));
}
$post = implode("&",$dataels);
$curl = curl_init("http://webwhapi.imsbiz.com/edm/read.php");
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
curl_setopt($curl, CURLOPT_VERBOSE, 1);
curl_setopt($curl, CURLOPT_PORT, 80);
$result = curl_exec($curl);
//echo $result;
//End :EDM  ////////////////////////////////////////////////////
*/


//Return Back  ////////////////////////////////////////////////////
$url = $returnURL . "?s=" . $isSent;
header("Location: $url");
exit();




////////////////////////////////////////////////////////////////////////
//                        Self defined Functions                      //
///////////////////////////////////////////////////////////////////////
//Send Html email
function sendHTMLemail($HTML,$from,$to,$subject)
{
      $headers = "From: $from\r\n"; 
      $headers .= "MIME-Version: 1.0\r\n"; 
      $boundary = sha1(uniqid("HTMLEMAIL")); 
      $headers .= "Content-Type: multipart/alternative;".
      		  "boundary = $boundary\r\n\r\n"; 
      
      $headers .= "This is a MIME encoded message.\r\n\r\n"; 
      
      $headers .= "--$boundary\r\n".
      		  "Content-Type: text/plain; charset=utf-8\r\n".
      		  "Content-Transfer-Encoding: base64\r\n\r\n"; 
      		  
      $headers .= chunk_split(base64_encode(strip_tags($HTML))); 
      $headers .= "--$boundary\r\n".
      		  "Content-Type: text/html; charset=utf-8\r\n".
      		  "Content-Transfer-Encoding: base64\r\n\r\n"; 
      		  
      $headers .= chunk_split(base64_encode($HTML)); 
      return mail(  $to,  $subject,  "",  $headers  );
}

// Remove any un-safe values to prevent email injection 
function smcf_filter($value) 
{ 
      $pattern = array("/\\n/","/\\r/","/content-type:/i","/to:/i", "/from:/i", "/cc:/i", 
                        '/(\n+)/i','/(\r+)/i','/(\t+)/i','/(%0A+)/i','/(%0D+)/i','/(%08+)/i','/(%09+)/i'); 
      $value = preg_replace($pattern, "", $value); 
      return $value; 
} 

// Validate email address format in case client-side validation "fails" 
function smcf_validate_email($email) 
{ 
      $at = strrpos($email, "@"); 
      
      // Make sure the at (@) sybmol exists and it is not the first or last character 
      if ($at && ($at < 1 || ($at + 1) == strlen($email))) 
      return false; 
      
      // Make sure there aren't multiple periods together 
      if (preg_match("/(\\.{2,})/", $email)) 
      return false; 
      
      // Break up the local and domain portions 
      $local = substr($email, 0, $at); 
      $domain = substr($email, $at + 1); 
      
      // Check lengths 
      $locLen = strlen($local); 
      $domLen = strlen($domain); 
      if ($locLen < 1 || $locLen > 64 || $domLen < 4 || $domLen > 255) 
      return false; 
      
      // Make sure local and domain don't start with or end with a period 
      if (preg_match("/(^\\.|\\.$)/", $local) || preg_match("/(^\\.|\\.$)/", $domain)) 
      return false; 
      
      // Make sure domain contains only valid characters and at least one period 
      if (!preg_match("/^[-a-zA-Z0-9\\.]*$/", $domain) || !strpos($domain, "."))
      return false;	
      
      return true; 
} 

function returnField( $fieldname, $str )
{
      return ( $str == "" ? "" : "<b>" .ucfirst($fieldname) . "</b> : " . $str ."<br>" );
}

?>