<?php
  require_once(__DIR__."/events/Events.php");
  $json = file_get_contents(__DIR__."/../data/events.json");
  $events = new Events(json_decode($json));
?>
<!-- Events Section -->
<section id="events">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Events</h2>
                <h3 class="section-subheading text-muted">Here's a list of all our upcoming events!</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="timeline">
                    <?php
                      echo $events->renderEvents();
                    ?>
                </ul>
            </div>
        </div>

    </div>
</section>
