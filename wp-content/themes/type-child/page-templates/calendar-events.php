<?php
/*
 * Template Name: Calendar Page Template
 * description: A layout to display the Bike 100 Days events calendar
 * Calendar page layout: full width, no sidebar - uses Bootstrap card tiles for layout style
 */

get_header('fullwidth'); ?>

<div id="primary" class="calendar">
<main id="main" class="site-main" role="main">
  <div id="calendar" class="container">

<?php date_default_timezone_set('America/Chicago');//set default timezone

  // parse variables
  $args = array( 
    'post_type' => 'event',
    'meta_key'  => 'date',
    'orderby'   => 'meta_value_num',//sorts by ACF datepicker values
    'order'     => 'ASC'
  );
  $calendar = new WP_Query( $args );

  $month = date( "m" ); // get current month number - 01 (is january)
  $day = date("l"); // get the current day of the week
  
  /* COMMENTED OUT FOR TESTING
  $month = 01; // get current month number - 01 (is january)
  $day = 01; // get the current day of the week
  */
?>

<!-- begin all calendar events -->

<!--JUNE-->
<?php $count = 0;// counter for modal ?>
<?php if ( $month <= 06 ) {?>
  <h1 class="month">JUNE</h1>
<?php } ?>

<!--JULY-->
<?php if ( $month == 07 ) {?>
  <h1 class="month">JULY</h1>
<?php } ?>

<!--AUGUST-->
<?php if ( $month == 8 ) {?>
  <h1 class="month">AUG</h1>
<?php } ?>

<!--SEPTEMBER-->
<?php if ( $month == 9 ) {?>
  <h1 class="month">SEPT</h1>
<?php } ?>

<!--OCTOBER-->
<?php if ( $month == 10 ) {?>
  <h1 class="month">OCT</h1>
<?php } ?>

<!--NOVEMBER-->
<!-- <?php if ( $month == 11 ) {?>
  <h1 class="month">NOV</h1>
<?php } ?> -->

<!--DECEMBER-->
<!-- <?php if ( $month == 12 ) {?>
  <h1 class="month">DEC</h1>
<?php } ?> -->

<div class="card-group calendar">
  <!-- calendar legend | days of the week -->
  <div class="weekday card <?php if ($day=="Sunday") echo "active";?>">
    <span class="desktop">Sunday</span><span class="mobile">S</span>
  </div>
  <div class="weekday card <?php if ($day=="Monday") echo "active";?>">
    <span class="desktop">Monday</span><span class="mobile">M</span>
  </div>
  <div class="weekday card <?php if ($day=="Tuesday") echo "active";?>">
    <span class="desktop">Tuesday</span><span class="mobile">T</span>
  </div>
  <div class="weekday card <?php if ($day=="Wednesday") echo "active";?>">
    <span class="desktop">Wednesday</span><span class="mobile">W</span>
  </div>
  <div class="weekday card <?php if ($day=="Thursday") echo "active";?>">
    <span class="desktop">Thursday</span><span class="mobile">R</span>
  </div>
  <div class="weekday card <?php if ($day=="Friday") echo "active";?>">
    <span class="desktop">Friday</span><span class="mobile">F</span>
  </div>
  <div class="weekday card <?php if ($day=="Saturday") echo "active";?>">
    <span class="desktop">Saturday</span><span class="mobile">S</span>
  </div>



  <?php if ( $month < 06 ) { 
    $count = $count + 1;?>
    <div class="block card last"></div>
    <?php } else if ($month == 06 && $day == 'Monday') {
    $count = $count + 1; ?>
    <div class="block card"></div>
  <?php } else if ($month == 06 && $day == 'Tuesday') {
    $count = $count + 2; ?>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } else if ($month == 06 && $day == 'Wednesday') {
    $count = $count + 3; ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } else if ($month == 06 && $day == 'Thursday') {
    $count = $count + 4; ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } else if ($month == 06 && $day == 'Friday') {
    $count = $count + 5; ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } else if ($month == 06 && $day == 'Saturday') {
    $count = $count + 6; ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } ?>


  <?php

  if ( $calendar->have_posts() ) : 
    while ( $calendar->have_posts() ) : $calendar->the_post();

      // parse the variables
      $currentDate =  date("F d, Y"); // get the current date
      $eventDate = get_field('date'); // get the date field from event ACF post
      $date_string = new DateTime($eventDate); // conversion of event date
      $eventDayNum = $date_string->format("z"); // week of event as a number
      $eventNum = $date_string->format("z"); // day of event as number | 1 through 365
      $monthString = $date_string->format("F"); // get the current month as string
      $dayNum = date("z"); //get the current day of the week | 1 of 365
      $startDay = 'June 1, 2020';// static day for testing

      // show the event <- if the day of the event is greater than or equal to then today and month is same as month string var
      if( $eventNum >= $dayNum && $monthString == 'June') { ?>
      <!-- if( $eventNum >= 01) { ?> -->

      <!-- event tile w trigger to launch modal -->
      <div class="event card<?php if ( $eventDate == $currentDate ) { echo ' current-day';} ?>" data-target="#trigger<?php echo $eventDayNum; ?>" data-toggle="modal"><!-- data-toggle="modal" -->
        <div class="card-body">
          <?php echo $date_string->format('j'); ?>
        </div>
      </div><!-- .card -->


      <!-- event modal -->
      <div class="modal fade event-modal" id="trigger<?php echo $eventDayNum; ?>" tabindex="-1" role="dialog" aria-labelledby="eventModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="eventModalLongTitle"><?php the_title();?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>

      <?php $count++; ?>


    <?php } //end if event week statement
    

    endwhile;
  endif; ?>

  <!-- add block tiles to end of calendar-->
  <?php if ($count % 7 == 1) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
  <?php } elseif ($count % 7 == 2) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
  <?php } elseif ($count % 7 == 3) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
  <?php } elseif ($count % 7 == 4) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
  <?php } elseif ($count % 7 == 5) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <?php } elseif ($count % 7 == 6) { ?>
    <div class="block card"></div>
  <?php } ?>


</div><!-- .calendar.card-group -->


<!--JULY-->
<?php $count = 0;// counter for modal ?>
<?php if ( $month < 07 ) {?>
  <div class="month-divider">&nbsp;</div>
  <h1 class="month">JULY</h1>
<?php } ?>

<div class="card-group calendar" <?php if ( $month > 07 ) { echo 'style="display:none;"';} ?>>  
  
  <?php if ( $month < 07 ) { 
    $count = $count + 3; ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
    <?php } else if ( $month == 07 && $day == 'Monday') {
    $count = $count + 1; ?>
    <div class="block card last"></div>
  <?php } else if ($month == 07 && $day == 'Tuesday') {
    $count = $count + 2; ?>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } else if ($month == 07 && $day == 'Wednesday') {
    $count = $count + 3; ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } else if ($month == 07 && $day == 'Thursday') {
    $count = $count + 4; ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } else if ($month == 07 && $day == 'Friday') {
    $count = $count + 5; ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } else if ($month == 07 && $day == 'Saturday') {
    $count = $count + 6; ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } ?>


  <?php

  if ( $calendar->have_posts() ) : 
    while ( $calendar->have_posts() ) : $calendar->the_post();

      // parse the variables
      $currentDate =  date("F d, Y"); // get the current date
      $eventDate = get_field('date'); // get the date field from event ACF post
      $date_string = new DateTime($eventDate); // conversion of event date
      $eventNum = $date_string->format("z"); // day of event as number | 1 through 365
      $monthString = $date_string->format("F"); // get the current month as string
      $dayNum = date("z"); //get the current day of the week | 1 of 365
      $eventDayNum = $date_string->format("z"); // week of event as a number

      // show the event <- if the day of the event is greater than or equal to then today
      if( $eventNum >= $dayNum && $monthString == 'July') { ?>
          
      <!-- event tile w trigger to launch modal -->
      <div class="event card<?php if ( $eventDate == $currentDate ) { echo ' current-day';} ?>" data-target="#trigger<?php echo $eventDayNum; ?>" data-toggle="modal"><!-- data-toggle="modal" -->
        <div class="card-body">
          <?php echo $date_string->format('j'); ?>
        </div>
      </div><!-- .card -->


      <!-- event modal -->
      <div class="modal fade event-modal" id="trigger<?php echo $eventDayNum; ?>" tabindex="-1" role="dialog" aria-labelledby="eventModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="eventModalLongTitle"><?php the_title();?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>

      <?php $count++; ?>


    <?php } //end if event week statement


    endwhile;
  endif; ?>

  <!-- add block tiles to end of calendar-->
  <?php if ($count % 7 == 1) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
  <?php } elseif ($count % 7 == 2) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
  <?php } elseif ($count % 7 == 3) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
  <?php } elseif ($count % 7 == 4) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
  <?php } elseif ($count % 7 == 5) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <?php } elseif ($count % 7 == 6) { ?>
    <div class="block card"></div>
  <?php } ?>


</div><!-- .calendar.card-group -->


<!--AUGUST-->
<?php $count = 0;// counter for modal ?>
<?php if ( $month < 8 ) {?>
  <div class="month-divider">&nbsp;</div>
  <h1 class="month">AUG</h1>
<?php } ?>

<div class="card-group calendar" <?php if ( $month > 8 ) { echo 'style="display:none;"';} ?>>
  
  <?php if ( $month < 8 ) { 
    $count = $count+6;?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } else if ($month == 8 && $day == 'Monday') {
    $count = $count + 1; ?>
    <div class="block card last"></div>
  <?php } else if ($month == 8 && $day == 'Tuesday') {
    $count = $count + 2; ?>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } else if ($month == 8 && $day == 'Wednesday') {
    $count = $count + 3; ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } else if ($month == 8 && $day == 'Thursday') {
    $count = $count + 4; ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } else if ($month == 8 && $day == 'Friday') {
    $count = $count + 5; ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } else if ($month == 8 && $day == 'Saturday') {
    $count = $count + 6; ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } ?>


  <?php

  if ( $calendar->have_posts() ) : 
    while ( $calendar->have_posts() ) : $calendar->the_post();

      // parse the variables
      $currentDate =  date("F d, Y"); // get the current date
      $eventDate = get_field('date'); // get the date field from event ACF post
      $date_string = new DateTime($eventDate); // conversion of event date
      $eventNum = $date_string->format("z"); // day of event as number | 1 through 365
      $monthString = $date_string->format("F"); // get the current month as string
      $dayNum = date("z"); //get the current day of the week | 1 of 365
      $eventDayNum = $date_string->format("z"); // week of event as a number

      // show the event <- if the day of the event is greater than or equal to then today and month is same as month string var
      if( $eventNum >= $dayNum && $monthString == 'August') { ?>
          
      <!-- event tile w trigger to launch modal -->
      <div class="event card<?php if ( $eventDate == $currentDate ) { echo ' current-day';} ?>" data-target="#trigger<?php echo $eventDayNum; ?>" data-toggle="modal"><!-- data-toggle="modal" -->
        <div class="card-body">
          <?php echo $date_string->format('j'); ?>
        </div>
      </div><!-- .card -->


      <!-- event modal -->
      <div class="modal fade event-modal" id="trigger<?php echo $eventDayNum; ?>" tabindex="-1" role="dialog" aria-labelledby="eventModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="eventModalLongTitle"><?php the_title();?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>

     <?php $count++; ?>

    <?php } //end if event week statement
    
    

    endwhile;
  endif; ?>


  <!-- add block tiles to end of calendar-->
  <?php if ($count % 7 == 1) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
  <?php } else if ($count % 7 == 2) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
  <?php } else if ($count % 7 == 3) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
  <?php } else if ($count % 7 == 4) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
  <?php } else if ($count % 7 == 5) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <?php } else if ($count % 7 == 6) { ?>
    <div class="block card"></div>
  <?php } ?>


</div><!-- .calendar.card-group -->


<!--SEPTEMBER-->
<?php $count = 0;// counter for modal ?>
<?php if ( $month < 9 ) {?>
  <div class="month-divider">&nbsp;</div>
  <h1 class="month">SEPT</h1>
<?php } ?>

<div class="card-group calendar" <?php if ( $month > 9 ) { echo 'style="display:none;"';} ?>>

  <?php if ( $month < 9 ) { 
    $count = $count + 2; ?>
    <div class="block card"></div>
    <div class="block card last"></div>
    <?php } else if ($month == 9 && $day == 'Monday') {
    $count = $count+1;?>
    <div class="block card last"></div>
  <?php } else if ($month == 9 && $day == 'Tuesday') {
    $count = $count+2;?>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } else if ($month == 9 && $day == 'Wednesday') {
    $count = $count+3;?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } else if ($month == 9 && $day == 'Thursday') {
    $count = $count+4;?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } else if ($month == 9 && $day == 'Friday') {
    $count = $count+5;?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } else if ($month == 9 && $day == 'Saturday') {
    $count = $count+6;?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } ?>


  <?php

  if ( $calendar->have_posts() ) : 
    while ( $calendar->have_posts() ) : $calendar->the_post();

      // parse the variables
      $currentDate =  date("F d, Y"); // get the current date
      $eventDate = get_field('date'); // get the date field from event ACF post
      $date_string = new DateTime($eventDate); // conversion of event date
      $eventNum = $date_string->format("z"); // day of event as number | 1 through 365
      $monthString = $date_string->format("F"); // get the current month as string
      $dayNum = date("z"); //get the current day of the week | 1 of 365
      $eventDayNum = $date_string->format("z"); // week of event as a number

      // show the event <- if the day of the event is greater than or equal to then today and month is same as month string var
      if( $eventNum >= $dayNum && $monthString == 'September') { ?>
          
      <!-- event tile w trigger to launch modal -->
      <div class="event card<?php if ( $eventDate == $currentDate ) { echo ' current-day';} ?>" data-target="#trigger<?php echo $eventDayNum; ?>" data-toggle="modal"><!-- data-toggle="modal" -->
        <div class="card-body">
          <?php echo $date_string->format('j'); ?>
        </div>
      </div><!-- .card -->


      <!-- event modal -->
      <div class="modal fade event-modal" id="trigger<?php echo $eventDayNum; ?>" tabindex="-1" role="dialog" aria-labelledby="eventModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="eventModalLongTitle"><?php the_title();?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>

      <?php $count++; ?>


    <?php } //end if event week statement
    

    endwhile;
  endif; ?>


  <!-- add block tiles to end of calendar-->
  <?php if ($count % 7 == 1) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
  <?php } elseif ($count % 7 == 2) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
  <?php } elseif ($count % 7 == 3) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
  <?php } elseif ($count % 7 == 4) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
  <?php } elseif ($count % 7 == 5) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <?php } elseif ($count % 7 == 6) { ?>
    <div class="block card"></div>
  <?php } ?>


</div><!-- .calendar.card-group -->


<!--OCTOBER-->
<?php $count = 0;// counter for modal ?>
<?php if ( $month < 10 ) {?>
  <div class="month-divider">&nbsp;</div>
  <h1 class="month">OCT</h1>
<?php } ?>

<div class="card-group calendar" <?php if ( $month > 10 ) { echo 'style="display:none;"';} ?>>

  <?php if ( $month < 10 ) { 
    $count = $count + 2; ?>
    <div class="block card"></div>
    <div class="block card last"></div>
    <?php } else if ($month == 10 && $day == 'Monday') {
    $count = $count+1;?>
    <div class="block card last"></div>
  <?php } else if ($month == 10 && $day == 'Tuesday') {
    $count = $count+2;?>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } else if ($month == 10 && $day == 'Wednesday') {
    $count = $count+3;?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } else if ($month == 10 && $day == 'Thursday') {
    $count = $count+4;?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } else if ($month == 10 && $day == 'Friday') {
    $count = $count+5;?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } else if ($month == 10 && $day == 'Saturday') {
    $count = $count+6;?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card last"></div>
  <?php } ?>


  <?php

  if ( $calendar->have_posts() ) : 
    while ( $calendar->have_posts() ) : $calendar->the_post();

      // parse the variables
      $currentDate =  date("F d, Y"); // get the current date
      $eventDate = get_field('date'); // get the date field from event ACF post
      $date_string = new DateTime($eventDate); // conversion of event date
      $eventNum = $date_string->format("z"); // day of event as number | 1 through 365
      $monthString = $date_string->format("F"); // get the current month as string
      $dayNum = date("z"); //get the current day of the week | 1 of 365
      $eventDayNum = $date_string->format("z"); // week of event as a number

      // show the event <- if the day of the event is greater than or equal to then today and month is same as month string var
      if( $eventNum >= $dayNum && $monthString == 'October') { ?>
          
      <!-- event tile w trigger to launch modal -->
      <div class="event card<?php if ( $eventDate == $currentDate ) { echo ' current-day';} ?>" data-target="#trigger<?php echo $eventDayNum; ?>" data-toggle="modal"><!-- data-toggle="modal" -->
        <div class="card-body">
          <?php echo $date_string->format('j'); ?>
        </div>
      </div><!-- .card -->


      <!-- event modal -->
      <div class="modal fade event-modal" id="trigger<?php echo $eventDayNum; ?>" tabindex="-1" role="dialog" aria-labelledby="eventModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="eventModalLongTitle"><?php the_title();?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>

      <?php $count++; ?>


    <?php } //end if event week statement
    

    endwhile;
  endif; ?>


  <!-- add block tiles to end of calendar-->
  <?php if ($count % 7 == 1) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
  <?php } elseif ($count % 7 == 2) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
  <?php } elseif ($count % 7 == 3) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
  <?php } elseif ($count % 7 == 4) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <div class="block card"></div>
  <?php } elseif ($count % 7 == 5) { ?>
    <div class="block card"></div>
    <div class="block card"></div>
    <?php } elseif ($count % 7 == 6) { ?>
    <div class="block card"></div>
  <?php } ?>


</div><!-- .calendar.card-group -->


<!-- end all events -->
<?php wp_reset_query(); ?>


</div>

<!--register an event-->
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 register-event text-center">
      <h2>Want to host an event?</h2>
      <a href="https://docs.google.com/forms/d/1aNg-vY1--pK6Hj0WLSXlSVJJ_iN87Sv8o8axvXJQ9TY" class="btn btn-info btn-lg" target="_blank">Register now!</a>
    </div>
  </div>
</div>

</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer('fullwidth'); ?>
