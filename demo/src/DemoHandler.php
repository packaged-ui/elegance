<?php
namespace PackagedUi\FusionDemo;

use Cubex\Controller\Controller;
use Packaged\Context\Context;
use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Div;
use Packaged\Ui\Element;
use PackagedUi\FusionDemo\Layout\Layout;

class DemoHandler extends Controller
{
  protected $_pages = [];

  protected function _allPages()
  {
    return $this->getContext()->getCubex()->retrieve(ConfigHandler::class)->getPages();
  }

  protected function _generateRoutes()
  {
    yield self::_route('/_all', 'allPages');
    $firstPage = null;
    foreach($this->_allPages() as $page)
    {
      if($firstPage == null)
      {
        $firstPage = $page;
      }
      $this->_pages[$page->getID()] = $page;
      yield self::_route($page->getID(), $page->getID());
    }
    return $firstPage ? $firstPage->getID() : null;
  }

  public function processAllPages()
  {
    return Div::create($this->_allPages());
  }

  protected function _prepareHandler(Context $c, $handler)
  {
    if(isset($this->_pages[$handler]))
    {
      return $this->_pages[$handler];
    }
    return parent::_prepareHandler($c, $handler);
  }

  protected function _prepareResponse(Context $c, $result, $buffer = null)
  {
    if($result instanceof Element || $result instanceof HtmlTag || is_scalar($result))
    {
      $theme = $this->_createTheme();
      $theme->setContext($this->getContext())->setContent($result);
      return parent::_prepareResponse($c, $theme, $buffer);
    }

    return parent::_prepareResponse($c, $result, $buffer);
  }

  protected function _createTheme()
  {
    return new Layout();
  }
}
