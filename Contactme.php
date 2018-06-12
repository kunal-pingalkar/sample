<?php

class ContactMe extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $contact_me_id;

    /**
     *
     * @var string
     */
    protected $contact_person_name;

    /**
     *
     * @var string
     */
    protected $contact_person_email;

    /**
     *
     * @var string
     */
    protected $contact_person_message;

    /**
     *
     * @var string
     */
    protected $contact_person_mobile_no;

    /**
     *
     * @var string
     */
    protected $contact_updated_date;

    /**
     *
     * @var string
     */
    protected $contact_created_date;

    /**
     *
     * @var string
     */
    protected $contact_created_by;

    /**
     *
     * @var string
     */
    protected $contact_updated_by;

    /**
     * Method to set the value of field contact_me_id
     *
     * @param integer $contact_me_id
     * @return $this
     */
    public function setContactMeId($contact_me_id)
    {
        $this->contact_me_id = $contact_me_id;

        return $this;
    }

    /**
     * Method to set the value of field contact_person_name
     *
     * @param string $contact_person_name
     * @return $this
     */
    public function setContactPersonName($contact_person_name)
    {
        $this->contact_person_name = $contact_person_name;

        return $this;
    }

    /**
     * Method to set the value of field contact_person_email
     *
     * @param string $contact_person_email
     * @return $this
     */
    public function setContactPersonEmail($contact_person_email)
    {
        $this->contact_person_email = $contact_person_email;

        return $this;
    }

    /**
     * Method to set the value of field contact_person_message
     *
     * @param string $contact_person_message
     * @return $this
     */
    public function setContactPersonMessage($contact_person_message)
    {
        $this->contact_person_message = $contact_person_message;

        return $this;
    }

    /**
     * Method to set the value of field contact_person_mobile_no
     *
     * @param string $contact_person_mobile_no
     * @return $this
     */
    public function setContactPersonMobileNo($contact_person_mobile_no)
    {
        $this->contact_person_mobile_no = $contact_person_mobile_no;

        return $this;
    }

    /**
     * Method to set the value of field contact_updated_date
     *
     * @param string $contact_updated_date
     * @return $this
     */
    public function setContactUpdatedDate($contact_updated_date)
    {
        $this->contact_updated_date = $contact_updated_date;

        return $this;
    }

    /**
     * Method to set the value of field contact_created_date
     *
     * @param string $contact_created_date
     * @return $this
     */
    public function setContactCreatedDate($contact_created_date)
    {
        $this->contact_created_date = $contact_created_date;

        return $this;
    }

    /**
     * Method to set the value of field contact_created_by
     *
     * @param string $contact_created_by
     * @return $this
     */
    public function setContactCreatedBy($contact_created_by)
    {
        $this->contact_created_by = $contact_created_by;

        return $this;
    }

    /**
     * Method to set the value of field contact_updated_by
     *
     * @param string $contact_updated_by
     * @return $this
     */
    public function setContactUpdatedBy($contact_updated_by)
    {
        $this->contact_updated_by = $contact_updated_by;

        return $this;
    }

    /**
     * Returns the value of field contact_me_id
     *
     * @return integer
     */
    public function getContactMeId()
    {
        return $this->contact_me_id;
    }

    /**
     * Returns the value of field contact_person_name
     *
     * @return string
     */
    public function getContactPersonName()
    {
        return $this->contact_person_name;
    }

    /**
     * Returns the value of field contact_person_email
     *
     * @return string
     */
    public function getContactPersonEmail()
    {
        return $this->contact_person_email;
    }

    /**
     * Returns the value of field contact_person_message
     *
     * @return string
     */
    public function getContactPersonMessage()
    {
        return $this->contact_person_message;
    }

    /**
     * Returns the value of field contact_person_mobile_no
     *
     * @return string
     */
    public function getContactPersonMobileNo()
    {
        return $this->contact_person_mobile_no;
    }

    /**
     * Returns the value of field contact_updated_date
     *
     * @return string
     */
    public function getContactUpdatedDate()
    {
        return $this->contact_updated_date;
    }

    /**
     * Returns the value of field contact_created_date
     *
     * @return string
     */
    public function getContactCreatedDate()
    {
        return $this->contact_created_date;
    }

    /**
     * Returns the value of field contact_created_by
     *
     * @return string
     */
    public function getContactCreatedBy()
    {
        return $this->contact_created_by;
    }

    /**
     * Returns the value of field contact_updated_by
     *
     * @return string
     */
    public function getContactUpdatedBy()
    {
        return $this->contact_updated_by;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'contact_me';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ContactMe[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ContactMe
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
