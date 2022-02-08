<?php
define("CONST_BASE1DIR",dirname(dirname(__FILE__)));
define('CONST_VENDOR_FOLDER',CONST_BASE1DIR.'/vendor');


require_once CONST_VENDOR_FOLDER.'\autoload.php';
require_once 'autoload.php' ;

class Uploader {

public function uploadimagefile($filename){

$now=date('Y-m-d H:i:s');
$ts_8pm=strtotime($now);
$upload = new \Delight\FileUpload\FileUpload();
$absDirName =   dirname(dirname(__FILE__)).'/uploads';
$upload->withTargetDirectory($absDirName);
$upload->withMaximumSizeInMegabytes(2);
$upload->withAllowedExtensions([ 'jpeg', 'jpg', 'png', 'gif' ]);
$upload->withTargetFilename($slug.$ts_8pm);
$upload->from($filename);

try {
    $uploadedFile = $upload->save();
    $avatar=$uploadedFile->getFilename();
    $extn=$uploadedFile->getExtension();
    $logo=$avatar.'.'.$extn;
    return $logo;

    // success

    // $uploadedFile->getFilenameWithExtension()
    // $uploadedFile->getFilename()
  
   // echo  $uploadedFile->getDirectory();
  // echo  $uploadedFile->getPath();
  // echo  $uploadedFile->getCanonicalPath();
}
catch (\Delight\FileUpload\Throwable\InputNotFoundException $e) {
     $message  =   new Message('No File Input','error');
    $message->setMessage();
    return false;
}
catch (\Delight\FileUpload\Throwable\InvalidFilenameException $e) {
     $message  =   new Message('Filename is Invalid','error');
    $message->setMessage();
    return false;
}
catch (\Delight\FileUpload\Throwable\InvalidExtensionException $e) {
    $message  =   new Message('Extension not permitted','error');
    $message->setMessage();
    return false;
}
catch (\Delight\FileUpload\Throwable\FileTooLargeException $e) {
     $message  =   new Message('File Too Large','error');
    $message->setMessage();
    return false;
}
catch (\Delight\FileUpload\Throwable\UploadCancelledException $e) {
    $message  =   new Message('File Upload Cancelled','error');
    $message->setMessage();
    return false;
}



}



}

?>