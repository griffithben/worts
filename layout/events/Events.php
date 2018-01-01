<?php

class Events
{
  public $events = [];
  public $event_template = null;

  public function __construct(array $events)
  {
    $this->events = $events;
  }

  public function renderEvents()
  {
    $out = "";
    foreach($this->events as $key => $event)
    {
      $item_class = (!($key % 2)) ? "timeline" : "timeline-inverted";
      $event_template = $this->getEventTemplate();
      $event_template = $this->replace('date', $date, $event_template);
      $event_template = $this->replace('title', $event->title, $event_template);
      $event_template = $this->replace('image', $event->image, $event_template);
      $event_template = $this->replace('description', $event->description, $event_template);
      $event_template = $this->replace('url', $event->url, $event_template);
      $event_template = $this->replace('item_class', $item_class, $event_template);
      $out .= $event_template;
    }

    return $out;
  }

  protected function replace($key, $value, $template)
  {
    $search = "<!".$key."!>";
    return str_replace($search, $value, $template);
  }

  protected function getEventTemplate()
  {
    if(empty($this->event_template))
    {
      $this->event_template = file_get_contents(__DIR__.'/./event.tmpl');
    }
    return $this->event_template;
  }
}
