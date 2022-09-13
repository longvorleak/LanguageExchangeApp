<?php
class Manager
{
    protected function dbConnect() {
        return new PDO('mysql:host=localhost;dbname=language_exchange_app;charset=utf8', 'root', '');
    }
}
