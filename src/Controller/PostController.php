<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\Tag;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostController extends Controller
{
        private $i;

        public  function __construct($i = 0)
        {
            $this->i += 1;
        }

    /**
     * @Route("/", name="post")
     */
    public function index()
    {
        $category = new Category();
        $category->setName('cat1' . $this->i);


        $post = new Post();
        $post->setPostText("It first text");
        $com1  = new Comment();
        $com1->setCommentText('Comment 1');
        $com2 = new Comment();
        $com2->setCommentText("Comment 2");
        $post->setComments($com1);
        $post->setComments($com2);
      /*  $com1->setPost($post);
        $com2->setPost($post);*/
        $tag1 = new Tag();
        $tag1->  setTagText('Tag 1');
        $tag2 = new Tag();
        $tag2->setTagText("Tag 2");
        $tag1->setPosts([$post]);
        $tag2->setPosts([$post]);
      /*  $post->setTags($tag1);
        $post->setTags($tag2);*/

        $post->setCategory($category);
        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->persist($com1);
        $em->persist($com2);
        $em->persist($tag1);
        $em->persist($tag2);

        $em->persist($post);
      /*  dump($post);
        die;*/
        $em->flush();

        $repository = $this->getDoctrine()->getRepository(Post::class);
        $posts = $repository->findAll();


        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
            'posts' => $posts,
        ]);
    }
}
