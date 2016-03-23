<?php

/**
 * Created by PhpStorm.
 * User: tspycher
 * Date: 22/03/16
 * Time: 07:21
 */
abstract class Wedding_Gifts_EntityManager {

    const DB_PREFIX = "weddinggifts_";
    const DB_NAME = null;


    static function dbname() {
        global $wpdb;
        return $wpdb->prefix . static::DB_PREFIX . static::DB_NAME;
    }

    static function find($id) {
        global $wpdb;

        $result = $wpdb->get_results(sprintf("SELECT * FROM %s where id = %s", self::dbname(), $id));
        if($result) {
            return static::loadFromRow($result[0]);
        }
        return null;
    }

    static function findAll() {
        global $wpdb;

        $result = $wpdb->get_results(sprintf("SELECT * FROM %s", self::dbname()));
        $entities = array();
        foreach($result as $row)
        {
            $entities[] = static::loadFromRow($row);
        }
        return $entities;
    }

    abstract static function loadFromRow($row);

    abstract public function store();

}