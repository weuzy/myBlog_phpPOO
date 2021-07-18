<?php

namespace App\Controllers;

use App\Models\Tag;
use App\Models\Post;


class BlogController extends Controller {
    

        public function welcome() {
            return $this->view('blog.welcome');
        }

        public function index() 
        {
            $post = new Post($this->getDB());
            $posts = $post->all();

            // $statements = $this->db->getPDO()->query('SELECT * FROM posts ORDER BY created_at DESC');
            // $posts  = $statements->fetchAll();

            return $this->view('blog.index', compact('posts'));
        }

        public function show(int $id) 
        {
            $post = new Post($this->getDB());
            $post = $post->findById($id);

            // $statements = $this->db->getPDO()->prepare("SELECT * FROM posts WHERE id = ?");
            // $statements->execute([$id]);
            // $post = $statements->fetch();

            return $this->view('blog.show', compact('post'));
        }

        public function tag(int $id)
        {
            $tag = (new Tag($this->getDB()))->findById($id);
            return $this->view('blog.tag', compact('tag'));
        }
    }   
