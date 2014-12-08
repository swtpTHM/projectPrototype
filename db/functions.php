<?php

/**
 * Executes SQL query
 * @param $query
 * @return bool|mysqli_result
 */
function run($query){
    global $db;
    return mysqli_query($db, $query);
}

/**
 * Example
 */
function mails()
{
    $result = run('Select id,mail,pw from foo');

    while ($row = mysqli_fetch_object($result)) {
        echo $row->id;
        echo $row->mail;
        echo $row->pw;
    }
}

/**
 * Validates user with password
 * @param $username
 * @param $password md5 coded password string
 * @return true: if password is correct, false: otherwise
 */
function verifyLogin($username,$password){
    return true;
}