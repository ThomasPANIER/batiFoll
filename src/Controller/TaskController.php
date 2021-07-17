<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Repository\TaskRepository;
use App\Entity\Project;
use App\Repository\ProjectRepository;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/task')]
class TaskController extends AbstractController
{
    #[Route('/', name: 'task_index', methods: ['GET'])]
    public function index(TaskRepository $taskRepository): Response
    {
        return $this->render('task/index.html.twig', [
            'tasks' => $taskRepository->findAll(),
        ]);
    }

    #[Route('/new/{id}', name: 'task_new', methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function new(Request $request, int $id=1, ProjectRepository $projectRepository): Response
    {
        $task = new Task();
        $project = $projectRepository->find($id);
        
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task->setCreationdate(new \DateTime());
            $task->setTaskproject($project);
            
            dump($task);
            $entityManager = $this->getDoctrine()->getManager();
            
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('project_show', ['id' => $task->getTaskproject($project)->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('task/new.html.twig', [
            'task' => $task,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'task_show', methods: ['GET'])]
    public function show(Task $task, int $id): Response
    {
        $project = $task->getTaskproject($id);

        return $this->render('task/show.html.twig', [
            'task' => $task,
            'project' => $project,
        ]);
    }

    #[Route('/{id}/edit', name: 'task_edit', methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function edit(Request $request, Task $task, int $id=1, ProjectRepository $projectRepository): Response
    {
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        $project = $projectRepository->find($id);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('project_show', ['id' => $task->getTaskproject($project)->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('task/edit.html.twig', [
            'task' => $task,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'task_delete', methods: ['POST'], requirements: ['id' => '\d+'])]
    public function delete(Request $request, Task $task, int $id=1, ProjectRepository $projectRepository): Response
    {
        $project = $projectRepository->find($id);
        
        if ($this->isCsrfTokenValid('delete'.$task->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($task);
            $entityManager->flush();
        }

        return $this->redirectToRoute('project_show', ['id' => $task->getTaskproject($project)->getId()], Response::HTTP_SEE_OTHER);
    }
}
