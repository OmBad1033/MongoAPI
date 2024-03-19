<?php

namespace App\Controller;

use App\Document\LabelTranslation;
use App\Repository\LabelTranslationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class APIController extends AbstractController
{
    public function __construct(Private LabelTranslationRepository $repo)
    {
        
    }

    #[Route('/add', name: 'add_json',methods:["POST"])]
    public function add(Request $request)
    {
        $json=$request->getContent();
        $newjson=json_decode($json,true);
        #dd($json,$newjson['label']);
        $jsonDocument=new LabelTranslation();

        $jsonData = json_decode($request->getContent(), true);
        $jsonDocument->setDoc($jsonData);
        $this->repo->save($jsonDocument,true);
        return new JsonResponse($jsonData,200);
    }

    #[Route('/get/{id}', name:'get_Json',methods:["GET","POST"])]
    public function get(int $id)
    {   
        $data=$this->repo->get($id);
        dd($data,$id);
        return new response();
    }
}
