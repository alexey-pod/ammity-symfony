<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Service
 *
 * @ORM\Table(name="service")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServiceRepository")
 */
class Service
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ann_id", type="integer", nullable=false)
     */
    private $annId;

    /**
     * @var string
     *
     * @ORM\Column(name="fio", type="string", length=100, nullable=false)
     */
    private $fio;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=100, nullable=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="shop", type="string", length=150, nullable=false)
     */
    private $shop;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=65535, nullable=false)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="serial_number", type="string", length=50, nullable=false)
     */
    private $serialNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="datetime_add", type="integer", nullable=false)
     */
    private $datetimeAdd;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=50, nullable=false)
     */
    private $status = 'new';

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=false)
     */
    private $comment = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set annId
     *
     * @param integer $annId
     *
     * @return Service
     */
    public function setAnnId($annId)
    {
        $this->annId = $annId;

        return $this;
    }

    /**
     * Get annId
     *
     * @return integer
     */
    public function getAnnId()
    {
        return $this->annId;
    }

    /**
     * Set fio
     *
     * @param string $fio
     *
     * @return Service
     */
    public function setFio($fio)
    {
        $this->fio = $fio;

        return $this;
    }

    /**
     * Get fio
     *
     * @return string
     */
    public function getFio()
    {
        return $this->fio;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Service
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Service
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set shop
     *
     * @param string $shop
     *
     * @return Service
     */
    public function setShop($shop)
    {
        $this->shop = $shop;

        return $this;
    }

    /**
     * Get shop
     *
     * @return string
     */
    public function getShop()
    {
        return $this->shop;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Service
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set serialNumber
     *
     * @param string $serialNumber
     *
     * @return Service
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;

        return $this;
    }

    /**
     * Get serialNumber
     *
     * @return string
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * Set datetimeAdd
     *
     * @param integer $datetimeAdd
     *
     * @return Service
     */
    public function setDatetimeAdd($datetimeAdd)
    {
        $this->datetimeAdd = $datetimeAdd;

        return $this;
    }

    /**
     * Get datetimeAdd
     *
     * @return integer
     */
    public function getDatetimeAdd()
    {
        return $this->datetimeAdd;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Service
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Service
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
