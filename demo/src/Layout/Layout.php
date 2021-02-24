<?php
namespace PackagedUi\FusionDemo\Layout;

use Cubex\Context\Context;
use Packaged\Context\ContextAware;
use Packaged\Context\ContextAwareTrait;
use Packaged\Event\Events\CustomEvent;
use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\Link;
use Packaged\Ui\Element;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Fusion;
use PackagedUi\Fusion\Layout\Drawer\Drawer;
use PackagedUi\Fusion\Layout\LayoutInterface;
use PackagedUi\Fusion\Menu\Menu;
use PackagedUi\Fusion\Menu\MenuItem;
use PackagedUi\FusionDemo\ConfigHandler;
use PackagedUi\FusionDemo\UiPage;

class Layout extends Element implements ContextAware
{
  use ContextAwareTrait;

  const RENDER_EVENT = "fusion.ui.layout.render";

  protected $_content = [];

  public function render(): string
  {
    $this->getContext()->events()->trigger(new CustomEvent(self::RENDER_EVENT));
    return parent::render();
  }

  public function setContent($content)
  {
    $this->_content = $content;
    return $this;
  }

  public function getContent()
  {
    return Drawer::create($this->buildMenu())
      ->setAppContent(
        Link::create("#", FaIcon::create(FaIcon::BARS))->addClass('drawer__toggle', Fusion::MARGIN_MEDIUM),
        Div::create($this->_content)->addClass(LayoutInterface::PADDING_MEDIUM)
      )
      ->openByDefault()
      ->setMinState(Drawer::STATE_NARROW)
      ->setState(Drawer::STATE_PERMANENT)
      ->setReveal(Drawer::REVEAL_PEEK);
  }

  public function buildMenu()
  {
    $items = [];
    foreach($this->getPages() as $page)
    {
      $items[] = MenuItem::create($page->getName())->setHref('/' . $page->getID())->setLeading($page->getIcon());
    }
    return Menu::create($items);
  }

  /**
   * @return array|UiPage[]
   */
  public function getPages()
  {
    $ctx = $this->getContext();
    if($ctx instanceof Context)
    {
      return $ctx->getCubex()->retrieve(ConfigHandler::class)->getPages();
    }
    return [];
  }
}
