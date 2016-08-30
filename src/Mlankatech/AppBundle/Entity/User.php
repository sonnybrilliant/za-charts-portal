<?php

namespace Mlankatech\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * @ORM\Entity
 * @ORM\Table(name="USER")
 * @UniqueEntity(fields={"email"}, message="This email address is already in use, please use another email address")
 */
class User implements AdvancedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @Assert\NotBlank(message="First name is required")
     * @ORM\Column(type="string", length=100)
     */
    private $firstName;

    /**
     * @Assert\NotBlank(message="Surname is required")
     * @ORM\Column(type="string", length=100)
     */
    private $surname;

    /**
     * @Gedmo\Slug(fields={"firstName", "surname"})
     * @ORM\Column(type="string")
     */
    private $slug;

    /**
     * @Assert\NotBlank(message="Email address is required")
     * @ORM\Column(type="string")
     */
    private $email;

    /**
     * @Assert\NotBlank(message="Cell phone number is required")
     * @ORM\Column(type="string")
     */
    private $msisdn;

    /**
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * A non-persisted field
     * @Assert\NotBlank(message="Password is required", groups={"Registration"})
     * @var String
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isExpired = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isLocked = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive = true;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isCredentialsExpired = false;

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

    /**
     * @ORM\Column(type="datetime" , nullable=true)
     */
    private $lockedAt;
    /**
     * @ORM\Column(type="datetime" , nullable=true)
     */
    private $expiredAt;

    /**
     * @ORM\Column(type="json_array")
     */
    private $roles = [];

    /**
     * @ORM\ManyToOne(targetEntity="Mlankatech\AppBundle\Entity\Gender")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gender;

    /**
     * @ORM\ManyToOne(targetEntity="Mlankatech\AppBundle\Entity\Status")
     * @ORM\JoinColumn(nullable=false)
     */
    private $status;


    public function getRoles()
    {
        return $this->roles;
    }

    public function setRole($role)
    {
        $this->roles[] = $role;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function getUsername()
    {
        $this->email;
    }

    public function isAccountNonExpired()
    {
        return $this->isExpired ? false : true;
    }

    public function isAccountNonLocked()
    {
        return $this->isLocked ? false: true;
    }

    public function isCredentialsNonExpired()
    {
        return $this->isCredentialsExpired? false : true ;
    }

    public function isEnabled()
    {
        return $this->isActive;
    }

    public function getId()
    {
        return $this->id;
    }

    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getMsisdn()
    {
        return $this->msisdn;
    }

    public function setMsisdn($msisdn)
    {
        $this->msisdn = $msisdn;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
        //forces the object to look 'dirty' to Doctrine. Avoids
        //Doctrine **not** saving this entity, if only plainPassword is changed
        $this->password = null;
    }

    public function getIsExpired()
    {
        return $this->isExpired;
    }

    public function setIsExpired($isExpired)
    {
        $this->isExpired = $isExpired;
        $this->setIsActive(false);
    }

    public function getIsLocked()
    {
        return $this->isLocked;
    }

    public function setIsLocked($isLocked)
    {
        $this->isLocked = $isLocked;
        $this->setIsActive(false);
    }

    public function getIsActive()
    {
        return $this->isActive;
    }

    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        $this->setIsLocked(false);
        $this->setIsExpired(false);
        $this->setIsCredentialsExpired(false);
    }

    public function getIsCredentialsExpired()
    {
        return $this->isCredentialsExpired;
    }

    public function setIsCredentialsExpired($isCredentialsExpired)
    {
        $this->isCredentialsExpired = $isCredentialsExpired;
        $this->setIsExpired(true);
        $this->setIsActive(false);
    }

    public function getLockedAt()
    {
        return $this->lockedAt;
    }

    public function setLockedAt($lockedAt)
    {
        $this->lockedAt = $lockedAt;
    }

    public function getExpiredAt()
    {
        return $this->expiredAt;
    }

    public function setExpiredAt($expiredAt)
    {
        $this->expiredAt = $expiredAt;
    }


    public function getGender()
    {
        return $this->gender;
    }

    public function setGender(Gender $gender)
    {
        $this->gender = $gender;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
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

    public function getFullName()
    {
        return ucfirst($this->firstName).' '.ucfirst($this->surname);
    }

}