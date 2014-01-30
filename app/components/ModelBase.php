<?php
/**
 * User: webs
 * Date: 30.01.14
 * Time: 11:21
 * To change this template use File | Settings | File Templates.
 */

namespace Components;

class ModelBase extends \Phalcon\Mvc\Model
{
    //Имя базы данных с которой работаем, по умолчанию «db»(config/services.php) если работаем с одной бд.
    protected   $_database="db";

    public      $db;

    public function initialize()
    {
        $this->db=$this->getDI()[$this->_database];
    }

    /**
     * Указываем с какой базой данных мы будим работать
     * @param  string $name_db - имя БД
     *
     * @throws Exception
     */
    public function setDB($name_db=null)
    {
        try
        {
            if(is_null($name_db))
                throw new Exception(__METHOD__." Не задана имя базы данных");

            $this->_database=$name_db;
        }
        catch (\Exception $e)
        {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
} 