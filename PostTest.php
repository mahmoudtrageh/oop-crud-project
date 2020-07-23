<?php

require_once('Post.php');

$p = new Post();

// select 
var_dump( $p->getPosts() );
var_dump( $p->getPostById(1) );

// insert 
$data = ['title' => 'this is the title', 'content' => 'Enjoying the PHP OOP'];
$p->addPost($data);
var_dump( $p->getPosts() );

// update 
$data = ['id' => 2, 'title' => '[UPDATED] this is the title', 'content' => 'Enjoying the PHP OOP'];
$p->updatePost($data);
var_dump( $p->getPosts() );

// delete 
$p->deletePost(1);
var_dump( $p->getPosts() );