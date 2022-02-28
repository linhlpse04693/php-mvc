<?php

namespace App\Controllers;

use App\Models\Todo;
use App\Models\User;
use Core\Controller;
use \Core\View;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class TodoController extends Controller
{
    protected Todo $todo;

    public function __construct($routeParams)
    {
        $this->todo = new Todo();

        parent::__construct($routeParams);
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function index()
    {
        $todoItems = $this->todo->all();

        View::renderTemplate('todo/index.twig', compact('todoItems'));
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function create()
    {
        View::renderTemplate('todo/create.twig');
    }
}
