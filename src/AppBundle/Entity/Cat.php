<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cat
 *
 * @ORM\Table(name="cat", uniqueConstraints={@ORM\UniqueConstraint(name="mnemonic", columns={"mnemonic"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CatRepository")
 */
class Cat
{
    
	private $url;
	public function getUrl()
    {
        return $this->url;
    }
	public function setUrl($url)
    {
        $this->url = $url;
		return $this;
    }
	
	private $seria_array;
	
	public function getSeriaArray()
    {
        return $this->seria_array;
    }
	public function setSeriaArray($seria_array)
    {
        $this->seria_array = $seria_array;
		return $this;
    }
	
	private $ann_array;
	
	public function getAnnArray()
    {
        return $this->ann_array;
    }
	public function setAnnArray($ann_array)
    {
        $this->ann_array = $ann_array;
		return $this;
    }
	
	
	/**
     * @var integer
     *
     * @ORM\Column(name="cat_id", type="integer", nullable=false)
     */
    private $catId;

    /**
     * @var integer
     *
     * @ORM\Column(name="root_cat_id", type="integer", nullable=false)
     */
    private $rootCatId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="name_one", type="string", length=100, nullable=false)
     */
    private $nameOne;

    /**
     * @var string
     *
     * @ORM\Column(name="mnemonic", type="string", length=50, nullable=false)
     */
    private $mnemonic;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=65535, nullable=false)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=250, nullable=false)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort", type="integer", nullable=false)
     */
    private $sort;

    /**
     * @var string
     *
     * @ORM\Column(name="is_disable", type="string", nullable=false)
     */
    private $isDisable = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="link_disable", type="string", nullable=false)
     */
    private $linkDisable = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="show_in_mane", type="string", nullable=false)
     */
    private $showInMane = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="compare", type="string", nullable=false)
     */
    private $compare = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="extended_warranty", type="string", nullable=false)
     */
    private $extendedWarranty = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set catId
     *
     * @param integer $catId
     *
     * @return Cat
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
     * Set rootCatId
     *
     * @param integer $rootCatId
     *
     * @return Cat
     */
    public function setRootCatId($rootCatId)
    {
        $this->rootCatId = $rootCatId;

        return $this;
    }

    /**
     * Get rootCatId
     *
     * @return integer
     */
    public function getRootCatId()
    {
        return $this->rootCatId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Cat
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
     * Set nameOne
     *
     * @param string $nameOne
     *
     * @return Cat
     */
    public function setNameOne($nameOne)
    {
        $this->nameOne = $nameOne;

        return $this;
    }

    /**
     * Get nameOne
     *
     * @return string
     */
    public function getNameOne()
    {
        return $this->nameOne;
    }

    /**
     * Set mnemonic
     *
     * @param string $mnemonic
     *
     * @return Cat
     */
    public function setMnemonic($mnemonic)
    {
        $this->mnemonic = $mnemonic;

        return $this;
    }

    /**
     * Get mnemonic
     *
     * @return string
     */
    public function getMnemonic()
    {
        return $this->mnemonic;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Cat
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
     * Set image
     *
     * @param string $image
     *
     * @return Cat
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set sort
     *
     * @param integer $sort
     *
     * @return Cat
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
     * Set isDisable
     *
     * @param string $isDisable
     *
     * @return Cat
     */
    public function setIsDisable($isDisable)
    {
        $this->isDisable = $isDisable;

        return $this;
    }

    /**
     * Get isDisable
     *
     * @return string
     */
    public function getIsDisable()
    {
        return $this->isDisable;
    }

    /**
     * Set linkDisable
     *
     * @param string $linkDisable
     *
     * @return Cat
     */
    public function setLinkDisable($linkDisable)
    {
        $this->linkDisable = $linkDisable;

        return $this;
    }

    /**
     * Get linkDisable
     *
     * @return string
     */
    public function getLinkDisable()
    {
        return $this->linkDisable;
    }

    /**
     * Set showInMane
     *
     * @param string $showInMane
     *
     * @return Cat
     */
    public function setShowInMane($showInMane)
    {
        $this->showInMane = $showInMane;

        return $this;
    }

    /**
     * Get showInMane
     *
     * @return string
     */
    public function getShowInMane()
    {
        return $this->showInMane;
    }

    /**
     * Set compare
     *
     * @param string $compare
     *
     * @return Cat
     */
    public function setCompare($compare)
    {
        $this->compare = $compare;

        return $this;
    }

    /**
     * Get compare
     *
     * @return string
     */
    public function getCompare()
    {
        return $this->compare;
    }

    /**
     * Set extendedWarranty
     *
     * @param string $extendedWarranty
     *
     * @return Cat
     */
    public function setExtendedWarranty($extendedWarranty)
    {
        $this->extendedWarranty = $extendedWarranty;

        return $this;
    }

    /**
     * Get extendedWarranty
     *
     * @return string
     */
    public function getExtendedWarranty()
    {
        return $this->extendedWarranty;
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
