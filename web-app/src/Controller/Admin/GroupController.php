<?php

namespace App\Controller\Admin;

use App\Repository\GroupRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class GroupController
{

    public GroupRepository $groupRepository;

    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
    * @Route("/admin/groups", name="admin.groups", methods={"GET"})
    */
    public function index()
    {
        $groups = $this->groupRepository->findAll();

        return
    }

    /**
    * @Route("/admin/groups", name="admin.groups.store", methods={"POST"})
    */
    public function store(Request $request)
    {
        // validate request 
        dd($request);

        $dt = new \DateTimeImmutable();

        // create group
        $group = $this->groupRepository->create([
            'name' => 'Web-design',
            'created_at' => $dt,
            'updated_at' => $dt,
            // 'tutor' => $tutor
        ]);

        

        dd($group);
    }

    /**
    * @Route("/admin/groups/{id}", name="admin.groups.store", methods={"DELETE"})
    */
    public function delete(int $id)
    {
        // validate request 

        // delete group
        $group = $this->groupRepository->delete($id);

        return $group;  
    }
}