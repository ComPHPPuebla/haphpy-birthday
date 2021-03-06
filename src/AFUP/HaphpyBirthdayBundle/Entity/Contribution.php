<?php

namespace AFUP\HaphpyBirthdayBundle\Entity;

use AFUP\HaphpyBirthdayBundle\HttpFoundation\File\File;

/**
 * Contribution
 *
 * @author Faun <woecifaun@gmail.com>
 */
class Contribution
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $fileName;

    /**
     * The origin of the authentication
     * i.e. GitHub, Facebook, Twitter
     *
     * @var string
     */
    private $authProvider;

    /**
     * The identifier
     * depends on the Auth Provider (OAuth username)
     *
     * @var string
     */
    private $identifier;

    /**
     * Visible name of contributor
     *
     * @var string
     */
    private $visibleName;

    /**
     * Whether or not the person wants to be credited
     *
     * @var bool
     */
    private $creditWanted;

    /**
     * Whether or not contribution is accepted
     * null:  not moderated but visible anyway (we trust people first)
     * true:  accepted thus visible
     * false: rejected, it won't be part of the project
     *
     * @var bool
     */
    private $accepted = null;

    /**
     * The time assets was uploaded
     *
     * @var \DateTime
     */
    private $createdAt;

    /**
     * The time assets was modified or reuploaded
     *
     * @var \DateTime
     */
    private $modifiedAt;

    /**
     * @var File
     */
    private $file;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->createdAt  = new \DateTime();
        $this->modifiedAt = new \DateTime();
    }


    /**
     * Get the value of FileName
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set the value of FileName
     *
     * @param string $fileName
     *
     * @return self
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get the value of The origin of the authentication
     *
     * @return string
     */
    public function getAuthProvider()
    {
        return $this->authProvider;
    }

    /**
     * Set the value of The origin of the authentication
     *
     * @param string $authProvider
     *
     * @return self
     */
    public function setAuthProvider($authProvider)
    {
        $this->authProvider = $authProvider;

        return $this;
    }

    /**
     * Get the value of The identifier
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Set the value of The identifier
     *
     * @param string $identifier
     *
     * @return self
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * Get whether or not the person wants to be credited
     *
     * @return bool
     */
    public function isCreditWanted()
    {
        return $this->creditWanted;
    }

    /**
     * Set whether or not the person wants to be credited
     *
     * @param bool $creditWanted
     *
     * @return self
     */
    public function setCreditWanted($creditWanted)
    {
        $this->creditWanted = $creditWanted;

        return $this;
    }

    /**
     * Get the value of The time assets was uploaded
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of The time assets was uploaded
     *
     * @param \DateTime $createdAt
     *
     * @return self
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of if the uploaded is validated
     *
     * @return bool
     */
    public function isValidated()
    {
        return $this->validated;
    }

    /**
     * Set the value of if the uploaded is validated
     *
     * @param bool $validated
     *
     * @return self
     */
    public function setValidated($validated)
    {
        $this->validated = $validated;

        return $this;
    }


    /**
     * Gets the value of id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param int $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the time assets was modified or reuploaded.
     *
     * @return \DateTime
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * Sets the time assets was modified or reuploaded.
     *
     * @param \DateTime $modifiedAt the modified at
     *
     * @return self
     */
    public function setModifiedAt(\DateTime $modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    /**
     * Gets the File.
     *
     * @return File
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Sets the file.
     *
     * @param File $file
     *
     * @return self
     */
    public function setFile(File $file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Gets the visible name of contributor.
     *
     * @return string
     */
    public function getVisibleName()
    {
        return $this->visibleName;
    }

    /**
     * Sets the visible name of contributor.
     *
     * @param string $visibleName the visible name
     *
     * @return self
     */
    public function setVisibleName($visibleName)
    {
        $this->visibleName = $visibleName;

        return $this;
    }

    /**
     * Get Auth Provider Id (g for GitHub, f for Facebook…)
     *
     * @return string
     */
    public function getAuthProviderId()
    {
        return $this->authProvider ? substr($this->authProvider, 0, 1) : null;
    }

    /**
     * Gets whether or not contribution is accepted thus visible to audience
     *
     * @return bool
     */
    public function isAccepted()
    {
        // a Contribution is visible as long it is not explicitly rejected
        // meaning when $this->accepted is not set to false
        return $this->accepted !== false;
    }

    /**
     * Sets whether or not contribution is accepted thus visible to audience
     *
     * @param bool $accepted
     */
    public function setAccepted($accepted)
    {
        $this->accepted = (bool) $accepted;
    }

    /**
     * Gets whether or not contribution is moderated
     *
     * @return bool
     */
    public function isModerated()
    {
        return $this->accepted !== null;
    }
}
