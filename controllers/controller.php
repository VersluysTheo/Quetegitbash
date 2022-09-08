<?php
require ('models/model.php');

function listAnime(){
    require 'view/readViewAnime.php';
}

function listAuteur(){
    require 'view/readViewAuteur.php';
}

function addanime(){
    require 'view/addAnime.php';
}

function addauteur(){
    require 'view/addAuteur.php';
}

function updateAnime2(){
    require 'view/updateAnime.php';
}

function updateAuteur2(){
    require 'view/updateAuteur.php';
}

function readAnime2(){
    require 'view/showAnime.php';
}

function readAuteur2(){
    require 'view/showAuteur.php';
}

function DeleteAnime(){
    require 'view/deleteAnime.php';
}

function DeleteAuteur(){
    require 'view/deleteAuteur.php';
}


function home(){
    require 'view/indexView.php';
}