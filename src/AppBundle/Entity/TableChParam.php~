<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TableChParam
 *
 * @ORM\Table(name="table_ch_param")
 * @ORM\Entity
 */
class TableChParam
{
    
	/**
	* @ORM\ManyToOne(targetEntity="TableCh", inversedBy="table_ch_param_array")
	* @ORM\JoinColumn(name="table_ch_id", referencedColumnName="id")
	*/
    protected $table_ch;
	
	
	/**
     * @var integer
     *
     * @ORM\Column(name="table_ch_id", type="integer", nullable=false)
     */
    private $tableChId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=250, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=250, nullable=false)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="is_collapsed", type="string", nullable=false)
     */
    private $isCollapsed = '0';

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
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set tableChId
     *
     * @param integer $tableChId
     *
     * @return TableChParam
     */
    public function setTableChId($tableChId)
    {
        $this->tableChId = $tableChId;

        return $this;
    }

    /**
     * Get tableChId
     *
     * @return integer
     */
    public function getTableChId()
    {
        return $this->tableChId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return TableChParam
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
     * Set value
     *
     * @param string $value
     *
     * @return TableChParam
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set isCollapsed
     *
     * @param string $isCollapsed
     *
     * @return TableChParam
     */
    public function setIsCollapsed($isCollapsed)
    {
        $this->isCollapsed = $isCollapsed;

        return $this;
    }

    /**
     * Get isCollapsed
     *
     * @return string
     */
    public function getIsCollapsed()
    {
        return $this->isCollapsed;
    }

    /**
     * Set sort
     *
     * @param integer $sort
     *
     * @return TableChParam
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
     * @return TableChParam
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tableCh
     *
     * @param \AppBundle\Entity\TableCh $tableCh
     *
     * @return TableChParam
     */
    public function setTableCh(\AppBundle\Entity\TableCh $tableCh = null)
    {
        $this->table_ch = $tableCh;

        return $this;
    }

    /**
     * Get tableCh
     *
     * @return \AppBundle\Entity\TableCh
     */
    public function getTableCh()
    {
        return $this->table_ch;
    }
}
