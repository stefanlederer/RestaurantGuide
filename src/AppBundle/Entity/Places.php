<?php

namespace AppBundle\Entity;

/**
 * Places
 */
class Places
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $street;

    /**
     * @var int
     */
    private $streetnumber;

    /**
     * @var int
     */
    private $plz;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $north;

    /**
     * @var string
     */
    private $east;


    /**
     * @var string
     */
    private $image;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Places
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return Places
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set streetnumber
     *
     * @param integer $streetnumber
     *
     * @return Places
     */
    public function setStreetnumber($streetnumber)
    {
        $this->streetnumber = $streetnumber;

        return $this;
    }

    /**
     * Get streetnumber
     *
     * @return int
     */
    public function getStreetnumber()
    {
        return $this->streetnumber;
    }

    /**
     * Set plz
     *
     * @param integer $plz
     *
     * @return Places
     */
    public function setPlz($plz)
    {
        $this->plz = $plz;

        return $this;
    }

    /**
     * Get plz
     *
     * @return int
     */
    public function getPlz()
    {
        return $this->plz;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Places
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set north
     *
     * @param string $north
     *
     * @return Places
     */
    public function setNorth($north)
    {
        $this->north = $north;

        return $this;
    }

    /**
     * Get north
     *
     * @return string
     */
    public function getNorth()
    {
        return $this->north;
    }

    /**
     * Set east
     *
     * @param string $east
     *
     * @return Places
     */
    public function setEast($east)
    {
        $this->east = $east;

        return $this;
    }

    /**
     * Get east
     *
     * @return string
     */
    public function getEast()
    {
        return $this->east;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getImage() {
        return $this->image;
    }
}

