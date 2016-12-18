<?php

class PostController extends Controller
{


    public function index()
    {
        /*
         * on charge le mode post
         */
        $post = $this->loadModel('post');
        /*
         * on recuper tous les article qui se trouve dans la table posts on le stock dans la variable posts
         * apres on rend cette variable a la vie
         */
        /*
        * puis que on peu pas les affiche tous a la foit on fait une pagination
        */
        /*
         * tautal de article
         */
        $tautal_article = $post->count('id');
        $nbr_article_page = 6;
        $max_right_left = 4;
        $last_page = ceil($tautal_article / $nbr_article_page);
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page_num = $_GET['page'];
        } else {
            $page_num = 1;
        }
        if ($page_num < 1) {
            $page_num = 1;
        } elseif ($page_num > $last_page) {
            $page_num = $last_page;
        }
        $limit = ' LIMIT ' . ceil(($page_num - 1) * $nbr_article_page) . ',' . $nbr_article_page;
        $posts = $post->paginate($limit);
        $pagination = '';
        if ($last_page != 1) {
            if ($page_num > 1) {
                $prev = $page_num - 1;
                $pagination .= '<a href="http://local.dev/post/index?page=' . $prev . '">Precedent</a>';
                for ($i = $page_num - $max_right_left; $i < $page_num; $i++) {
                    if ($i > 0) {
                        $pagination .= '<a href="http://local.dev/post/index?page=' . $i . '">' . $i . '</a>';
                    }
                }
            }
            $pagination .= '<span class="active" style="background-color: rgba(255, 36, 201, 0.41);">' . $page_num . '</span>';
            for ($i = $page_num + 1; $i <= $last_page; $i++) {
                $pagination .= '<a href="http://local.dev/post/index?page=' . $i . '">' . $i . '</a>';
                if ($i >= $page_num + $max_right_left) {
                    break;
                }
            }
            if ($page_num != $last_page) {
                $next = $page_num + 1;
                $pagination .= '<a href="http://local.dev/post/index?page=' . $next . '">Suivant</a>';
            }
        }

        return $this->views('posts/index', compact('posts', 'pagination'));

    }

    public function show($id)
    {
        $post = $this->loadModel('post')->find($id);
        return $this->views('posts/show',compact('post'));

    }

}
