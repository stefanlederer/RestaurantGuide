<?php

namespace AppBundle\Entity;

/**
 * Bewertung
 */
class Bewertung
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var int
     */
    private $placesId;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var int
     */
    private $bewertungen;

    /**
     * @var string
     */
    private $kommentar;


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
     * Set userId
     *
     * @param integer $userId
     *
     * @return Bewertung
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set placesId
     *
     * @param integer $placesId
     *
     * @return Bewertung
     */
    public function setPlacesId($placesId)
    {
        $this->placesId = $placesId;

        return $this;
    }

    /**
     * Get placesId
     *
     * @return int
     */
    public function getPlacesId()
    {
        return $this->placesId;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Bewertung
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set bewertungen
     *
     * @param integer $bewertungen
     *
     * @return Bewertung
     */
    public function setBewertungen($bewertungen)
    {
        $this->bewertungen = $bewertungen;

        return $this;
    }

    /**
     * Get bewertungen
     *
     * @return int
     */
    public function getBewertungen()
    {
        return $this->bewertungen;
    }

    /**
     * Set kommentar
     *
     * @param string $kommentar
     *
     * @return Bewertung
     */
    public function setKommentar($kommentar)
    {
        $this->kommentar = $kommentar;

        return $this;
    }

    /**
     * Get kommentar
     *
     * @return string
     */
    public function getKommentar()
    {
        return $this->kommentar;
    }
}

