<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
// use Doctrine\ORM\Mapping\OneToMany;
// use AppBundle\Entity\PresentationImage;

use AppBundle\Repository\PresentationRepository;


/**
 * Presentation
 *
 * @ORM\Table(name="presentation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PresentationRepository")
 */
class Presentation
{
    
	/**
	* @ORM\OneToMany(targetEntity="PresentationImage", mappedBy="presentation")
	*/
	
	private $image_array;
	public function __construct()
    {
        $this->image_array = new ArrayCollection();
    }
	
	/**
	* @var string
	*
	* @ORM\Column(name="name", type="string", length=250, nullable=false)
	*/
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="icon_white", type="string", length=250, nullable=false)
     */
    private $iconWhite;

    /**
     * @var string
     *
     * @ORM\Column(name="icon_black", type="string", length=250, nullable=false)
     */
    private $iconBlack;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=65535, nullable=false)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="url_name", type="string", length=250, nullable=false)
     */
    private $urlName;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=150, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="show_in_mane", type="string", nullable=false)
     */
    private $showInMane = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="show_in_pr_page", type="string", nullable=false)
     */
    private $showInPrPage = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="is_disable", type="string", nullable=false)
     */
    private $isDisable = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="sort", type="integer", nullable=false)
     */
    private $sort;

    /**
     * @var integer
     *
     * @ORM\Column(name="datetime_add", type="integer", nullable=false)
     */
    private $datetimeAdd;

    /**
     * @var string
     *
     * @ORM\Column(name="disable_name", type="string", nullable=false)
     */
    private $disableName = '0';

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
     * @return Presentation
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
     * Set iconWhite
     *
     * @param string $iconWhite
     *
     * @return Presentation
     */
    public function setIconWhite($iconWhite)
    {
        $this->iconWhite = $iconWhite;

        return $this;
    }

    /**
     * Get iconWhite
     *
     * @return string
     */
    public function getIconWhite()
    {
        return $this->iconWhite;
    }

    /**
     * Set iconBlack
     *
     * @param string $iconBlack
     *
     * @return Presentation
     */
    public function setIconBlack($iconBlack)
    {
        $this->iconBlack = $iconBlack;

        return $this;
    }

    /**
     * Get iconBlack
     *
     * @return string
     */
    public function getIconBlack()
    {
        return $this->iconBlack;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Presentation
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
     * Set urlName
     *
     * @param string $urlName
     *
     * @return Presentation
     */
    public function setUrlName($urlName)
    {
        $this->urlName = $urlName;

        return $this;
    }

    /**
     * Get urlName
     *
     * @return string
     */
    public function getUrlName()
    {
        return $this->urlName;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Presentation
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set showInMane
     *
     * @param string $showInMane
     *
     * @return Presentation
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
     * Set showInPrPage
     *
     * @param string $showInPrPage
     *
     * @return Presentation
     */
    public function setShowInPrPage($showInPrPage)
    {
        $this->showInPrPage = $showInPrPage;

        return $this;
    }

    /**
     * Get showInPrPage
     *
     * @return string
     */
    public function getShowInPrPage()
    {
        return $this->showInPrPage;
    }

    /**
     * Set isDisable
     *
     * @param string $isDisable
     *
     * @return Presentation
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
     * Set sort
     *
     * @param integer $sort
     *
     * @return Presentation
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
     * Set datetimeAdd
     *
     * @param integer $datetimeAdd
     *
     * @return Presentation
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
     * Set disableName
     *
     * @param string $disableName
     *
     * @return Presentation
     */
    public function setDisableName($disableName)
    {
        $this->disableName = $disableName;

        return $this;
    }

    /**
     * Get disableName
     *
     * @return string
     */
    public function getDisableName()
    {
        return $this->disableName;
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
	
	public function getImageArray()
	{
		// return $this->image_array->toArray();
		return $this->image_array;
	}

    /**
     * Add imageArray
     *
     * @param \AppBundle\Entity\PresentationImage $imageArray
     *
     * @return Presentation
     */
    public function addImageArray(\AppBundle\Entity\PresentationImage $imageArray)
    {
        $this->image_array[] = $imageArray;

        return $this;
    }

    /**
     * Remove imageArray
     *
     * @param \AppBundle\Entity\PresentationImage $imageArray
     */
    public function removeImageArray(\AppBundle\Entity\PresentationImage $imageArray)
    {
        $this->image_array->removeElement($imageArray);
    }
}
