<?php

function esAdmin()
{
    return session()->get('rol') === 'admin';
}

function estaLogueado()
{
    return session()->get('logged_in') === true;
}