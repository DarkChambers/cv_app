<?php
namespace App\Controller;

use App\Entity\Cv;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


/**
 *
 * @Route("/")
 */
class HomeController extends AbstractController{

    /**
     * @Route("/",name="cv_home")
     *
     */
    public function index(){

        // ToDo get all informations from the default CV  and pass it to the view

        // first check wich cv is define by default

        // second get all information from the CV

        $repository = $this->getDoctrine()->getRepository(Cv::class);
        $cv =new Cv();
        $cv = $repository->find(3);

        return $this->render('home\index.html.twig',["cv"=>$cv]);
    }
}
