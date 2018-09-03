<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AnnAddCat
 *
 * @ORM\Table(name="ann_add_cat", uniqueConstraints={@ORM\UniqueConstraint(name="ann_id", columns={"ann_id", "cat_id"})})
 * @ORM\Entity
 */
class AnnAddCat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ann_id", type="integer", nullable=false)
     */
    private $annId;

    /**
     * @var integer
     *
     * @ORM\Column(name="cat_id", type="integer", nullable=false)
     */
    private $catId;

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
     * @return AnnAddCat
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
     * Set catId
     *
     * @param integer $catId
     *
     * @return AnnAddCat
     */
    public function setCatId($catId)
    {
        $this->catId = $catId;

        return $this;
    }

    /**
     * Get catId
     *
     * @return integer
     */
    public function getCatId()
    {
        return $this->catId;
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
