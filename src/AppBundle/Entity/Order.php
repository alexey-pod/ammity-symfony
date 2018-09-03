<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table(name="`order`")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrderRepository")
 */
class Order
{
    
	/**
	* @ORM\OneToMany(targetEntity="OrderAnn", mappedBy="order")
	*/
	
	private $order_ann_array;

	public function __construct()
    {
		$this->order_ann_array = new \Doctrine\Common\Collections\ArrayCollection();
    }
	
	
	
	
	
	/**
     * @var string
     *
     * @ORM\Column(name="fio", type="string", length=150, nullable=false)
     */
    private $fio;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=150, nullable=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=150, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=150, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=150, nullable=false)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=65535, nullable=false)
     */
    private $text;

    /**
     * @var integer
     *
     * @ORM\Column(name="datetime_add", type="integer", nullable=false)
     */
    private $datetimeAdd;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=150, nullable=false)
     */
    private $status = 'new';

    /**
     * @var integer
     *
     * @ORM\Column(name="sum", type="integer", nullable=false)
     */
    private $sum;

    /**
     * @var string
     *
     * @ORM\Column(name="order_code", type="string", length=150, nullable=false)
     */
    private $orderCode = '';

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
     * @return Order
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
     * Set phone
     *
     * @param string $phone
     *
     * @return Order
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
     * @return Order
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
     * Set city
     *
     * @param string $city
     *
     * @return Order
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
     * Set address
     *
     * @param string $address
     *
     * @return Order
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Order
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
     * Set datetimeAdd
     *
     * @param integer $datetimeAdd
     *
     * @return Order
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
     * @return Order
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
     * Set sum
     *
     * @param integer $sum
     *
     * @return Order
     */
    public function setSum($sum)
    {
        $this->sum = $sum;

        return $this;
    }

    /**
     * Get sum
     *
     * @return integer
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * Set orderCode
     *
     * @param string $orderCode
     *
     * @return Order
     */
    public function setOrderCode($orderCode)
    {
        $this->orderCode = $orderCode;

        return $this;
    }

    /**
     * Get orderCode
     *
     * @return string
     */
    public function getOrderCode()
    {
        return $this->orderCode;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Order
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
     * Add orderAnnArray
     *
     * @param \AppBundle\Entity\OrderAnn $orderAnnArray
     *
     * @return Order
     */
    public function addOrderAnnArray(\AppBundle\Entity\OrderAnn $orderAnnArray)
    {
        $this->order_ann_array[] = $orderAnnArray;

        return $this;
    }

    /**
     * Remove orderAnnArray
     *
     * @param \AppBundle\Entity\OrderAnn $orderAnnArray
     */
    public function removeOrderAnnArray(\AppBundle\Entity\OrderAnn $orderAnnArray)
    {
        $this->order_ann_array->removeElement($orderAnnArray);
    }

    /**
     * Get orderAnnArray
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrderAnnArray()
    {
        return $this->order_ann_array;
    }
}
