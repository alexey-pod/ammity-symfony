<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DealerRequest
 *
 * @ORM\Table(name="dealer_request")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DealerRequestRepository")
 */
class DealerRequest
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=250, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="fio", type="string", length=250, nullable=false)
     */
    private $fio;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=250, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=250, nullable=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="site", type="string", length=50, nullable=false)
     */
    private $site;

    /**
     * @var string
     *
     * @ORM\Column(name="service_center", type="string", nullable=false)
     */
    private $serviceCenter = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="customer_base", type="string", nullable=false)
     */
    private $customerBase = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="add_datetime", type="integer", nullable=false)
     */
    private $addDatetime;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text", length=65535, nullable=false)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=false)
     */
    private $comment = '';

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", nullable=false)
     */
    private $status = 'new';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return DealerRequest
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
     * Set fio
     *
     * @param string $fio
     *
     * @return DealerRequest
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
     * Set city
     *
     * @param string $city
     *
     * @return DealerRequest
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
     * Set phone
     *
     * @param string $phone
     *
     * @return DealerRequest
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
     * Set email
     *
     * @param string $email
     *
     * @return DealerRequest
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
     * Set site
     *
     * @param string $site
     *
     * @return DealerRequest
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set serviceCenter
     *
     * @param string $serviceCenter
     *
     * @return DealerRequest
     */
    public function setServiceCenter($serviceCenter)
    {
        $this->serviceCenter = $serviceCenter;

        return $this;
    }

    /**
     * Get serviceCenter
     *
     * @return string
     */
    public function getServiceCenter()
    {
        return $this->serviceCenter;
    }

    /**
     * Set customerBase
     *
     * @param string $customerBase
     *
     * @return DealerRequest
     */
    public function setCustomerBase($customerBase)
    {
        $this->customerBase = $customerBase;

        return $this;
    }

    /**
     * Get customerBase
     *
     * @return string
     */
    public function getCustomerBase()
    {
        return $this->customerBase;
    }

    /**
     * Set addDatetime
     *
     * @param integer $addDatetime
     *
     * @return DealerRequest
     */
    public function setAddDatetime($addDatetime)
    {
        $this->addDatetime = $addDatetime;

        return $this;
    }

    /**
     * Get addDatetime
     *
     * @return integer
     */
    public function getAddDatetime()
    {
        return $this->addDatetime;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return DealerRequest
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return DealerRequest
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
     * Set status
     *
     * @param string $status
     *
     * @return DealerRequest
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
