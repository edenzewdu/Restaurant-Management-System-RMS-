<?php
require 'Entity/TableEntity.php';

class TableModel {
    
    function InsertTableRecord(TableEntity $table)
    {
        require 'credentials.php';
        mysql_connect($host,$user,$password) or die(mysql_error());
        mysql_select_db($database);
        $query = sprintf("INSERT INTO tablebook(Title,FName,LName,Email,National,Country,Phone,Tbltyp,Purpose,Meal,time,date,status)VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
                mysql_real_escape_string($table->Title),
                mysql_real_escape_string($table->FName),
                mysql_real_escape_string($table->LName),
                mysql_real_escape_string($table->Email),
                mysql_real_escape_string($table->National),
                mysql_real_escape_string($table->Country),
                mysql_real_escape_string($table->Phone),
                mysql_real_escape_string($table->Tbltyp),
                mysql_real_escape_string($table->Purpose),
                mysql_real_escape_string($table->Meal),
                mysql_real_escape_string($table->time),
                mysql_real_escape_string($table->date),
                mysql_real_escape_string($table->status));
        if(mysql_query($query))
        {
            echo "<script type='text/javascript'> alert('Your Booking application has been sent')</script>";
            mysql_close();
        }
        else
        {
            echo "<script type='text/javascript'> alert('Error adding user in database')</script>";
        }
    }
}
