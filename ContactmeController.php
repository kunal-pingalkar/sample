<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
// Additional namespaces used
use Phalcon\Tag;
use Phalcon\Validation,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\Email,
    Phalcon\Validation\Validator\Regex;

/**
 * ContactMe class, It loads during the contact form page requested
 * 
 * @author Kunal Pingalkar <kunal.pingalkar@gmail.com>
 * 
 */
class ContactMeController extends ControllerBase
{
    public function initialize()
    {
        $this->view->setTemplateAfter('main');
        Tag::setTitle('Contact Me');
        parent::initialize();
    }
    /**
     * Index action of ContactMe Controller
	 * This is a default action
     */
    public function indexAction()
    {
        //$this->persistent->parameters = null;
    }

    /**
     * Searches for contact_me
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'ContactMe', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "contact_me_id";

        $contact_me = ContactMe::find($parameters);
        if (count($contact_me) == 0) {
            $this->flash->notice("The search did not find any contact_me");

            return $this->dispatcher->forward(array(
                "controller" => "contact_me",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $contact_me,
            "limit"=> 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a contact_me
     *
     * @param string $contact_me_id
     */
    public function editAction($contact_me_id)
    {
        if (!$this->request->isPost()) {

            $contact_me = ContactMe::findFirstBycontact_me_id($contact_me_id);
            if (!$contact_me) {
                $this->flash->error("contact_me was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "contact_me",
                    "action" => "index"
                ));
            }

            $this->view->contact_me_id = $contact_me->contact_me_id;

            $this->tag->setDefault("contact_me_id", $contact_me->getContactMeId());
            $this->tag->setDefault("contact_person_name", $contact_me->getContactPersonName());
            $this->tag->setDefault("contact_person_email", $contact_me->getContactPersonEmail());
            $this->tag->setDefault("contact_person_message", $contact_me->getContactPersonMessage());
            $this->tag->setDefault("contact_person_mobile_no", $contact_me->getContactPersonMobileNo());
            $this->tag->setDefault("contact_updated_date", $contact_me->getContactUpdatedDate());
            $this->tag->setDefault("contact_created_date", $contact_me->getContactCreatedDate());
            $this->tag->setDefault("contact_created_by", $contact_me->getContactCreatedBy());
            $this->tag->setDefault("contact_updated_by", $contact_me->getContactUpdatedBy());
            
        }
    }

    /**
     * Creates a new contact_me
	 * 
	 * @return To Index Action of ContactMe Controller
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "contact_me",
                "action" => "index"
            ));
        }

        $contact_me = new ContactMe();

        $contact_me->setContactPersonName($this->request->getPost("contact_person_name"));
        $contact_me->setContactPersonEmail($this->request->getPost("contact_person_email"));
        $contact_me->setContactPersonMessage($this->request->getPost("contact_person_message"));
        $contact_me->setContactPersonMobileNo($this->request->getPost("contact_person_mobile_no"));
        $contact_me->setContactUpdatedDate($this->request->getPost("contact_updated_date"));
        $contact_me->setContactCreatedDate($this->request->getPost("contact_created_date"));
        $contact_me->setContactCreatedBy($this->request->getPost("contact_created_by"));
        $contact_me->setContactUpdatedBy($this->request->getPost("contact_updated_by"));
        

        if (!$contact_me->save()) {
            foreach ($contact_me->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "contact_me",
                "action" => "new"
            ));
        }

        $this->flash->success("contact_me was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "contact_me",
            "action" => "index"
        ));
    }

    /**
     * Saves a contact_me 
	 * 
     * @return To Index Action of ContactMe Controller
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "contact_me",
                "action" => "index"
            ));
        }

        $contact_me_id = $this->request->getPost("contact_me_id");

        $contact_me = ContactMe::findFirstBycontact_me_id($contact_me_id);
        if (!$contact_me) {
            $this->flash->error("contact_me does not exist " . $contact_me_id);

            return $this->dispatcher->forward(array(
                "controller" => "contact_me",
                "action" => "index"
            ));
        }

        $contact_me->setContactPersonName($this->request->getPost("contact_person_name"));
        $contact_me->setContactPersonEmail($this->request->getPost("contact_person_email"));
        $contact_me->setContactPersonMessage($this->request->getPost("contact_person_message"));
        $contact_me->setContactPersonMobileNo($this->request->getPost("contact_person_mobile_no"));
        $contact_me->setContactUpdatedDate($this->request->getPost("contact_updated_date"));
        $contact_me->setContactCreatedDate($this->request->getPost("contact_created_date"));
        $contact_me->setContactCreatedBy($this->request->getPost("contact_created_by"));
        $contact_me->setContactUpdatedBy($this->request->getPost("contact_updated_by"));
        

        if (!$contact_me->save()) {

            foreach ($contact_me->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "contact_me",
                "action" => "edit",
                "params" => array($contact_me->contact_me_id)
            ));
        }

        $this->flash->success("contact_me was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "contact_me",
            "action" => "index"
        ));
    }

    /**
     * Deletes a contact_me
     *
     * @param string $contact_me_id
	 * 
	 * @return To Index Action of ContactMe Controller 
     */
    public function deleteAction($contact_me_id)
    {
        $contact_me = ContactMe::findFirstBycontact_me_id($contact_me_id);
        if (!$contact_me) {
            $this->flash->error("contact_me was not found");

            return $this->dispatcher->forward(array(
                "controller" => "contact_me",
                "action" => "index"
            ));
        }

        if (!$contact_me->delete()) {

            foreach ($contact_me->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "contact_me",
                "action" => "search"
            ));
        }

        $this->flash->success("contact_me was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "contact_me",
            "action" => "index"
        ));
    }

}
