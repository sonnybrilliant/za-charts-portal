<?php

namespace Mlankatech\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Mlankatech\AppBundle\Repository\ArtistRepository")
 * @ORM\Table(name="ARTIST")
 * @Gedmo\Loggable
 */
class Artist
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Gedmo\Versioned
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(type="string")
     */
    private $slug;

    /**
     * @ORM\Column(type="boolean")
     * @Gedmo\Versioned
     */
    private $isBand = false;

    /**
     * @ORM\Column(type="boolean")
     * @Gedmo\Versioned
     */
    private $isLocal = false;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $website;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $region;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $gender;

    /**
     * @ORM\ManyToOne(targetEntity="Mlankatech\AppBundle\Entity\RecordLabel")
     * @ORM\JoinColumn(nullable=false)
     * @Gedmo\Versioned
     */
    private $recordLabel;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the artist image as a jpeg.")
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $artistImage;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Mlankatech\AppBundle\Entity\Genre")
     * @ORM\JoinTable(name="ARTIST_GENRE_MAP",
     *     joinColumns={@ORM\JoinColumn(name="artist_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="genre_id", referencedColumnName="id")}
     * )
     *
     */
    protected $genres;

    /**
     * @ORM\OneToMany(targetEntity="Mlankatech\AppBundle\Entity\Song", mappedBy="artist")
     * @ORM\OrderBy({"createdAt" = "DESC"})
     */
    private $songs;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    public function __toString()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getRecordLabel()
    {
        return $this->recordLabel;
    }

    public function setRecordLabel($recordLabel)
    {
        $this->recordLabel = $recordLabel;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public function getIsBand()
    {
        return $this->isBand;
    }

    public function setIsBand($isBand)
    {
        $this->isBand = $isBand;
    }

    public function getIsLocal()
    {
        return $this->isLocal;
    }

    public function setIsLocal($isLocal)
    {
        $this->isLocal = $isLocal;
    }

    public function getGenres()
    {
        return $this->genres;
    }

    public function setGenres($genres)
    {
        $this->genres = $genres;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function getSongs()
    {
        return $this->songs;
    }

    public function setSongs($songs)
    {
        $this->songs = $songs;
    }

    public function getWebsite()
    {
        return $this->website;
    }

    public function setWebsite($website)
    {
        $this->website = $website;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function setRegion($region)
    {
        $this->region = $region;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function getArtistImage()
    {
        return $this->artistImage;
    }

    public function setArtistImage($artistImage)
    {
        $this->artistImage = $artistImage;
    }




}