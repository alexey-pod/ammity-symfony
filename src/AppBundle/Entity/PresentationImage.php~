<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
// use Doctrine\ORM\Mapping\ManyToOne;
// use Doctrine\ORM\Mapping\JoinColumn;

/**
 * PresentationImage
 *
 * @ORM\Table(name="presentation_image")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PresentationImageRepository")
 */
class PresentationImage
{
     	
	/**
	* @ORM\ManyToOne(targetEntity="Presentation", inversedBy="image_array")
	* @ORM\JoinColumn(name="presentation_id", referencedColumnName="id")
	*/
    protected $presentation;
	
		
	/**
     * @var integer
     *
     * @ORM\Column(name="presentation_id", type="integer", nullable=false)
     */
    private $presentationId;

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
     * @ORM\Column(name="main", type="string", nullable=false)
     */
    private $main = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set presentationId
     *
     * @param integer $presentationId
     *
     * @return PresentationImage
     */
    public function setPresentationId($presentationId)
    {
        $this->presentationId = $presentationId;

        return $this;
    }

    /**
     * Get presentationId
     *
     * @return integer
     */
    public function getPresentationId()
    {
        return $this->presentationId;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return PresentationImage
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
     * @return PresentationImage
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
     * Set main
     *
     * @param string $main
     *
     * @return PresentationImage
     */
    public function setMain($main)
    {
        $this->main = $main;

        return $this;
    }

    /**
     * Get main
     *
     * @return string
     */
    public function getMain()
    {
        return $this->main;
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
     * Set presentation
     *
     * @param \AppBundle\Entity\Presentation $presentation
     *
     * @return PresentationImage
     */
    public function setPresentation(\AppBundle\Entity\Presentation $presentation = null)
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * Get presentation
     *
     * @return \AppBundle\Entity\Presentation
     */
    public function getPresentation()
    {
        return $this->presentation;
    }
}
