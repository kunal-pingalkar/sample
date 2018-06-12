<?php

use Phalcon\Tag;
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

/**
 * Aboutme class for displaying information which stored by Aboutme model
 * 
 * @author Kunal Pingalkar <kunal.pingalkar@gmail.com>
 */
class AboutmeController extends ControllerBase
{

	public function initialize()
    {
        $this->view->setTemplateAfter('main');
        Tag::setTitle('About Me');
        parent::initialize();
    }
	/**
     * Index action of ContactMe Controller
	 * This is a default action
     */
    public function indexAction()
    {
        //$this->persistent->parameters = null;
		$aboutme = Aboutme::find(array(
			"visibility"=>"y",
			"order"=>"about_me_updated_date desc"
		));
		if (count($aboutme) == 0) {
			$this->flash->notice("The is no content for aboutme...!");

            return $this->dispatcher->forward(array(
                "controller" => "aboutme",
                "action" => "index"
            ));
		}
		foreach($aboutme as $aboutmeinfo){
			$this->view->setVar("aboutmecontent", $aboutmeinfo->getAboutMeInformation());
		}
    }

    /**
     * Searches for aboutme
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Aboutme", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "about_me_id";

        $aboutme = Aboutme::find($parameters);
        if (count($aboutme) == 0) {
            $this->flash->notice("The search did not find any aboutme");

            return $this->dispatcher->forward(array(
                "controller" => "aboutme",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $aboutme,
            "limit"=> 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displayes the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a aboutme
     *
     * @param string $about_me_id
     */
    public function editAction($about_me_id)
    {

        if (!$this->request->isPost()) {

            $aboutme = Aboutme::findFirstByabout_me_id($about_me_id);
            if (!$aboutme) {
                $this->flash->error("aboutme was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "aboutme",
                    "action" => "index"
                ));
            }

            $this->view->about_me_id = $aboutme->getAboutMeId();

            $this->tag->setDefault("about_me_id", $aboutme->getAboutMeId());
            $this->tag->setDefault("visibility", $aboutme->getVisibility());
            $this->tag->setDefault("about_me_information", $aboutme->getAboutMeInformation());
            $this->tag->setDefault("about_me_updated_date", $aboutme->getAboutMeUpdatedDate());
            $this->tag->setDefault("about_me_created_date", $aboutme->getAboutMeCreatedDate());
            $this->tag->setDefault("about_me_created_by", $aboutme->getAboutMeCreatedBy());
            $this->tag->setDefault("about_me_updated_by", $aboutme->getAboutMeUpdatedBy());
            
        }
    }

    /**
     * Creates a new aboutme
	 * 
	 * @return To Index Action of Aboutme Controller
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "aboutme",
                "action" => "index"
            ));
        }

        $aboutme = new Aboutme();

        $aboutme->setVisibility($this->request->getPost("visibility"));
        $aboutme->setAboutMeInformation($this->request->getPost("about_me_information"));
        $aboutme->setAboutMeUpdatedDate($this->request->getPost("about_me_updated_date"));
        $aboutme->setAboutMeCreatedDate($this->request->getPost("about_me_created_date"));
        $aboutme->setAboutMeCreatedBy($this->request->getPost("about_me_created_by"));
        $aboutme->setAboutMeUpdatedBy($this->request->getPost("about_me_updated_by"));
        

        if (!$aboutme->save()) {
            foreach ($aboutme->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "aboutme",
                "action" => "new"
            ));
        }

        $this->flash->success("aboutme was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "aboutme",
            "action" => "index"
        ));

    }

    /**
     * Saves a aboutme edited
     *
	 * @return To Index Action of Aboutme Controller
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "aboutme",
                "action" => "index"
            ));
        }

        $about_me_id = $this->request->getPost("about_me_id");

        $aboutme = Aboutme::findFirstByabout_me_id($about_me_id);
        if (!$aboutme) {
            $this->flash->error("aboutme does not exist " . $about_me_id);

            return $this->dispatcher->forward(array(
                "controller" => "aboutme",
                "action" => "index"
            ));
        }

        $aboutme->setVisibility($this->request->getPost("visibility"));
        $aboutme->setAboutMeInformation($this->request->getPost("about_me_information"));
        $aboutme->setAboutMeUpdatedDate($this->request->getPost("about_me_updated_date"));
        $aboutme->setAboutMeCreatedDate($this->request->getPost("about_me_created_date"));
        $aboutme->setAboutMeCreatedBy($this->request->getPost("about_me_created_by"));
        $aboutme->setAboutMeUpdatedBy($this->request->getPost("about_me_updated_by"));
        

        if (!$aboutme->save()) {

            foreach ($aboutme->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "aboutme",
                "action" => "edit",
                "params" => array($aboutme->about_me_id)
            ));
        }

        $this->flash->success("aboutme was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "aboutme",
            "action" => "index"
        ));

    }

    /**
     * Deletes a aboutme
     *
     * @param string $about_me_id
	 * 
	 * @return To Index Action of Aboutme Controller
     */
    public function deleteAction($about_me_id)
    {

        $aboutme = Aboutme::findFirstByabout_me_id($about_me_id);
        if (!$aboutme) {
            $this->flash->error("aboutme was not found");

            return $this->dispatcher->forward(array(
                "controller" => "aboutme",
                "action" => "index"
            ));
        }

        if (!$aboutme->delete()) {

            foreach ($aboutme->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "aboutme",
                "action" => "search"
            ));
        }

        $this->flash->success("aboutme was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "aboutme",
            "action" => "index"
        ));
    }

}
