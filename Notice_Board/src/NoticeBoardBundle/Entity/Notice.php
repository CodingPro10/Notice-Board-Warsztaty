<?php

namespace NoticeBoardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notice
 *
 * @ORM\Table(name="notice")
 * @ORM\Entity(repositoryClass="NoticeBoardBundle\Repository\NoticeRepository")
 */
class Notice
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    protected $title;

    /**
     * @var int
     *
     * @ORM\Column(name="pic_no", type="integer")
     */
    protected $picNo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="exp_date", type="date")
     */
    protected $exp_date;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="text")
     */
    protected $category;
        
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="NoticeCategory")
     * @ORM\JoinColumn(name="noticeCategory_id", referencedColumnName="id")
     */
    protected $noticeCategory;
    
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
     * Set description
     *
     * @param string $text
     * @return Notice
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Notice
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set picNo
     *
     * @param integer $picNo
     * @return Notice
     */
    public function setPicNo($picNo)
    {
        $this->picNo = $picNo;

        return $this;
    }

    /**
     * Get picNo
     *
     * @return integer 
     */
    public function getPicNo()
    {
        return $this->picNo;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Notice
     */
    public function setExp_date($exp_date)
    {
        $this->exp_date = $exp_date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getExp_date()
    {
        return $this->exp_date;
    }

    /**
     * Set exp_date
     *
     * @param \DateTime $expDate
     * @return Notice
     */
    public function setExpDate($expDate)
    {
        $this->exp_date = $expDate;

        return $this;
    }

    /**
     * Get exp_date
     *
     * @return \DateTime 
     */
    public function getExpDate()
    {
        return $this->exp_date;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return Notice
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set user
     *
     * @param \NoticeBoardBundle\Entity\User $user
     * @return Notice
     */
    public function setUser(\NoticeBoardBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \NoticeBoardBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set noticeCategory
     *
     * @param \NoticeBoardBundle\Entity\NoticeCategory $noticeCategory
     * @return Notice
     */
    public function setNoticeCategory(\NoticeBoardBundle\Entity\NoticeCategory $noticeCategory = null)
    {
        $this->noticeCategory = $noticeCategory;

        return $this;
    }

    /**
     * Get noticeCategory
     *
     * @return \NoticeBoardBundle\Entity\NoticeCategory 
     */
    public function getNoticeCategory()
    {
        return $this->noticeCategory;
    }
}
