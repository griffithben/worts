<?php
  require_once(__DIR__."/meetups/Meetups.php");
  $json = file_get_contents(__DIR__."/../data/meetups.json");
  $meetups = new Meetups(json_decode($json));
?>
<!-- Portfolio Grid Section -->
<section id="meetups" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Meetups</h2>
                <h3 class="section-subheading text-muted">Meetups are for everyone on the <strong><u>first Wednesday of every month.</u></strong><br/><br/>Whether you're new to brewing or have been doing it for years, come on out!</h3>
            </div>
        </div>
        <div class="row">
            <?php
              echo $meetups->renderMeetups();
            ?>
        </div>
    </div>
</section>
