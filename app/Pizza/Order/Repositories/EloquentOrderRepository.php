<?php
/**
 * Uses the Eloquent ORM
 *
 * @author Roberto Cipriani <roberto@robertodev.com>
 * @package pizza
 */


namespace Pizza\Order\Repositories;

use Pizza\Order\Models\Order;


class EloquentOrderRepository implements OrderRepositoryInterface {


    /**
     *
     *
     * @param null $limit
     * @return obj
     */
    public function getAll($limit = NULL)
    {
        $posts = Post::with('user')->take($limit)->orderBy('id', 'DESC')->get();

        return $posts;
    }

    /**
     *
     *
     * @param null $limit
     * @return obj
     */
    public function getAllPublished($limit = NULL)
    {
        $posts = Post::published()->with('user')->take($limit)->orderBy('published_at', 'DESC')->get();

        return $posts;
    }

    /**
     *
     *
     * @param $postId
     * @return obj
     */
    public function get($postId)
    {
        $post = Post::find($postId);

        return $post;
    }

    /**
     *
     *
     * @param $slug
     * @return obj
     */
    public function getFromSlug($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return $post;
    }

    /**
     *
     *
     * @param $input
     * @return obj
     */
    public function createPost($input)
    {
        $post = new Post;

        $post->user_id = $input['userId'];
        $post->title = $input['title'];
        $post->content = $input['content'];
        $post->slug = $input['slug'];
        $post->excerpt = $input['excerpt'];
        $post->save();

        return $post;
    }

    /**
     *
     *
     * @param $postId
     * @internal param $input
     * @return obj
     */
    public function publishPost($postId)
    {
        $post = Post::find($postId);

        $post->published_at = date('Y-m-d H:i:s', time());;
        $post->save();

        return $post;
    }

    /**
     *
     *
     * @param $postId
     * @return obj
     */
    public function editPost($postId, $input)
    {
        $post = Post::find($postId);

        $post->title = $input['title'];
        $post->content = $input['content'];
        $post->excerpt = $input['excerpt'];
        $post->save();

        return $post;
    }

    /**
     *
     *
     * @param $postId
     * @return obj
     */
    public function deletePost($postId)
    {
        Post::destroy($postId);

        return true;
    }

}
