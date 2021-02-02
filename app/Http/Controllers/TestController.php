<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client as GoutteClient;
use Symfony\Component\DomCrawler\Crawler;

class TestController extends Controller
{
    public $client;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $test = Scraper::handle("https://www.mklat.com/category/technology/computer-internet/")
        try {
            $this->client = new GoutteClient();

            $crawler = $this->client->request('GET', "https://www.mklat.com/category/technology/computer-internet/");


            $crawler->filter(".pages-numbers > li")->each(function ($node) {
                dd($node->text());

                $divs = $node->children()->filter('div');
                $info = $divs->eq(0);
                $title = $info->filter("[class='post-title']")->first();
                dd($title->html());

                $title = $node->filter('a')->first();

            });

            // dd($crawler);


            $translateExpre = $this->translateCSSExpression("title[h2.post-title]||excerpt[p.post-excerpt]||image[img.wp-post-image[src]]||source_link[.post-title a[href]]");

            $linkObj = [];

            if (isset($translateExpre['title'])) {

                $data = [];
                // filter
                $crawler->filter(".mag-box-container .post-item")->each(function ($node) use ($translateExpre, &$data, $linkObj) {
                    // using the $node var we can access sub elements deep the tree

                    foreach ($translateExpre as $key => $val) {

                        if ($node->filter($val['selector'])->count() > 0) {
                            // dd($val);
                            // dd($node->filter($val['selector'])->first()->text());

                            if ($val['is_attribute'] == false) {
                                $data[$key][] = preg_replace("#\n|'|\"#", '', $node->filter($val['selector'])->text());

                            } else {
                                if ($key == 'source_link') {

                                    $item_link = $node->filter($val['selector'])->attr($val['attr']);

                                    // append website url in case the article is not full url
                                    // if ($linkObj->itemSchema->is_full_url == 0) {
                                    //     $item_link = $linkObj->website->url . $node->filter($val['selector'])->attr($val['attr']);
                                    // }

                                    $data[$key][] = $item_link;
                                    $data['content'][] = $this->fetchFullContent($item_link, ".entry-content");
                                } else {
                                    $data[$key][] = $node->filter($val['selector'])->attr($val['attr']);
                                }

                            }
                        }


                    }
                    // dd($data);

                    // $data['website_id'][] = $linkObj->website->id;
                });
                dd($data);
                $this->save($data);
                $this->results = $data;
            }
        } catch (\Exception $ex) {
            $this->status = $ex->getMessage();
        }



    }

        /**
     * fetchFullContent
     *
     * this method pulls the full content of a single item using the
     * item url and selector
     *
     * @param $item_url
     * @param $selector
     * @return string
     */
    protected function fetchFullContent($item_url, $selector)
    {
        try {
            $crawler = $this->client->request('GET', $item_url);

            return $crawler->filter($selector)->html();
        } catch (\Exception $ex) {
            return "";
        }
    }

       /**
     * translateCSSExpression
     *
     * translate the css expression into corresponding fields and sub selectors
     *
     * @param $expression
     * @return array
     */
    protected function translateCSSExpression($expression)
    {
        $exprArray = explode("||", $expression);
        // dd($exprArray);

        // try to match split that expression into pieces
        $regex = '/(.*?)\[(.*)\]/m';
        $fields = [];
        foreach ($exprArray as $subExpr) {
            preg_match($regex, $subExpr, $matches);
            if(isset($matches[1]) && isset($matches[2])) {
                $is_attribute = false;
                $selector = $matches[2];
                $attr = "";
                // if this condition meets then this is attribute like img[src] or a[href]
                if (strpos($selector, "[") !== false && strpos($selector, "]") !== false) {
                    $is_attribute = true;
                    preg_match($regex, $matches[2], $matches_attr);
                    $selector = $matches_attr[1];
                    $attr = $matches_attr[2];
                }
                $fields[$matches[1]] = ['field' => $matches[1], 'is_attribute' => $is_attribute, 'selector' => $selector, 'attr' => $attr];
            }
        }
        return $fields;
    }
}
