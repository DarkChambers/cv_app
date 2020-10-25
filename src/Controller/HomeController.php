<?php
namespace App\Controller;

use App\Entity\Cv;
use App\Entity\DefaultConfig;
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
        // first check which cv is define by default
        $config = $this->getDefaultConfig();
        // second get all information from the CV

        $repository = $this->getDoctrine()->getRepository(Cv::class);
        $cv =new Cv();
        if ($config!=null){
            $cv = $repository->find($config->getDefaultCv());
        }
        return $this->render('home\index.html.twig',["cv"=>$cv]);
    }

    public function getDefaultConfig() : ?DefaultConfig
    {
        $repository = $this->getDoctrine()->getRepository(DefaultConfig::class);

        $config = $repository->findOneBy(array('active'=>true));
        return $config;
    }
}
