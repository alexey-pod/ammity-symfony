<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductRegistrationAttach
 *
 * @ORM\Table(name="product_registration_attach")
 * @ORM\Entity
 */
class ProductRegistrationAttach
{
    
	/**
	*
	* @ORM\ManyToOne(targetEntity="ProductRegistration", inversedBy="attach_array")
	* @ORM\JoinColumn(name="dealer_request_id", referencedColumnName="id")
	*/
	
	 protected $dealer_request;
	
	   
	
	/**
     * @var integer
     *
     * @ORM\Column(name="dealer_request_id", type="integer", nullable=false)
     */
    private $dealerRequestId;

    /**
     * @var integer
     *
     * @ORM\Column(name="file_id", type="integer", nullable=false)
     */
    private $fileId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort", type="integer", nullable=false)
     */
    private $sort;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set dealerRequestId
     *
     * @param integer $dealerRequestId
     *
     * @return ProductRegistrationAttach
     */
    public function setDealerRequestId($dealerRequestId)
    {
        $this->dealerRequestId = $dealerRequestId;

        return $this;
    }

    /**
     * Get dealerRequestId
     *
     * @return integer
     */
    public function getDealerRequestId()
    {
        return $this->dealerRequestId;
    }

    /**
     * Set fileId
     *
     * @param integer $fileId
     *
     * @return ProductRegistrationAttach
     */
    public function setFileId($fileId)
    {
        $this->fileId = $fileId;

        return $this;
    }

    /**
     * Get fileId
     *
     * @return integer
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * Set sort
     *
     * @param integer $sort
     *
     * @return ProductRegistrationAttach
     */
    public function setSort($sort)
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * Get sort
     *
     * @return integer
     */
    public function getSort()
    {
        return $this->sort;
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
     * Set dealerRequest
     *
     * @param \AppBundle\Entity\ProductRegistration $dealerRequest
     *
     * @return ProductRegistrationAttach
     */
    public function setDealerRequest(\AppBundle\Entity\ProductRegistration $dealerRequest = null)
    {
        $this->dealer_request = $dealerRequest;

        return $this;
    }

    /**
     * Get dealerRequest
     *
     * @return \AppBundle\Entity\ProductRegistration
     */
    public function getDealerRequest()
    {
        return $this->dealer_request;
    }
}
