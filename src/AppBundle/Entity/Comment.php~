<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ann_id", type="integer", nullable=false)
     */
    private $annId;

    /**
     * @var string
     *
     * @ORM\Column(name="fio", type="string", length=100, nullable=false)
     */
    private $fio;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=65535, nullable=false)
     */
    private $text;

    /**
     * @var integer
     *
     * @ORM\Column(name="design", type="integer", nullable=false)
     */
    private $design;

    /**
     * @var integer
     *
     * @ORM\Column(name="safety", type="integer", nullable=false)
     */
    private $safety;

    /**
     * @var integer
     *
     * @ORM\Column(name="functionality", type="integer", nullable=false)
     */
    private $functionality;

    /**
     * @var integer
     *
     * @ORM\Column(name="comfort", type="integer", nullable=false)
     */
    private $comfort;

    /**
     * @var integer
     *
     * @ORM\Column(name="datetime_add", type="integer", nullable=false)
     */
    private $datetimeAdd;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=50, nullable=false)
     */
    private $status = 'new';

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=false)
     */
    private $comment = '';

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
     * @return Comment
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
     * Set fio
     *
     * @param string $fio
     *
     * @return Comment
     */
    public function setFio($fio)
    {
        $this->fio = $fio;

        return $this;
    }

    /**
     * Get fio
     *
     * @return string
     */
    public function getFio()
    {
        return $this->fio;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Comment
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Comment
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
     * Set design
     *
     * @param integer $design
     *
     * @return Comment
     */
    public function setDesign($design)
    {
        $this->design = $design;

        return $this;
    }

    /**
     * Get design
     *
     * @return integer
     */
    public function getDesign()
    {
        return $this->design;
    }

    /**
     * Set safety
     *
     * @param integer $safety
     *
     * @return Comment
     */
    public function setSafety($safety)
    {
        $this->safety = $safety;

        return $this;
    }

    /**
     * Get safety
     *
     * @return integer
     */
    public function getSafety()
    {
        return $this->safety;
    }

    /**
     * Set functionality
     *
     * @param integer $functionality
     *
     * @return Comment
     */
    public function setFunctionality($functionality)
    {
        $this->functionality = $functionality;

        return $this;
    }

    /**
     * Get functionality
     *
     * @return integer
     */
    public function getFunctionality()
    {
        return $this->functionality;
    }

    /**
     * Set comfort
     *
     * @param integer $comfort
     *
     * @return Comment
     */
    public function setComfort($comfort)
    {
        $this->comfort = $comfort;

        return $this;
    }

    /**
     * Get comfort
     *
     * @return integer
     */
    public function getComfort()
    {
        return $this->comfort;
    }

    /**
     * Set datetimeAdd
     *
     * @param integer $datetimeAdd
     *
     * @return Comment
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
     * Set status
     *
     * @param string $status
     *
     * @return Comment
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
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
