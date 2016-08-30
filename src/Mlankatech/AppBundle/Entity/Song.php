<?php

namespace Mlankatech\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @Gedmo\Loggable
 *
 * @ORM\Entity(repositoryClass="Mlankatech\AppBundle\Repository\SongRepository")
 * @ORM\Table(name="SONG")
 */
class Song
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
     */
    private $title;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(type="string")
     */
    private $slug;

    /**
     * @ORM\Column(type="string")
     * @Gedmo\Versioned
     */
    private $album;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Gedmo\Versioned
     */
    private $featuredArtist;

    /**
     * @ORM\ManyToOne(targetEntity="Mlankatech\AppBundle\Entity\Artist", inversedBy="songs")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $artist;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the song.")
     * @Assert\File(mimeTypes={ "audio/mpeg3", "audio/x-mpeg-3", "video/mpeg", "video/x-mpeg", "audio/mp3", "application/octet-stream","audio/mpeg" })
     */
    private $originalFile;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Mlankatech\AppBundle\Entity\Genre")
     * @ORM\JoinTable(name="SONG_GENRE_MAP",
     *     joinColumns={@ORM\JoinColumn(name="artist_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="genre_id", referencedColumnName="id")}
     * )
     *
     */
    protected $genres;

    /**
     * @ORM\ManyToOne(targetEntity="Mlankatech\AppBundle\Entity\Status")
     * @ORM\JoinColumn(nullable=false)
     * @Gedmo\Versioned
     */
    private $status;

    /**
     * @ORM\Column(type="string" ,nullable=true)
     * @Gedmo\Versioned
     */
    private $songWriter;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $isrc;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Gedmo\Versioned
     */
    private $publishedAt;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $uploadedAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPlayListed = false;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $approvedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $rejectedAt;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $rejectionReason;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function getAlbum()
    {
        return $this->album;
    }

    public function setAlbum($album)
    {
        $this->album = $album;
    }

    public function getArtist()
    {
        return $this->artist;
    }

    public function setArtist($artist)
    {
        $this->artist = $artist;
    }

    public function getGenres()
    {
        return $this->genres;
    }

    public function setGenres($genres)
    {
        $this->genres = $genres;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getSongWriter()
    {
        return $this->songWriter;
    }

    public function setSongWriter($songWriter)
    {
        $this->songWriter = $songWriter;
    }

    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

    public function getUploadedAt()
    {
        return $this->uploadedAt;
    }

    public function setUploadedAt($uploadedAt)
    {
        $this->uploadedAt = $uploadedAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public function getIsPlayListed()
    {
        return $this->isPlayListed;
    }

    public function setIsPlayListed($isPlayListed)
    {
        $this->isPlayListed = $isPlayListed;
    }

    public function getApprovedAt()
    {
        return $this->approvedAt;
    }

    public function setApprovedAt($approvedAt)
    {
        $this->approvedAt = $approvedAt;
    }

    public function getRejectedAt()
    {
        return $this->rejectedAt;
    }

    public function setRejectedAt($rejectedAt)
    {
        $this->rejectedAt = $rejectedAt;
    }

    public function getRejectionReason()
    {
        return $this->rejectionReason;
    }

    public function setRejectionReason($rejectionReason)
    {
        $this->rejectionReason = $rejectionReason;
    }

    public function getFeaturedArtist()
    {
        return $this->featuredArtist;
    }

    public function setFeaturedArtist($featuredArtist)
    {
        $this->featuredArtist = $featuredArtist;
    }

    public function getOriginalFile()
    {
        return $this->originalFile;
    }

    public function setOriginalFile($originalFile)
    {
        $this->originalFile = $originalFile;
    }

    public function getIsrc()
    {
        return $this->isrc;
    }

    public function setIsrc($isrc)
    {
        $this->isrc = $isrc;
    }

}