<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductRegistration
 *
 * @ORM\Table(name="product_registration")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRegistrationRepository")
 */
class ProductRegistration
{
    
	
	/**
	*
	* @ORM\OneToMany(targetEntity="ProductRegistrationAttach", mappedBy="dealer_request")
	*/
	
	 
	
	private $attach_array;
	
	public function __construct() {
		$this->attach_array = new \Doctrine\Common\Collections\ArrayCollection();
	}
	
	public function getAttachArray()
	{
		return $this->attach_array;
	}
	
	
	/**
     * @var string
     *
     * @ORM\Column(name="fio", type="string", length=50, nullable=false)
     */
    private $fio;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=50, nullable=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=50, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="shop", type="string", length=100, nullable=false)
     */
    private $shop;

    /**
     * @var integer
     *
     * @ORM\Column(name="sale_date", type="integer", nullable=false)
     */
    private $saleDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="ann_id", type="integer", nullable=false)
     */
    private $annId;

    /**
     * @var string
     *
     * @ORM\Column(name="serial_number", type="string", length=50, nullable=false)
     */
    private $serialNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=50, nullable=false)
     */
    private $status = 'new';

    /**
     * @var integer
     *
     * @ORM\Column(name="datetime_add", type="integer", nullable=false)
     */
    private $datetimeAdd;

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
     * Set fio
     *
     * @param string $fio
     *
     * @return ProductRegistration
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
     * @return ProductRegistration
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
     * @return ProductRegistration
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
     * Set city
     *
     * @param string $city
     *
     * @return ProductRegistration
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
     * Set shop
     *
     * @param string $shop
     *
     * @return ProductRegistration
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
     * Set saleDate
     *
     * @param integer $saleDate
     *
     * @return ProductRegistration
     */
    public function setSaleDate($saleDate)
    {
        $this->saleDate = $saleDate;

        return $this;
    }

    /**
     * Get saleDate
     *
     * @return integer
     */
    public function getSaleDate()
    {
        return $this->saleDate;
    }

    /**
     * Set annId
     *
     * @param integer $annId
     *
     * @return ProductRegistration
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
     * Set serialNumber
     *
     * @param string $serialNumber
     *
     * @return ProductRegistration
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
     * Set status
     *
     * @param string $status
     *
     * @return ProductRegistration
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
     * Set datetimeAdd
     *
     * @param integer $datetimeAdd
     *
     * @return ProductRegistration
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
     * Set comment
     *
     * @param string $comment
     *
     * @return ProductRegistration
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

    /**
     * Add attachArray
     *
     * @param \AppBundle\Entity\ProductRegistrationAttach $attachArray
     *
     * @return ProductRegistration
     */
    public function addAttachArray(\AppBundle\Entity\ProductRegistrationAttach $attachArray)
    {
        $this->attach_array[] = $attachArray;

        return $this;
    }

    /**
     * Remove attachArray
     *
     * @param \AppBundle\Entity\ProductRegistrationAttach $attachArray
     */
    public function removeAttachArray(\AppBundle\Entity\ProductRegistrationAttach $attachArray)
    {
        $this->attach_array->removeElement($attachArray);
    }
}
