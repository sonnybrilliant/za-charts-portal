<?php

namespace Mlankatech\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="RADIO_STATION_STREAM")
 */
class RadioStationStream
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $streamId;

    /**
     * @ORM\ManyToOne(targetEntity="Mlankatech\AppBundle\Entity\RadioStation")
     * @ORM\JoinColumn(nullable=false)
     *
     */
    private $radioStation;

    /**
     * @ORM\Column(type="string")
     */
    private $version;

    /**
     * @ORM\Column(type="string")
     */
    private $artist;

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     */
    private $duration;

    /**
     * @ORM\Column(type="string")
     */
    private $album;

    /**
     * @ORM\Column(type="string")
     */
    private $label;

    /**
     * @ORM\Column(type="date")
     */
    private $releaseAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $playedAt;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $isrc;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $upc;

    /**
     * @ORM\Column(type="string")
     */
    private $acrid;

    /**
     * @ORM\Column(type="json_array")
     */
    private $data;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getStreamId()
    {
        return $this->streamId;
    }

    public function setStreamId($streamId)
    {
        $this->streamId = $streamId;
    }

    public function getRadioStation()
    {
        return $this->radioStation;
    }

    public function setRadioStation($radioStation)
    {
        $this->radioStation = $radioStation;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function setVersion($version)
    {
        $this->version = $version;
    }

    public function getArtist()
    {
        return $this->artist;
    }

    public function setArtist($artist)
    {
        $this->artist = $artist;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    public function getAlbum()
    {
        return $this->album;
    }

    public function setAlbum($album)
    {
        $this->album = $album;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label)
    {
        $this->label = $label;
    }

    public function getReleaseAt()
    {
        return $this->releaseAt;
    }

    public function setReleaseAt($releaseAt)
    {
        $this->releaseAt = $releaseAt;
    }

    public function getPlayedAt()
    {
        return $this->playedAt;
    }

    public function setPlayedAt($playedAt)
    {
        $this->playedAt = $playedAt;
    }

    public function getIsrc()
    {
        return $this->isrc;
    }

    public function setIsrc($isrc)
    {
        $this->isrc = $isrc;
    }

    public function getUpc()
    {
        return $this->upc;
    }

    public function setUpc($upc)
    {
        $this->upc = $upc;
    }

    public function getAcrid()
    {
        return $this->acrid;
    }

    public function setAcrid($acrid)
    {
        $this->acrid = $acrid;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
}