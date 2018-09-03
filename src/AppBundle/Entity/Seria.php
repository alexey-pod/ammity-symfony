<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seria
 *
 * @ORM\Table(name="seria")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SeriaRepository")
 */
class Seria
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150, nullable=false)
     */
    private $name;

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
     * Set name
     *
     * @param string $name
     *
     * @return Seria
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
     * Set mnemonic
     *
     * @param string $mnemonic
     *
     * @return Seria
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
     * @return Seria
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
     * Set sort
     *
     * @param integer $sort
     *
     * @return Seria
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
