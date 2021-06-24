<?php
namespace PackagedUi\FusionDemo\Elements;

use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\ToastNotification\ToastNotification;
use PackagedUi\Fusion\ToastNotification\ToastNotificationContainer;
use PackagedUi\Fusion\ToastNotification\ToastNotificationPosition;
use PackagedUi\FusionDemo\AbstractDemoPage;

class NotificationDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Notification';
  }

  protected function _getFaIcon()
  {
    return FaIcon::YOAST;
  }

  protected function _content(): array
  {
    $return = [];

    $return[] = ToastNotificationContainer::create()
      ->addToastNotification(
        ToastNotification::create()
          ->setTitle('Lorem Ipsum')
          ->setDescription(
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas suscipit enim molestie mauris varius, et tincidunt metus mattis. Fusce at turpis nisi. Duis imperdiet libero.'
          )->setDisplayDuration(3000)->setColor(Color::YELLOW())
      )->addToastNotification(
        ToastNotification::create()
          ->setColor(Color::GREEN())
          ->setTitle('Lorem Ipsum')
          ->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus cursus.')
          ->setIcon(FaIcon::create(FaIcon::BOLD))
          ->removable()
      )->setId('toasts');

    $return[] = ToastNotificationContainer::create()
      ->addToastNotification(
        ToastNotification::create()
          ->setTitle('Lorem Ipsum')
          ->setDescription(
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas suscipit enim molestie mauris varius, et tincidunt metus mattis. Fusce at turpis nisi. Duis imperdiet libero.'
          )
          ->setColor(Color::BLUE())
          ->setDelay(4000)
      )->addToastNotification(
        ToastNotification::create()
          ->setColor(Color::GREEN())
          ->setTitle('Lorem Ipsum')
          ->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus cursus.')
          ->setIcon(FaIcon::create(FaIcon::BOLD), true)
          ->removable()
      )->setPosition(ToastNotificationPosition::BOTTOM_LEFT());

    $return[] = ToastNotificationContainer::create()
      ->addToastNotification(
        ToastNotification::create()
          ->setTitle('Lorem Ipsum')
          ->setDescription(
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas suscipit enim molestie mauris varius, et tincidunt metus mattis. Fusce at turpis nisi. Duis imperdiet libero.'
          )
      )->addToastNotification(
        ToastNotification::create()
          ->setColor(Color::GREEN())
          ->setTitle('Lorem Ipsum')
          ->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus cursus.')
          ->setIcon(FaIcon::create(FaIcon::BOLD))
          ->setDisplayDuration(5000)
      )->setPosition(ToastNotificationPosition::BOTTOM_RIGHT());

    return $return;
  }
}
