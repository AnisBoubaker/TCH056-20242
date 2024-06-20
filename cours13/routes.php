<?php

require_once __DIR__.'/router.php';

// Routes statiques
any('/', 'index.php');
any('/index.php', 'index.php');
get('/login.php', 'login.php');
post('/login.php', 'login.php');

get('/nouvelUsager.php', 'nouvelUsager.php');
post('/nouvelUsager.php', 'nouvelUsager.php');


//API
get("/api/postits", "/api/listPostits.php");
post("/api/postits", "/api/createPostit.php");


// Route introuvable
any('/404','404.php');