<?php

namespace App\Controller;

use App\Entity\Item;
use App\Repository\ItemRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemController extends Controller
{
    /**
     * @Route("/item", name="item")
     */
    public function index()
    {
        $items = $this->getDoctrine()
                     ->getRepository(Item::class)
                     ->findAll();
        return $this->json(array('items' => $items));
    }
}
