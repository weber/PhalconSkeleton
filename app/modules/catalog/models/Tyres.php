<?php
/**
 * User: webs
 * Date: 29.01.14
 * Time: 14:09
 * To change this template use File | Settings | File Templates.
 */
namespace Modules\Catalog\Models;


class Tyres extends \Components\ModelBase
{
    /**
     * Подключаемся к нужной базе(если БД несколько в противном случаи метод initialize() не указываем )
     * @param string $className
     */
    public  function initialize($className=__CLASS__)
    {
        $this->setDB('dbtyres');
        parent::initialize($className);

    }


    public function  my()
    {
        return $this->db->fetchAll("SELECT * FROM model LIMIT 10");
    }
} 