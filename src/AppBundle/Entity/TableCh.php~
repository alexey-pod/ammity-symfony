<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TableCh
 *
 * @ORM\Table(name="table_ch")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TableChRepository")
 */
class TableCh
{
    
	/**
	* @ORM\OneToMany(targetEntity="TableChParam", mappedBy="table_ch")
	*/
	
	private $table_ch_param_array;
	public function __construct()
    {
        $this->table_ch_param_array = new ArrayCollection();
    }
	
	
	
	/**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="orientation", type="string", nullable=false)
     */
    private $orientation = 'h';

    /**
     * @var integer
     *
     * @ORM\Column(name="ann_id", type="integer", nullable=false)
     */
    private $annId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort", type="integer", nullable=false)
     */
    private $sort;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_client", type="integer", nullable=false)
     */
    private $sortClient;

    /**
     * @var string
     *
     * @ORM\Column(name="main_param", type="string", nullable=false)
     */
    private $mainParam = '0';

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
     * @return TableCh
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
     * Set orientation
     *
     * @param string $orientation
     *
     * @return TableCh
     */
    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;

        return $this;
    }

    /**
     * Get orientation
     *
     * @return string
     */
    public function getOrientation()
    {
        return $this->orientation;
    }

    /**
     * Set annId
     *
     * @param integer $annId
     *
     * @return TableCh
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
     * Set sort
     *
     * @param integer $sort
     *
     * @return TableCh
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
     * Set sortClient
     *
     * @param integer $sortClient
     *
     * @return TableCh
     */
    public function setSortClient($sortClient)
    {
        $this->sortClient = $sortClient;

        return $this;
    }

    /**
     * Get sortClient
     *
     * @return integer
     */
    public function getSortClient()
    {
        return $this->sortClient;
    }

    /**
     * Set mainParam
     *
     * @param string $mainParam
     *
     * @return TableCh
     */
    public function setMainParam($mainParam)
    {
        $this->mainParam = $mainParam;

        return $this;
    }

    /**
     * Get mainParam
     *
     * @return string
     */
    public function getMainParam()
    {
        return $this->mainParam;
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
     * Add tableChParamArray
     *
     * @param \AppBundle\Entity\TableChParam $tableChParamArray
     *
     * @return TableCh
     */
    public function addTableChParamArray(\AppBundle\Entity\TableChParam $tableChParamArray)
    {
        $this->table_ch_param_array[] = $tableChParamArray;

        return $this;
    }

    /**
     * Remove tableChParamArray
     *
     * @param \AppBundle\Entity\TableChParam $tableChParamArray
     */
    public function removeTableChParamArray(\AppBundle\Entity\TableChParam $tableChParamArray)
    {
        $this->table_ch_param_array->removeElement($tableChParamArray);
    }

    /**
     * Get tableChParamArray
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTableChParamArray()
    {
        return $this->table_ch_param_array;
    }
}
