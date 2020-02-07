<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\Form\Input;
use Packaged\Glimpse\Tags\Form\Label;
use Packaged\Glimpse\Tags\Form\Option;
use Packaged\Glimpse\Tags\Form\Select;
use Packaged\Glimpse\Tags\Form\Textarea;
use Packaged\Glimpse\Tags\LineBreak;
use Packaged\SafeHtml\SafeHtml;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Button\Button;
use PackagedUi\Fusion\Button\ButtonInferface;
use PackagedUi\Fusion\Button\ToggleButton;
use PackagedUi\FusionDemo\AbstractDemoPage;

class InputDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Inputs';
  }

  protected function _getFaIcon()
  {
    return FaIcon::KEYBOARD;
  }

  protected function _content(): array
  {
    $return = [];

    $return[] = Input::create()
      ->setAttribute('placeholder', 'Placeholder text')
      ->setType(Input::TYPE_TEXT);

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = Select::create(Option::collection(['a', 'b', 'c']));

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = Textarea::create("This is a text area");

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = Input::create()
      ->setValue('Text Here')
      ->setType(Input::TYPE_TEXT);

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = [
      Label::create('Label')->setFor('test-button'),
      ToggleButton::create(new SafeHtml('&nbsp;Text Here'))
        ->setId('test-button')
        ->setUncheckedContent('Unchecked')
        ->setCheckedContent('Checked'),
    ];

    $return[] = LineBreak::create();
    $return[] = LineBreak::create();

    $return[] = ToggleButton::create('Text Here')
      ->setName('my_button')
      ->setValue('my_value')
      ->setCheckedClass(
        Button::bem()->modifier(ButtonInferface::_BUTTON_MOD_XLARGE),
        Button::bem()->modifier(ButtonInferface::_BUTTON_MOD_ACCENT)
      );

    return $return;
  }
}
