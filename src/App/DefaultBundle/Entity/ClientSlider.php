<?php

namespace App\DefaultBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * ClientSlider
 *
 * @ORM\Table(name="client_sliders")
 * @ORM\Entity
 * @Vich\Uploadable
 */
class ClientSlider
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @Assert\File(
     *     maxSize="2048k",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"}
     * )
     * @Vich\UploadableField(mapping="slider", fileNameProperty="picture")
     *
     * @var File $file
     */
    private $pictureFile;

    /**
     * @var string
     *
     * @ORM\Column(name="background", type="string", length=255, nullable=true)
     */
    private $background;

    /**
     * @Assert\File(
     *     maxSize="2048k",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"}
     * )
     * @Vich\UploadableField(mapping="slider_bg", fileNameProperty="background")
     *
     * @var File $file
     */
    private $backgroundFile;

    /**
     * @ORM\Column(name="link", type="string", length=255)
     * @var string
     */
    private $link;

    /**
     * @ORM\Column(name="color", type="string", length=10)
     * @var string
     */
    private $textColor = "#000";

    /**
     * @var \DateTime $created_at
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime $updated_at
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

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
     * Set name
     *
     * @param  string       $name
     * @return ClientSlider
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
     * Set description
     *
     * @param  string       $description
     * @return ClientSlider
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
     * Set picture
     *
     * @param  string       $picture
     * @return ClientSlider
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set background
     *
     * @param  string       $background
     * @return ClientSlider
     */
    public function setBackground($background)
    {
        $this->background = $background;

        return $this;
    }

    /**
     * Get background
     *
     * @return string
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * Set link
     *
     * @param  string       $link
     * @return ClientSlider
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set textColor
     *
     * @param  string       $textColor
     * @return ClientSlider
     */
    public function setTextColor($textColor)
    {
        $this->textColor = $textColor;

        return $this;
    }

    /**
     * Get textColor
     *
     * @return string
     */
    public function getTextColor()
    {
        return $this->textColor;
    }

    /**
     * Set createdAt
     *
     * @param  \DateTime    $createdAt
     * @return ClientSlider
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param  \DateTime    $updatedAt
     * @return ClientSlider
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return File
     */
    public function getPictureFile()
    {
        return $this->pictureFile;
    }

    /**
     * @param File $pictureFile
     */
    public function setPictureFile($pictureFile)
    {
        $this->setUpdatedAt(new \DateTime('now'));
        $this->pictureFile = $pictureFile;
    }

    /**
     * @return File
     */
    public function getBackgroundFile()
    {
        return $this->backgroundFile;
    }

    /**
     * @param File $backgroundFile
     */
    public function setBackgroundFile($backgroundFile)
    {
        $this->setUpdatedAt(new \DateTime('now'));
        $this->backgroundFile = $backgroundFile;
    }
}
