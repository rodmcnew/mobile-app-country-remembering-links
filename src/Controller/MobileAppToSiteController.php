<?php

namespace MobileAppToSite\Controller;

use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class MobileAppToSiteController
{
    protected $toUrls;
    protected $cookieName;

    public function __construct($config)
    {
        $this->toUrls = $config['MobileAppToSite']['toUrls'];
        $this->cookieName = $config['MobileAppToSite']['cookieName'];
    }

    public function __invoke(Request $request, Response $response, callable $out = null)
    {
        $toUrl = $request->getUri()->getPath();

        if ($request->getMethod() == 'POST') {
            $countryName = $request->getParsedBody()['countryName'];
            $urlPrepend = $this->toUrls[$countryName];

            $expires = time() + 60 * 60 * 24 * 365 * 10; //ten years
            $setCookie = $this->cookieName . '=' . $urlPrepend . '; Expires='
                . gmdate('D, d M Y H:i:s \G\M\T', $expires) . '; Path=/';
            $response = new RedirectResponse($urlPrepend . $toUrl);

            //They posted a chosen country so set the cookie and redirect
            return $response->withAddedHeader('Set-Cookie', $setCookie);
        }

        $cookieParams = $request->getCookieParams();
        if (array_key_exists($this->cookieName, $cookieParams)) {
            $urlPrepend = $cookieParams[$this->cookieName];
            if (!empty($urlPrepend)) {
                //We read the redirect from the cookie and are heading there
                return new RedirectResponse($urlPrepend . $toUrl);
            }
        }


        //No cookie and not a POST so show the selection screen.
        return new HtmlResponse(
            $this->renderTemplate(
                __DIR__ . '/../../view/mobile-app-to-site.phtml'
            )
        );
    }

    /**
     * Render a template and return URL
     *
     * @param $templatePath
     * @return string
     */
    protected function renderTemplate($templatePath)
    {
        ob_start();
        require $templatePath;

        return ob_get_clean();
    }
}
