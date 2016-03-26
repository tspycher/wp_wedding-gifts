<?php

/**
 * Created by PhpStorm.
 * User: tspycher
 * Date: 22/03/16
 * Time: 07:21
 */
class Wedding_Gifts_Entity extends Wedding_Gifts_EntityManager {
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $picture_url;
    protected $fixprice;
    protected $url;

    const DB_NAME = 'gifts';


    /**
     * @return mixed
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param mixed $description
     *
     * @return $this
     */
    public function setDescription( $description ) {
        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFixprice() {
        return ($this->fixprice ? true : false);
    }

    /**
     * @param mixed $fixprice
     *
     * @return $this
     */
    public function setFixprice( $fixprice ) {
        $this->fixprice = ($fixprice ? true : false);
        return $this;
    }

    public function isGiftable() {
        if($this->getPrice() <= $this->getTotal()) return false;
        return true;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return $this
     */
    public function setId( $id ) {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return $this
     */
    public function setName( $name ) {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPictureUrl() {
        return $this->picture_url;
    }

    /**
     * @param mixed $picture_url
     *
     * @return $this
     */
    public function setPictureUrl( $picture_url ) {
        $this->picture_url = $picture_url;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * @param mixed $price
     *
     * @return $this
     */
    public function setPrice( $price ) {
        $this->price = $price;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * @param mixed $url
     *
     * @return $this
     */
    public function setUrl( $url ) {
        $this->url = $url;

        return $this;
    }

    private $_donations;
    public function getDonations($force = false) {
        if(!$this->_donations or $force)
            $this->_donations = Wedding_Gifts_Donation_Entity::findAll($this->getId());
        return $this->_donations;
    }

    public function getTotal() {
        return floatval(array_reduce($this->getDonations(), function($i, $obj) { return $i += $obj->getAmount(); }));
    }

    public function getPercent($round = true) {
        $x =  100 / floatval($this->getPrice()) * $this->getTotal();

        if(!$round) return $x;
        return intval(round($x,0));
    }

    static function loadFromRow($row) {
        $o = new static();
        $o
            ->setId($row->id)
            ->setName($row->name)
            ->setDescription($row->description)
            ->setPrice($row->price)
            ->setUrl($row->url)
            ->setPictureUrl($row->picture_url)
            ->setFixprice((int)$row->fixprice)
        ;
        return $o;
    }

    public function store() {
        //if(!$entity->getId()) {
        // INSERT
        // INSERT INTO `wp_dev`.`wp_weddinggifts_gifts` (`name`, `description`, `picture_url`, `price`, `fixprice`, `url`) VALUES ('Test', 'Blubb', 'Url', '10.50', '0', 'ulr');

        //} else {
        // UPDATe
        // UPDATE `wp_dev`.`wp_weddinggifts_gifts` SET `name`='Test2', `description`='Blubb2', `picture_url`='Url2', `price`='10.7', `fixprice`='1' WHERE `id`='1';

        //}
    }
}