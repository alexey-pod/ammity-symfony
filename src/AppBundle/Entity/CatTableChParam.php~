<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CatTableChParam
 *
 * @ORM\Table(name="cat_table_ch_param")
 * @ORM\Entity
 */
class CatTableChParam
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cat_table_ch_id", type="integer", nullable=false)
     */
    private $catTableChId;

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
     * @ORM\Column(name="descr", type="text", length=65535, nullable=false)
     */
    private $descr;

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
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set catTableChId
     *
     * @param integer $catTableChId
     *
     * @return CatTableChParam
     */
    public function setCatTableChId($catTableChId)
    {
        $this->catTableChId = $catTableChId;

        return $this;
    }

    /**
     * Get catTableChId
     *
     * @return integer
     */
    public function getCatTableChId()
    {
        return $this->catTableChId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return CatTableChParam
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
     * @return CatTableChParam
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
     * Set descr
     *
     * @param string $descr
     *
     * @return CatTableChParam
     */
    public function setDescr($descr)
    {
        $this->descr = $descr;

        return $this;
    }

    /**
     * Get descr
     *
     * @return string
     */
    public function getDescr()
    {
        return $this->descr;
    }

    /**
     * Set isCollapsed
     *
     * @param string $isCollapsed
     *
     * @return CatTableChParam
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
     * @return CatTableChParam
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
}
