<?php
include("header.php");
include("session.php");
use Lablnet\Encryption;
use Rakit\Validation\Validator;
use Ausi\SlugGenerator\SlugGenerator;
use EasyCSRF\Exceptions\InvalidCsrfTokenException;

$id=1;

// $page = new Cms();
// $page->eq('page_id', $id)->fetch();



 $page = new Cms();
 $page->where('page_id='.$id)->fetch();

 $page = new Cms();
 $page->notnull('page_id')->orderBy('page_id desc')->fetch();
$page->title = "Title-1";
$page->content = "Content...";
$page->image = "page.png";
$page_id = $page->update();

echo "Edit Done";

 $page1 = new Cms();
 $page1->where('page_id='.$page_id)->fetch();

print_r($page1);

?>