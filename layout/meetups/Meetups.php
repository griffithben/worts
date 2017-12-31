<?php

class Meetups
{
  public $meetups = [];
  public $meetup_template = null;
  public $speaker_template = null;

  public function __construct(array $meetups)
  {
    $this->meetups = $meetups;
  }

  public function renderMeetups()
  {
    $out = "";
    foreach($this->meetups as $meetup)
    {
      $meetup_template = $this->getMeetupTemplate();
      $meetup_template = $this->replace('date', $meetup->date, $meetup_template);
      $meetup_template = $this->replace('time', $meetup->time, $meetup_template);
      $meetup_template = $this->replace('location', $meetup->location, $meetup_template);
      $meetup_template = $this->replace('location_url', $meetup->location_url, $meetup_template);
      $meetup_template = $this->replace('location_img', $meetup->location_img, $meetup_template);
      $meetup_template = $this->replace('speakers', $this->renderSpeakers($meetup->speakers), $meetup_template);
      $out .= $meetup_template;
    }

    return $out;
  }

  protected function renderSpeakers(array $speakers)
  {
    $out = '';
    foreach($speakers as $speaker)
    {
      $speaker_template = $this->getSpeakerTemplate();
      $speaker_template = $this->replace('speaker_name', $speaker->name, $speaker_template);
      $speaker_template = $this->replace('speaker_img', $speaker->img, $speaker_template);
      $speaker_template = $this->replace('speaker_talk', $speaker->talk, $speaker_template);
      $out .= $speaker_template;
    }

    return $out;
  }

  protected function replace($key, $value, $template)
  {
    $search = "<!".$key."!>";
    return str_replace($search, $value, $template);
  }

  protected function getMeetupTemplate()
  {
    if(empty($this->meetup_template))
    {
      $this->meetup_template = file_get_contents(__DIR__.'/./meetup.tmpl');
    }
    return $this->meetup_template;
  }

  protected function getSpeakerTemplate()
  {
    if(empty($this->speaker_template))
    {
      $this->speaker_template = file_get_contents(__DIR__.'/./speaker.tmpl');
    }
    return $this->speaker_template;
  }
}
