<?php

/**
 * This script inserts text over an image using ImageMagick library.
 * The image URL, font, and title are fetched from variables.
 * The text is drawn over the center of the image in white color.
 *
 * Script written by Catkin, BlackFox IT (https://blackfox.it/)
 * Modified by Team sanweb (sanweb.info)
 *
 */

header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('X-Content-Type-Options: nosniff');
header('X-Robots-Tag: noindex, nofollow', true);
header('Pragma: public');
header('Cache-Control: max-age=86400');
header('Expires: '. gmdate('D, d M Y H:i:s \G\M\T', time() + 86400));

// Background image location
$imageUrl = "./oglove.png";
// Path to the custom font, must be in ttf format
$font = "./font.ttf";
// Get the text from the URL link.com/?title=text

$title = '';

if(isset($_GET['title'])){
    $title = htmlspecialchars($_GET['title'], ENT_COMPAT);
}

/**
 * Inserts text over an image using ImageMagick library.
 *
 * @param string $imageUrl The URL of the image
 * @param string $font The font to be used
 * @param string $title The text to be inserted
 * @return string The path of the modified image
 */
function insertTextOverImage($imageUrl, $font, $title) {
    try {
        // Check if ImageMagick extension is installed
        if (!extension_loaded('imagick')) {
            throw new Exception("ImageMagick extension is not installed");
        }

        // Create new Imagick object
        $image = new Imagick($imageUrl);

        // Get the image dimensions
        $imageWidth = $image->getImageWidth();
        $imageHeight = $image->getImageHeight();

        // Create a new drawing object
        $draw = new ImagickDraw();

        // Set the text color to white
        $draw->setFillColor('#FFDB48');
        $draw->setTextEncoding('UTF-8');

        // Set the font size and font family, size based on the image dimensions
        $fontSize = min($imageWidth, $imageHeight) * 0.1;
        $draw->setFontSize($fontSize);
        $draw->setFont($font);

        // Set the gravity to center
        $draw->setTextAlignment(Imagick::ALIGN_CENTER);
        $draw->setGravity(Imagick::GRAVITY_CENTER);

        // Calculate the position to draw the text
        $textX = $imageWidth / 2;
        $textY = $imageHeight / 2.1;

        $textlimit = substr($title, 0, 25);

        // Draw the text on the image
        $image->annotateImage($draw, $textX, $textY, 0, $textlimit);

        // Resize the image to 1200 x 630 pixels
        $image->resizeImage(1200, 630, Imagick::FILTER_LANCZOS, 1);

        // Save the modified image
        if (preg_match('/^[a-z0-9 .\-]+$/i', $title)) {
            $outputPath = 'generated/' . sanitizeFileName($title) . '.png';
            $image->writeImage($outputPath);

            // Destroy the image objects
            $image->clear();
            $image->destroy();

            return $outputPath;
        }
    } catch (Exception $e) {
        // Log the error
        error_log("Error: " . $e->getMessage());

        return "";
    }
}

/**
 * Sanitizes a file name by removing special characters and limiting the length to 25 characters.
 *
 * @param string $fileName The file name to be sanitized
 * @return string The sanitized file name
 */
function sanitizeFileName($fileName) {
    // Remove special characters
    $sanitizedFileName = preg_replace('/[^A-Za-z0-9\-]/', '', $fileName);

    // Limit the length to 25 characters
    $sanitizedFileName = substr($sanitizedFileName, 0, 25);

    return $sanitizedFileName;
}

// Check if the generated folder exists, create it if not
if (!is_dir('generated')) {
    mkdir('generated');
}

// Check if there are any images older than 1 minute in the generated folder and delete them
$files = glob('generated/*');
foreach ($files as $file) {
    if (time() - filemtime($file) > 60) {
        unlink($file);
    }
}

// Generate the modified image and output it
$result = insertTextOverImage($imageUrl, $font, $title);
if (preg_match('/^[a-z0-9 .\-]+$/i', $title)) {
header('Content-type: image/png');
readfile($result);
} else {
    header('Content-type:application/json; charset=utf-8');
    echo '{"data": "User data missing"}';
}

?>