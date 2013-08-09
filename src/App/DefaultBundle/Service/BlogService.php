<?php
namespace App\DefaultBundle\Service;

class BlogService
{
    protected $feed;

    public function __construct(\SimplePie $feed, $feedUrl)
    {
        $this->feed = $feed;
        $this->feed->set_feed_url($feedUrl);
        $this->feed->init();
    }

    /**
     * Get latest posts from blog
     * @param  int $numberOfPosts number of posts to take
     * @return array
     */
    public function getLatestPosts($numberOfPosts)
    {
        $posts = array_slice($this->feed->get_items(), 0, $numberOfPosts);
        $latestPosts = [];
        foreach ($posts as $post) {
            $latestPosts[] = [
                'title' => $post->get_title(),
                'link' => $post->get_permalink(),
                'text' => $post->get_description(),
                'date' => $post->get_date('j F, Y'),
            ];
        }

        // Here we take only 3 paragraphs to show on site
        if (! empty($latestPosts)) {
            preg_match_all('/(<p>.*?<\/p>)/im', $latestPosts[0]['text'], $matches);
            $latestPosts[0]['text'] = implode('', array_slice($matches[1], 0, 3));
        }

        return $latestPosts;
    }
}
