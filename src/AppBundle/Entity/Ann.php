<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ann
 *
 * @ORM\Table(name="ann", uniqueConstraints={@ORM\UniqueConstraint(name="mnemonic", columns={"mnemonic"})}, indexes={@ORM\Index(name="cat_id", columns={"cat_id"}), @ORM\Index(name="root_cat_id", columns={"root_cat_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnnRepository")
 */
class Ann
{
    
	
	private $url;
	
	public function seUrl($url)
    {
        $this->url = $url;

        return $this;
    }
	
    public function getUrl()
    {
        return $this->url;
    }
	
	
	
		
	/**
     * @var string
     *
     * @ORM\Column(name="article", type="string", length=50, nullable=false)
     */
    private $article;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=200, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="full_name", type="string", length=200, nullable=false)
     */
    private $fullName;

    /**
     * @var string
     *
     * @ORM\Column(name="full_name_manual", type="string", length=250, nullable=false)
     */
    private $fullNameManual;

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
     * @ORM\Column(name="features", type="text", length=65535, nullable=false)
     */
    private $features;

    /**
     * @var integer
     *
     * @ORM\Column(name="add_datetime", type="integer", nullable=false)
     */
    private $addDatetime;

    /**
     * @var string
     *
     * @ORM\Column(name="is_disable", type="string", nullable=false)
     */
    private $isDisable;

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
     * @var integer
     *
     * @ORM\Column(name="sort", type="integer", nullable=false)
     */
    private $sort;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer", nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="available", type="string", length=50, nullable=false)
     */
    private $available;

    /**
     * @var string
     *
     * @ORM\Column(name="ym_id", type="string", length=50, nullable=false)
     */
    private $ymId;

    /**
     * @var integer
     *
     * @ORM\Column(name="seria_id", type="integer", nullable=false)
     */
    private $seriaId;

    /**
     * @var string
     *
     * @ORM\Column(name="app", type="string", nullable=false)
     */
    private $app = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set article
     *
     * @param string $article
     *
     * @return Ann
     */
    public function setArticle($article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return string
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Ann
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
     * Set fullName
     *
     * @param string $fullName
     *
     * @return Ann
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set fullNameManual
     *
     * @param string $fullNameManual
     *
     * @return Ann
     */
    public function setFullNameManual($fullNameManual)
    {
        $this->fullNameManual = $fullNameManual;

        return $this;
    }

    /**
     * Get fullNameManual
     *
     * @return string
     */
    public function getFullNameManual()
    {
        return $this->fullNameManual;
    }

    /**
     * Set mnemonic
     *
     * @param string $mnemonic
     *
     * @return Ann
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
     * @return Ann
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
     * Set features
     *
     * @param string $features
     *
     * @return Ann
     */
    public function setFeatures($features)
    {
        $this->features = $features;

        return $this;
    }

    /**
     * Get features
     *
     * @return string
     */
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * Set addDatetime
     *
     * @param integer $addDatetime
     *
     * @return Ann
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
     * Set isDisable
     *
     * @param string $isDisable
     *
     * @return Ann
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
     * Set catId
     *
     * @param integer $catId
     *
     * @return Ann
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
     * @return Ann
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
     * Set sort
     *
     * @param integer $sort
     *
     * @return Ann
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
     * Set price
     *
     * @param integer $price
     *
     * @return Ann
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set available
     *
     * @param string $available
     *
     * @return Ann
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return string
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Set ymId
     *
     * @param string $ymId
     *
     * @return Ann
     */
    public function setYmId($ymId)
    {
        $this->ymId = $ymId;

        return $this;
    }

    /**
     * Get ymId
     *
     * @return string
     */
    public function getYmId()
    {
        return $this->ymId;
    }

    /**
     * Set seriaId
     *
     * @param integer $seriaId
     *
     * @return Ann
     */
    public function setSeriaId($seriaId)
    {
        $this->seriaId = $seriaId;

        return $this;
    }

    /**
     * Get seriaId
     *
     * @return integer
     */
    public function getSeriaId()
    {
        return $this->seriaId;
    }

    /**
     * Set app
     *
     * @param string $app
     *
     * @return Ann
     */
    public function setApp($app)
    {
        $this->app = $app;

        return $this;
    }

    /**
     * Get app
     *
     * @return string
     */
    public function getApp()
    {
        return $this->app;
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
