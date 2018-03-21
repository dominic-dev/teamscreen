<?php

class Timeoff{

    private $id;
    private $starttime;
    private $endtime;

    function __construct($id=null, $starttime=null, $endtime)
    {
        $this->id = $id;
        $this->starttime = $starttime;
        $this->endtime = $endtime;
    }


    /**
     * @return mixed
     */
    public function getEndtime() {
        return $this->endtime;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getStarttime() {
        return $this->starttime;
    }

    /**
     * @param mixed $endtime
     */
    public function setEndtime($endtime) {
        $this->endtime = $endtime;
    }

    /**
     * @param null $starttime
     */
    public function setStarttime($starttime) {
        $this->starttime = $starttime;
    }

    /**
     * @param null $id
     */
    public function setId($id) {
        $this->id = $id;
    }










}


