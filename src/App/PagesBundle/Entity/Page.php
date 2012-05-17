<?php

namespace App\PagesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * App\PagesBundle\Entity\Page
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="App\PagesBundle\Entity\PageRepository")
 */
class Page
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $Alias
     *
     * @ORM\Column(name="Alias", type="string", length=255, unique=true)
     */
    private $Alias;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var text $text
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var string $user
     *
     * @ORM\Column(name="user", type="string", length=255)
     */
    private $user;

    /**
     * @var datetime $createdate
     *
     * @ORM\Column(name="createdate", type="datetime")
     */
    private $createdate;

    /**
     * @var datetime $editdate
     *
     * @ORM\Column(name="editdate", type="datetime")
     */
    private $editdate;


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
     * Set Alias
     *
     * @param string $alias
     */
    public function setAlias($alias)
    {
        $this->Alias = $alias;
    }

    /**
     * Get Alias
     *
     * @return string 
     */
    public function getAlias()
    {
        return $this->Alias;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Set text
     *
     * @param text $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Get text
     *
     * @return text 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set user
     *
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set createdate
     *
     * @param datetime $createdate
     */
    public function setCreatedate($createdate)
    {
        $this->createdate = $createdate;
    }

    /**
     * Get createdate
     *
     * @return datetime 
     */
    public function getCreatedate()
    {
        return $this->createdate;
    }

    /**
     * Set editdate
     *
     * @param datetime $editdate
     */
    public function setEditdate($editdate)
    {
        $this->editdate = $editdate;
    }

    /**
     * Get editdate
     *
     * @return datetime 
     */
    public function getEditdate()
    {
        return $this->editdate;
    }
}