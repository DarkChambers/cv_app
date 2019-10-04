<?php

namespace App\DataFixtures;

use App\Entity\Cv;
use App\Entity\DefaultConfig;
use App\Entity\Experience;
use App\Entity\Formation;
use App\Entity\Profil;
use App\Entity\Skill;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder=$passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // ToDo add Fixtures
        $this->loadUser($manager);
        $this->loadCv($manager);
        $this->loadExperience($manager);
        $this->loadFormation($manager);
        $this->loadSkill($manager);
        $this->loadProfil($manager);
        $this->loadDefaultConfig($manager);


        $manager->flush();
    }

    public function loadCv(ObjectManager $manager)
    {
       $cv = new Cv();
       $cv->setTitle('Concepteur & Développeur');
       $cv->setDescription('CV de Concepteur et développeur d\'applications');
       $this->setReference("CV",$cv);

       $manager->persist($cv);

    }

    public function loadDefaultConfig(ObjectManager $manager)
    {
        $defaultConfig=new DefaultConfig();
        $defaultConfig->setActive(true);
        $defaultConfig->setDefaultCv($this->getReference("CV"));
        $manager->persist($defaultConfig);

    }

    public function loadExperience(ObjectManager $manager)
    {
        $exp=new Experience();
        $exp->setCv($this->getReference("CV"));
        $exp->setPosition("Développeur ASP.NET MVC");
        $exp->setEntreprise("Caisse d'épargne");
        $exp->setContent("développement d'une application de gestion d'opérations financières</br>Technologie mises en oeuvres : ASP.NET MVC / C# / JQuery / SQL");
        $exp->setPeriod("Juin 2019 - Août 2019");
        $exp->setDisplayOrder(1);

        $manager->persist($exp);

    }

    public function loadFormation(ObjectManager $manager)
    {
        $formation=new Formation();
        $formation->setCv($this->getReference("CV"));
        $formation->setTitle("Concepteur Developpeur d'applications");
        $formation->setPeriod("Novembre 2018 - Août 2019");
        $formation->setContent("Titre porfessionnel de Concepteur Développeur d'applications Niveau II");
        $formation->setDegree("Bac+4");
        $formation->setSchool("M2ii Formation");
        $formation->setDisplayOrder(1);

        $manager->persist($formation);


    }

    public function loadUser(ObjectManager $manager)
    {
        $user=new User();
        $user->setEmail('monteilchristophe@live.fr');
        $user->setIsActive(true);
        $user->addRole('ROLE_ADMIN');
        $plainPassword='adminTest';
        $password = $this->passwordEncoder->encodePassword($user, $plainPassword);
        $user->setPassword($password);
        $manager->persist($user);

    }
    public function loadReference(ObjectManager $manager)
    {

    }
    public function loadSkill(ObjectManager $manager)
    {
        $skill=  new Skill();
        $skill->setCv($this->getReference("CV"));
        $skill->setName("HTML/CSS/JAVASCRIPT");
        $skill->setLevel(75);
        $skill->setDisplayOrder(1);

        $manager->persist($skill);
    }

    public function loadProfil(ObjectManager $manager)
    {
        $profil= new Profil();
        $profil->setCv($this->getReference('CV'));
        $profil->setFirstName("Christophe");
        $profil->setLastName("Monteil");
        $profil->setAge(45);
        $profil->setEmail("monteilchristophe@live.fr");
        $profil->setPhone("06 04 46 89 04");
        $profil->setAdress("1, rue des viviers. 27600 Champenard");
        $profil->setLanguage("Français, Anglais");
        $profil->setAbout("Bonjour ! Je suis Christophe Monteil. Concepteur et développeur d'applications.</br>Je peux vous aider à la concrétiser de vos projets.</br>Application Web, Desktop ou mobile, jeux : je suis à votre écoute !</br>");

        $manager->persist($profil);
    }
}
