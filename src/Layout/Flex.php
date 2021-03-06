<?php
namespace PackagedUi\Fusion\Layout;

use Packaged\Glimpse\Core\AbstractContainerTag;
use Packaged\Ui\Html\HtmlElement;

class Flex extends AbstractContainerTag
{
  protected $_tag = 'div';

  protected function _prepareForProduce(): HtmlElement
  {
    $this->addClass(LayoutInterface::DISPLAY_FLEX);
    return parent::_prepareForProduce();
  }

  public function wrap()
  {
    $this->addClass(LayoutInterface::DISPLAY_FLEX_WRAP);
    return $this;
  }
}
