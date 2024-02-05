<?php

$file_path = "";
$random_base64 = "";
$get_url = "";

function getName($n)
{
    $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $randomString = "";

    for ($i = 0;$i < $n;$i++)
    {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

if (isset($_GET["url"]))
{
    if (!empty($_GET["url"]))
    {
        $file_path = htmlspecialchars($_GET["url"], ENT_COMPAT);
        $random_base64 = getName(10);

        $get_url = filter_var($file_path, FILTER_SANITIZE_URL);

        if (filter_var($get_url, FILTER_VALIDATE_URL))
        {

            $image_type_check = @exif_imagetype($get_url);

            if ($image_type_check != IMAGETYPE_PNG)
            {
                header("X-Frame-Options: DENY");
                header("X-XSS-Protection: 1; mode=block");
                header("X-Content-Type-Options: nosniff");
                //header("Strict-Transport-Security: max-age=63072000");
                //header("Access-Control-Allow-Origin: *");
                //header("Access-Control-Allow-Methods: GET");
                //header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With");
                header("X-Robots-Tag: noindex, nofollow", true);
                header("Content-type:application/json; charset=utf-8");
                die(json_encode('Enter a URL with valid png file'));
            }

            header("X-Frame-Options: DENY");
            header("X-XSS-Protection: 1; mode=block");
            header("X-Content-Type-Options: nosniff");
            //header("Strict-Transport-Security: max-age=63072000");
            //header("Access-Control-Allow-Origin: *");
            //header("Access-Control-Allow-Methods: GET");
            //header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With");
            header("X-Robots-Tag: noindex, nofollow", true);
            header("Content-Description: File Transfer");
            header("Content-Type: application/octet-stream");
            header('Content-Disposition: attachment; filename="' . basename('love-sanweb-info' . $random_base64) . '.png"');
            header("Expires: 0");
            header("Pragma: public");
            header("Content-Length: " . $file_path);
            flush();
            readfile($file_path);
            exit();
        }
        else
        {
            header("X-Frame-Options: DENY");
            header("X-XSS-Protection: 1; mode=block");
            header("X-Content-Type-Options: nosniff");
            //header("Strict-Transport-Security: max-age=63072000");
            //header("Access-Control-Allow-Origin: *");
            //header("Access-Control-Allow-Methods: GET");
            //header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With");
            header("X-Robots-Tag: noindex, nofollow", true);
            header("Content-type:application/json; charset=utf-8");
            $msg["message"] = "Enter a Valid url";
            echo json_encode($msg);
        }
    }
    else
    {
        header("X-Frame-Options: DENY");
        header("X-XSS-Protection: 1; mode=block");
        header("X-Content-Type-Options: nosniff");
        //header("Strict-Transport-Security: max-age=63072000");
        //header("Access-Control-Allow-Origin: *");
        //header("Access-Control-Allow-Methods: GET");
        //header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With");
        header("X-Robots-Tag: noindex, nofollow", true);
        header("Content-type:application/json; charset=utf-8");
        $msg["message"] = "Oops! empty field detected. Please fill all the fields";
        echo json_encode($msg);
    }
}
else
{
    header("X-Frame-Options: DENY");
    header("X-XSS-Protection: 1; mode=block");
    header("X-Content-Type-Options: nosniff");
    //header("Strict-Transport-Security: max-age=63072000");
    //header("Access-Control-Allow-Origin: *");
    //header("Access-Control-Allow-Methods: GET");
    //header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With");
    header("X-Robots-Tag: noindex, nofollow", true);
    header("Content-type:application/json; charset=utf-8");
    $msg["message"] = "Please fill all the fields";
    echo json_encode($msg);
}

?>
