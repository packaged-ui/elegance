<?php
namespace PackagedUi\Elegance\Card;

use Packaged\Glimpse\Tags\Div;

class Card extends Div
{
  protected $_header;
  protected $_withContentContainer = true;

  public function __construct($content = null)
  {
    parent::__construct($content);
    $this->addClass('card');
  }

  public function disableContentContainer()
  {
    $this->_withContentContainer = false;
    return $this;
  }

  public function enableContentContainer()
  {
    $this->_withContentContainer = true;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getHeader()
  {
    return $this->_header;
  }

  /**
   * @param mixed $header
   *
   * @return Card
   */
  public function setHeader($header)
  {
    $this->_header = $header;
    return $this;
  }

  protected function _getContentForRender()
  {
    $return = [];
    if($this->_header)
    {
      $return[] = Div::create($this->_header)->addClass('card-header');
    }
    if($this->_withContentContainer)
    {
      $return[] = Div::create(parent::_getContentForRender())->addClass('card-content');
    }
    else
    {
      $return[] = parent::_getContentForRender();
    }
    return $return;
  }

}
