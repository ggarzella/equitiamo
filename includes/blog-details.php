<div class="col-md-12 col-xs-12 details">
    <span class="glyphicon glyphicon-calendar"></span>
    <span><?php echo get_the_date( 'd-m-Y' ); ?></span>
    <span class="glyphicon glyphicon-user author"></span>
    <span><?php the_author(); ?></span>
    <span class="glyphicon glyphicon-comment"></span>
    <span><?php comments_number("Nessun commento") ?></span>
</div>