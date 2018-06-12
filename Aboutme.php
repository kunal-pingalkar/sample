<?php

class Aboutme extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $about_me_id;

    /**
     *
     * @var string
     */
    protected $visibility;

    /**
     *
     * @var string
     */
    protected $about_me_information;

    /**
     *
     * @var string
     */
    protected $about_me_updated_date;

    /**
     *
     * @var string
     */
    protected $about_me_created_date;

    /**
     *
     * @var string
     */
    protected $about_me_created_by;

    /**
     *
     * @var string
     */
    protected $about_me_updated_by;

    /**
     * Method to set the value of field about_me_id
     *
     * @param integer $about_me_id
     * @return $this
     */
    public function setAboutMeId($about_me_id)
    {
        $this->about_me_id = $about_me_id;

        return $this;
    }

    /**
     * Method to set the value of field visibility
     *
     * @param string $visibility
     * @return $this
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;

        return $this;
    }

    /**
     * Method to set the value of field about_me_information
     *
     * @param string $about_me_information
     * @return $this
     */
    public function setAboutMeInformation($about_me_information)
    {
        $this->about_me_information = $about_me_information;

        return $this;
    }

    /**
     * Method to set the value of field about_me_updated_date
     *
     * @param string $about_me_updated_date
     * @return $this
     */
    public function setAboutMeUpdatedDate($about_me_updated_date)
    {
        $this->about_me_updated_date = $about_me_updated_date;

        return $this;
    }

    /**
     * Method to set the value of field about_me_created_date
     *
     * @param string $about_me_created_date
     * @return $this
     */
    public function setAboutMeCreatedDate($about_me_created_date)
    {
        $this->about_me_created_date = $about_me_created_date;

        return $this;
    }

    /**
     * Method to set the value of field about_me_created_by
     *
     * @param string $about_me_created_by
     * @return $this
     */
    public function setAboutMeCreatedBy($about_me_created_by)
    {
        $this->about_me_created_by = $about_me_created_by;

        return $this;
    }

    /**
     * Method to set the value of field about_me_updated_by
     *
     * @param string $about_me_updated_by
     * @return $this
     */
    public function setAboutMeUpdatedBy($about_me_updated_by)
    {
        $this->about_me_updated_by = $about_me_updated_by;

        return $this;
    }

    /**
     * Returns the value of field about_me_id
     *
     * @return integer
     */
    public function getAboutMeId()
    {
        return $this->about_me_id;
    }

    /**
     * Returns the value of field visibility
     *
     * @return string
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * Returns the value of field about_me_information
     *
     * @return string
     */
    public function getAboutMeInformation()
    {
        return $this->about_me_information;
    }

    /**
     * Returns the value of field about_me_updated_date
     *
     * @return string
     */
    public function getAboutMeUpdatedDate()
    {
        return $this->about_me_updated_date;
    }

    /**
     * Returns the value of field about_me_created_date
     *
     * @return string
     */
    public function getAboutMeCreatedDate()
    {
        return $this->about_me_created_date;
    }

    /**
     * Returns the value of field about_me_created_by
     *
     * @return string
     */
    public function getAboutMeCreatedBy()
    {
        return $this->about_me_created_by;
    }

    /**
     * Returns the value of field about_me_updated_by
     *
     * @return string
     */
    public function getAboutMeUpdatedBy()
    {
        return $this->about_me_updated_by;
    }

}
