<?php

/*
 *  Web app URL Routes
 */
Route::set('index.php', function(){
    HomeController::CreateView('Home');
});

Route::set('listings', function(){
    ListingsController::CreateView('Listings');
});

Route::set('contact-us', function(){
    ContactUs::CreateView('ContactUs');
});

/*
 *  API CRUD routes, redirects to ~/API/[CRUD-operation].php
 */
Route::set('create', function(){
    API::create();
});

Route::set('read', function(){
    API::read();
});
Route::set('read_single', function(){
    API::read_single();
});

Route::set('update', function(){
    API::update();
});

Route::set('delete', function(){
    API::delete();
});

?>