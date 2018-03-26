<?php

class TimeOff{

    private $id;
    private $startTime;
    private $endTime;
    private $memberId;

    function __construct($id=null, $startTime=null, $endTime=null, $memberId=null)
    {
        $this->id = $id;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->memberId = $memberId;
    }

    /**
     * @return null
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * @param null $memberId
     */
    public function setMemberId($memberId)
    {
        $this->memberId = $memberId;
    }

    /**
     * @return mixed
     */
    public function getEndTime() {
        return $this->endTime;
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
    public function getStartTime() {
        return $this->startTime;
    }

    /**
     * @param mixed $endTime
     */
    public function setEndTime($endTime) {
        $this->endTime = $endTime;
    }

    /**
     * @param null $startTime
     */
    public function setStartTime($startTime) {
        $this->startTime = $startTime;
    }

    /**
     * @param null $id
     */
    public function setId($id) {
        $this->id = $id;
    }










}


