<?php
date_default_timezone_set("Asia/Kolkata");
require_once('functions.php');

$first_name  = get_field('firstname');
$last_name  = get_field('lastname');
$phone      = get_field('phone');
$email      = get_field('email');
$leadutmsource   = get_field('USOURCE');
 $leadutmmedium   = get_field('UMEDIUM');
$leadutmcampaign = get_field('UCAMPAIGN');
$leadutmcontent  = get_field('UCONTENT');
$leadutmterm     = get_field('UTERM');
$property     = get_field('property');

if($leadutmsource=="")
{
	$leadutmsource="Direct";
}
else
{
	$leadutmsource=$leadutmsource;
}

if($leadutmmedium=="")
{
	$leadutmmedium ="Web";
}
else
{
	$leadutmmedium=$leadutmmedium ;
}

if($leadutmcampaign=="")
{
	$leadutmcampaign  ="Maruthirudra Constructions";
}
else
{
	$leadutmcampaign=$leadutmcampaign ;
}
if($leadutmterm=="")
{
	$leadutmterm  ="NA";
}
else
{
	$leadutmterm=$leadutmterm ;
}
if($leadutmcontent=="")
{
	$leadutmcontent  ="NA";
}
else
{
	$leadutmcontent=$leadutmcontent ;
}

$date 			= date('Y-m-d H:i:s', time());
$post_dump		= $_POST;
$post_dump 		= json_encode($post_dump);
$post_dump 		= $post_dump;
$form_page 		= get_form_page_url();

$type = "Maruthirudra Constructions | New Enquiry";



$ip = $_SERVER['REMOTE_ADDR'];
$page_url = $form_page;





/******** CURL method for Leadstore *********/ 		
$input_params=array(				
	'firstname'=> $first_name,
	'email'=> $email,
	'phone'=> $phone,
	'udf1'=> "lastname:".$last_name,
	'udf2'=> '',
	'udf3'=>'',
	'udf4'=>'',	
	'udf5'=>'',	
	'udf6'=>'',							
	'udf7'=>'',
	'udf8'=>'',
	'udf9'=>'',
	'udf10'=>'',																					
	'ua_ip'=> $ip,
	'ua_device'=> '',
	'ua_query_url'=> $page_url,
	'landing_page_title'=> $type,
	'utm_source'=> $leadutmsource,
	'utm_medium'=> $leadutmmedium,
	'utm_campaign'=> $leadutmcampaign,
	'utm_content'=> $leadutmcontent,
	'utm_term'=> $leadutmterm,
	'ua_city'=>'',
	'ua_country'=>'',
	'form_data'=> $post_dump,
);	
// $fields = $input_params;
// $postvars = '';
//     foreach($fields as $key=>$value) {
//         $postvars .= $key . "=" . $value . "&";
//     }
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL,"https://leadstore.in/capture_leads/capture/70");
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS,$postvars);
// // in real life you should use something like:
// // curl_setopt($ch, CURLOPT_POSTFIELDS, 
// //http_build_query(array('postvar1' => 'value1')));
// // receive server response ...
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $server_output = curl_exec ($ch);
// curl_close ($ch);  
/****************End CURL CALL**********************/

/******** Clove CRM API Integration *********/ 
// error_log("Clove API Call Start ");
// include_once('../../api.php');  
// error_log("Clove API Call End ");
/******** End API *********/ 

ob_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Maruthirudra Constructions</title>
</head>

<body
    style="font-family:Arial, sans-serif;font-size:13px;color:#000;background: #f4f4f4;line-height:1.5;padding: 30px;">
    <div
        style="background: #fff;max-width:550px;display: block;margin: 15px auto;padding: 30px;border-bottom: 6px solid #3D6435;">
        <img src="./img/logo,png"
            alt="Maruthirudra Constructions" title="Maruthirudra Constructions" width="90" style="display: block;margin-bottom:9px;">

        <h1 style="font-size: 21px;display:block;margin-bottom: 0;">New Enquiry<br></h1>
        <p style="font-size: 15px;font-weight: bold;margin: 0;">Origin: <a
                href="<?php echo $page_url; ?>"><?php echo $page_url; ?></a></p>

        <div style="font-size: 13px;color: #333;display:block;margin: 15px 0 15px;max-width:360px;">
            <p style="font-size: 12px; color: #888;margin: 0 0 6px;"><?php echo date('M d, Y', strtotime($date)); ?></p>
            <p style="margin: 0 0 6px;"><strong>Name: </strong><?php echo ucwords($first_name); ?> <?php echo ucwords($last_name); ?></p>
            <p style="margin: 0 0 6px;"><strong>Email: </strong><?php echo $email; ?></p>
            <p style="margin: 0 0 6px;"><strong>Phone: </strong><?php echo $phone; ?></p>
            <p style="margin: 0 0 6px;"><strong>Message: </strong><?php echo $message; ?></p>

        </div>

        <p style="margin-bottom: 0px;">Thanks,<br><strong>Admin</strong></p>
    </div>
</body>

</html>
<?php
$email_message = ob_get_clean();
$subject = 'New Lead - ' . ucwords($type);

require_once('emails_list_testing.php');

send_email($from, $from_name, $to, $to_name, $subject, $email_message, '', $cc_emails, $bcc_emails);

ob_start();
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <!--[if !mso]><!-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You | Maruthirudra Constructions</title>
    <!--[if (gte mso 9)|(IE)]>
    <style type="text/css">
        table {border-collapse: collapse;}
    </style>
    <![endif]-->
    <style type="text/css">
    /* Basics */
    body {
        margin: 0 !important;
        padding: 0;
        background-color: #ffffff;
    }

    table {
        border-spacing: 0;
        font-family: sans-serif;
        color: #333333;
    }

    td {
        padding: 0;
    }

    img {
        border: 0;
    }

    div[style*="margin: 16px 0"] {
        margin: 0 !important;
    }

    .wrapper {
        width: 100%;
        table-layout: fixed;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
    }

    .webkit {
        max-width: 600px;
        margin: 0 auto;
    }

    .outer {
        Margin: 0 auto;
        width: 100%;
        max-width: 600px;
    }


    /* End of Basics */

    /* Media Queries */

    @media screen and (max-width: 400px) {

        .two-column .column,
        .three-column .column {
            max-width: 100% !important;
        }

        .two-column img {
            max-width: 100% !important;
        }

        .three-column img {
            max-width: 50% !important;
        }
    }

    @media screen and (min-width: 401px) and (max-width: 620px) {
        .three-column .column {
            max-width: 33% !important;
        }

        .two-column .column {
            max-width: 50% !important;
        }
    }

    /* End of Media Queries
      
/* Mailer Styles */

    .full-width-image img {
        width: 100%;
        max-width: 600px;
        height: auto;
    }

    .inner {
        padding: 10px;
    }

    p {
        Margin: 0;
    }

    a {
        color: #ee6a56;
        text-decoration: underline;
    }

    .h1 {
        color: #665744;
        font-size: 15px !important;
        font-weight: bold;
        Margin-bottom: 18px;
    }

    .h2 {
        font-size: 18px;
        font-weight: bold;
        Margin-bottom: 12px;
    }

    /* One column layout */

    .one-column .contents {
        text-align: left;
    }

    .one-column p {
        font-size: 16px;
        line-height: 135%;
        Margin-bottom: 10px;
    }

    /* End of One column layout */

    /* Two column layout */

    .two-column {
        text-align: center;
        font-size: 0;
    }

    .two-column .column {
        width: 100%;
        max-width: 300px;
        display: inline-block;
        vertical-align: top;
    }

    .contents {
        width: 100%;
    }

    .two-column .contents {
        font-size: 14px;
        text-align: left;
    }

    .two-column img {
        width: 100%;
        max-width: 280px;
        height: auto;
    }

    .two-column .text {
        padding-top: 10px;
    }

    /* End of Two column layout */

    /* End of Mailer Styles */
    </style>
</head>

<body>
    <center class="wrapper">
        <div class="webkit">
            <!--[if (gte mso 9)|(IE)]>
         <table width="600" align="center">
            <tr>
               <td>
               <![endif]-->
            <table class="outer" align="center">
                <!---FULL WIDTH COLUMN LAYOUT-->
                <tr>
                    <td class="" bgcolor="#E2DACC">
                        <img src="./img/logo.png"
                            alt="Maruthirudra Constructions" title="Maruthirudra Constructions" width="90"
                            style="display: block;margin-bottom:9px;">

                    </td>
                </tr>
                <tr>
                    <td class="one-column">
                        <table width="100%">
                            <tr>
                                <td class="inner contents"
                                    style="text-align:left;background-image: url('https://imgur.com/N2HK4eZ.jpg')"
                                    bgcolor="#ede7d9">
                                    <p>Hello <strong><?php echo ucwords($full_name); ?> <?php echo ucwords($last_name); ?></strong>,</p>
                                    <p></p>
                                    <p>Thank you for reaching out to us.</p>
                                    <p>We recevied your details. we will get back to you soon</p>
                                    <p>Regards<br />Maruthirudra Constructions</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>
            <!--[if (gte mso 9)|(IE)]>
               </td>
            </tr>
         </table>
         <![endif]-->
        </div>
    </center>
</body>

</html>
<?php
$fre_email_message = ob_get_clean();
$subject = 'New Lead - ' . ucwords($type);
require_once('emails_list_testing.php');
send_email($from, $from_name, $email, ucwords($full_name), 'Thank You', $fre_email_message, '', NULL, NULL);
header("Location:thank-you.html");
exit();
?>
